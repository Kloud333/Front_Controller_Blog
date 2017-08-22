<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/style/style.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>

<header class="header clearfix">
    <a class="slogan" href="<?= \app\core\createUrl('main_page') ?>"><h1>Blog Lite</h1></a>

    <form class="searchForm" name="searchForm" method="get"
          action="<?= (!isset($cabinet) ? \app\core\createUrl('posts') : \app\core\createUrl('user_cabinet_page', ['cabinet' => 'cabinet'])) ?>">
        <input class="searchInput" name="search" required type="text"/>
        <input class="searchButton" type="submit" value="Search"/>
    </form>
    <?php foreach (\app\core\getFlashes('success') as $message): ?>
        <div class="alert alert-<?= 'success' ?>" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach; ?>
    <?php if ($app['user']) { ?>
        <form method="post" action="<?= \app\core\createUrl('logout') ?>">
            <button class="loginButton">Log Out</button>
        </form>
        <a class="lockedUpUser"
           href="<?= \app\core\createUrl('user_cabinet_page', ['cabinet' => 'cabinet']) ?>">Hi <?= ucfirst($app['user']['username']) ?></a>
    <?php } else { ?>
        <a href="<?= \app\core\createUrl('login_page') ?>">
            <button class="loginButton">Login</button>
        </a>
        <a href="<?= \app\core\createUrl('registration_page') ?>">
            <button class="registrationButton">Registration</button>
        </a>
    <?php } ?>


</header>

<div class="wrapper indexWrapper">
    <div class="content">
        <?= $content ?>
    </div>
</div>


<footer class="footer"><p>© <?= date_format(date_create(),'Y') ?> Inc.</p></footer>


</body>
</html>
