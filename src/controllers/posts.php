<?php

namespace app\src\controllers\posts;


use function app\core\renderView;
use function app\core\renderFile;
use app\core;
use app\src\models\Post;
use app\src\models\User;
use function MongoDB\BSON\toJSON;

///**
// * @return null|string
// */
//
///**
// * @param null $edit
// * @return null|string
// */
function index() {

    return renderView(['default_template.php'], ['content' => renderFile('controllers\posts.php', 'app\\src\\controllers\\posts\\getPostsByCriteria')
    ]);
}

function userCabinet() {

    global $app;

    if (!isset($app['user']['username'])) {
        core\redirect('login_page');
    }

    return renderView(['default_template.php', 'posts/add_post.php'], ['content' => renderFile('controllers\posts.php', 'app\\src\\controllers\\posts\\getPostsByCriteria', [$app['user']['username']])
    ]);
}

function postsByAuthor($criteria) {

    return renderView(['default_template.php'], ['content' => renderFile('controllers\posts.php', 'app\\src\\controllers\\posts\\getPostsByCriteria', [$criteria])
    ]);
}

function getPostsByCriteria($criteria = null) {

    if (isset($_GET['search']) && $_GET['search'] == '') {
        core\addFlash('danger', 'Fill the search field!');
    }

    $link = isset($_GET['search']) ? '?search=' . $_GET['search'] . '&' : '?';
    $countOfPages = 4;
    $page = is_null($_GET['page']) ? 1 : ceil($_GET['page']);
    $posts = ($page - 1) * $countOfPages;

    $mainQuery = Post::with('user')
        ->whereHas('user', function ($query) use ($criteria) {
            if ($criteria) {
                $query->where('username', '=', $criteria);
            }
        })->where('title', 'LIKE', '%' . $_GET['search'] . '%');

    $count = $mainQuery
        ->count();

    $post = $mainQuery
        ->orderBy('created_at', 'desc')
        ->limit($countOfPages)
        ->offset($posts)
        ->get()
        ->toArray();

    $pages = ceil($count / $countOfPages);

    return renderView(['posts/posts_list.php'], ['articles' => $post, 'pages' => $pages, 'page' => $page, 'link' => $link, 'tag' => $criteria]);
}

function postById($id) {
    $result = Post::with('user')->where('posts.id', '=', $id)->get()->toArray();
    return renderView(['default_template.php', 'posts/post_by_id.php'], ['articles' => $result]);
}

function addPost() {
    global $app;

    if ((!$_POST['addPostTitle']) || (!$_POST['addPostText']) || (!$app['user']['id'])) {
        core\addFlash('danger', 'Fill all fields!');
        core\redirect('user_cabinet_page', ['criteria' => $app['user']['username']]);
    }

    Post::insert(['title' => $_POST['addPostTitle'], 'content' => $_POST['addPostText'], 'user_id' => $app['user']['id']]);
    core\addFlash('info', 'Post added!');
    core\redirect('user_cabinet_page', ['criteria' => $app['user']['username']]);

}

function deletePost($num) {
    global $app;
    Post::where('id', '=', $num)->delete();

    core\addFlash('warning', 'Post deleted!');
    core\redirect('user_cabinet_page', ['criteria' => $app['user']['username']]);
}

function editPost($num) {
    global $app;

    if (!isset($app['user']['username'])) {
        core\redirect('login_page');
    }

    $post = Post::where('id', '=', $num)->get()->toArray();
    return renderView(['default_template.php', 'posts/edit_post.php'], ['editPosts' => $post]);
}

function saveEdit() {
    global $app;

    if ((!$_POST['addPostTitle']) || (!$_POST['addPostText'])) {
        core\addFlash('danger', 'Fields cannot be empty!');
        core\redirect('edit_post', ['num' => $_POST['postId']]);
    }

    Post::where('id', '=', $_POST['postId'])->update(array('title' => $_POST['addPostTitle'], 'content' => $_POST['addPostText']));

    core\addFlash('success', 'Post changed!');
    core\redirect('user_cabinet_page', ['criteria' => $app['user']['username']]);
}









