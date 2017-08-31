<?php foreach (['info', 'warning', 'danger'] as $flashType): ?>
    <?php foreach (\app\core\getFlashes($flashType) as $message): ?>
        <div class="alert alert-<?= $flashType ?>" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<form class="form-login" method="post" action="<?= \app\core\createUrl('login') ?>">
    <div class="form-group">
        <label for="loginInput">Login</label>
        <input id="loginInput" class="form-control input-sm chat-input" type="text" name="username">
    </div>
    <div class="form-group">
        <label for="passwordInput">Password</label>
        <input id="passwordInput" class="form-control input-sm chat-input" type="password"
               name="password">
    </div>
    <span class="group-btn">
            <input class="btn btn-primary btn-md btn-block" type="submit" name="loginButton" value="Login">
    </span>
</form>