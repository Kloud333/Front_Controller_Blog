<div class="wrapper loginWrapper">
    <div class="loginArea">

            <?php foreach (['info', 'warning', 'danger'] as $flashType): ?>
                <?php foreach (\app\core\getFlashes($flashType) as $message): ?>
                    <div class="alert alert-<?= $flashType ?>" role="alert">
                        <?= $message ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>


        <form class="loginForm" method="post" action="<?= \app\core\createUrl('login') ?>">
            <div class="loginLabels">
                <label for="loginInput">Login</label>
                <label for="passwordInput">Password</label>
            </div>
            <div class="loginInputs">
                <input id="loginInput" class="loginInput" type="text" name="username">
                <input id="passwordInput" class="passwordInput" type="password" name="password">
            </div>
            <input class="loginAcceptButton button" type="submit" name="loginButton" value="Login">
        </form>
    </div>
</div>