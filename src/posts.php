<?php

namespace app\src\posts;


use function app\core\renderView;
use function app\core\renderFile;
use app\core;

/**
 * @return null|string
 */
function index($cabinet = null) {

    global $app;

    if (!$cabinet) {
        if ($_GET['search']) {
            $criteria = ' WHERE title LIKE ' . "'%" . $_GET['search'] . "%'";
        } else {
            $criteria = '';
        }
    } else {
        if ($_GET['search']) {
            $criteria = 'WHERE user_id = ' . $app['user']['id'] . ' AND title LIKE ' . "'%" . $_GET['search'] . "%'";
        } else {
            $criteria = 'WHERE user_id = ' . $app['user']['id'];
        }
    }

    return renderView(['default_template.php'], [
        'content' => renderFile('posts.php', 'app\\src\\posts\\getPostsByCriteria', [$cabinet, $criteria])
    ]);

}

function getPostsByCriteria($cabinet, $criteria) {

    global $app;

    $link = isset($_GET['search']) ? '?search=' . $_GET['search'] . '&' : '?';

    /** @var \PDO $dbh */
    $dbh = $app['db'];
    $sth = $dbh->prepare('SELECT COUNT(1) FROM posts ' . $criteria);
    $sth->execute();
    $postsArray = $sth->fetchAll();
    $countOfPages = 4;
    $postsCount = $postsArray[0][0];
    $pages = ceil($postsCount / $countOfPages);
    $page = is_null($_GET['page']) ? 1 : ceil($_GET['page']);
    $posts = ($page - 1) * $countOfPages;

    $sth = $dbh->prepare('SELECT * FROM posts ' . $criteria . ' ORDER BY posts.created_at DESC LIMIT :countOfPages OFFSET :posts');
    $sth->bindValue(':countOfPages', $countOfPages, \PDO::PARAM_INT);
    $sth->bindValue(':posts', $posts, \PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

    return renderView(['posts/posts_list.php', 'posts/add_post.php'], ['articles' => $result, 'pages' => $pages, 'page' => $page, 'link' => $link, 'cabinet' => $cabinet]);
}

function postById($id) {
    global $app;

    /** @var \PDO $dbh */
    $dbh = $app['db'];

    $sth = $dbh->prepare('SELECT * FROM posts WHERE id= ?');

    $sth->execute([$id]);

    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

    return renderView(['default_template.php', 'posts/post_by_id.php'], ['articles' => $result]);
}

function addPost() {
    global $app;

    /** @var \PDO $dbh */
    $dbh = $app['db'];
    $sth = $dbh->prepare('INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)');
    $sth->execute([$_POST['addPostTitle'], $_POST['addPostText'], $app['user']['id']]);
    core\addFlash('info', 'Post added!');
    core\redirect('user_cabinet_page',['cabinet' => 'cabinet']);
}

function deletePost() {
    global $app;

    /** @var \PDO $dbh */
    $dbh = $app['db'];
    $sth = $dbh->prepare('DELETE FROM posts WHERE id = ?');
    $sth->execute([$_POST['postId']]);
    core\addFlash('warning', 'Post deleted!');
    core\redirect('user_cabinet_page', ['cabinet' => 'cabinet']);
}

function editPost($num) {
    global $app;
    /** @var \PDO $dbh */
    $dbh = $app['db'];
    $sth = $dbh->prepare('SELECT * FROM posts WHERE id = ?');
    $sth->execute([$num]);
    //core\addFlash();
    $editPosts = $sth->fetchAll(\PDO::FETCH_ASSOC);

    return renderView(['default_template.php', 'posts/edit_post.php'], ['editPosts' => $editPosts]);
}

function saveEdit() {
    global $app;

    /** @var \PDO $dbh */
    $dbh = $app['db'];
    $sth = $dbh->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
    $sth->execute([$_POST['addPostTitle'], $_POST['addPostText'], $_POST['postId']]);
    core\addFlash('warning', 'Post changed!');
    core\redirect('user_cabinet_page', ['cabinet' => 'cabinet']);

}









