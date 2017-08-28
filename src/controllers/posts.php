<?php

namespace app\src\controllers\posts;


use function app\core\renderView;
use function app\core\renderFile;
use app\core;
use app\src\models\Post;

///**
// * @return null|string
// */
//
///**
// * @param null $edit
// * @return null|string
// */
function index($author = null) {

    $criteria = [
        'link' => isset($_GET['search']) ? '?search=' . $_GET['search'] . '&' : '?',
        'countOfPages' => 4,
        'page' => is_null($_GET['page']) ? 1 : ceil($_GET['page']),
        'tag' => $author
    ];


    return renderView(['default_template.php'], [
        'content' => renderFile('controllers\posts.php', 'app\\src\\controllers\\posts\\getPostsByCriteria', [$criteria])
    ]);
}

function getPostsByCriteria($criteria = []) {

    global $app;

    $search = $_GET['search'];
    $posts = ($criteria['page'] - 1) * $criteria['countOfPages'];

    if ($app['route']['name'] == 'post_by_author') {
        $count = Post::select('posts.*', 'users.username')->leftJoin('users', 'posts.user_id', '=', 'users.id')->where('username', '=', $criteria['tag'])
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            })
            ->count();
        $post = Post::select('posts.*', 'users.username')->leftJoin('users', 'posts.user_id', '=', 'users.id')->where('username', '=', $criteria['tag'])->where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->limit($criteria['countOfPages'])->offset($posts)->get()->toArray();

    } elseif ($app['route']['name'] == 'user_cabinet_page') {
        $count = Post::where('user_id', '=', $app['user']['id'])
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            })
            ->count();
        $post = Post::select('posts.*', 'users.username')->leftJoin('users', 'posts.user_id', '=', 'users.id')->where('user_id', '=', $app['user']['id'])->where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->limit($criteria['countOfPages'])->offset($posts)->get()->toArray();
    } else {
        $count = Post::where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })
            ->count();
        $post = Post::select('posts.*', 'users.username')->leftJoin('users', 'posts.user_id', '=', 'users.id')->where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })
            ->orderBy('created_at', 'desc')->limit($criteria['countOfPages'])->offset($posts)->get()->toArray();
    }

    $pages = ceil($count / $criteria['countOfPages']);

    return renderView(['posts/posts_list.php', 'posts/add_post.php'], ['articles' => $post, 'pages' => $pages, 'page' => $criteria['page'], 'link' => $criteria['link'], 'tag' => $criteria['tag']]);
}

function postById($id) {
    $result = Post::select('posts.*', 'users.username')->leftJoin('users', 'posts.user_id', '=', 'users.id')->where('posts.id', '=', $id)->get()->toArray();
    return renderView(['default_template.php', 'posts/post_by_id.php'], ['articles' => $result]);
}

function addPost() {
    global $app;
    Post::insert(['title' => $_POST['addPostTitle'], 'content' => $_POST['addPostText'], 'user_id' => $app['user']['id']]);

    core\addFlash('success', 'Post added!');
    core\redirect('user_cabinet_page');
}

function deletePost() {
    Post::where('id', '=', $_POST['postId'])->delete();

    core\addFlash('info', 'Post deleted!');
    core\redirect('user_cabinet_page');
}

function editPost($num) {
    $post = Post::where('id', '=', $num)->get()->toArray();
    return renderView(['default_template.php', 'posts/edit_post.php'], ['editPosts' => $post]);
}

function saveEdit() {
    Post::where('id', '=', $_POST['postId'])->update(array('title' => $_POST['addPostTitle'], 'content' => $_POST['addPostText']));

    core\addFlash('success', 'Post changed!');
    core\redirect('user_cabinet_page');
}









