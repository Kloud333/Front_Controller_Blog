<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="/style/style.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>

<header class="col-12 clearfix ">
    <div class="row navbar navbar-light" style="background-color: #191c1f; margin-bottom: 10px">
        <div class="col-2">
            <a class="nav-link active" href="<?= \app\core\createUrl('main_page') ?>"><h2 class="slogan">Blog
                    Lite</h2>
            </a>
        </div>
        <div class="col-7">
            <form class="form-inline" name="searchForm" method="get"
                  action="<?= \app\core\createUrl($app['route']['name'], ['id' => '', 'criteria' => $tag, 'num' => '']) ?>">
                <input class="form-control col-9 mr-sm-2" name="search" required type="text"/>
                <input class="btn" type="submit" value="Search"/>
            </form>
        </div>
        <div class="col-3 text-right">
            <?php if ($app['user']) { ?>
                <form method="post" class="form-inline float-right" action="<?= \app\core\createUrl('logout') ?>">
                    <a class="mr-sm-2"
                       href="<?= \app\core\createUrl('user_cabinet_page', ['criteria' => $app['user']['username']]) ?>">Hi <?= ucfirst($app['user']['username']) ?></a>
                    <button class="btn btn-success">Log Out</button>
                </form>
            <?php } else { ?>
                <a href="<?= \app\core\createUrl('login_page') ?>">
                    <button class="btn btn-info">Login</button>
                </a>
                <a href="<?= \app\core\createUrl('registration_page') ?>">
                    <button class="btn btn-success">Registration</button>
                </a>
            <?php } ?>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php foreach (['success', 'info', 'warning', 'danger'] as $flashType): ?>
                <?php foreach (\app\core\getFlashes($flashType) as $message): ?>
                    <div class="alert alert-<?= $flashType ?>" role="alert">
                        <?= $message ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="col-12">
    <div class="row row navbar navbar-light" style="background-color: #191c1f; color:white; margin-top: 10px">
        © <?= date_format(date_create(), 'Y') ?> Inc.
    </div>
</footer>


</body>
</html>
