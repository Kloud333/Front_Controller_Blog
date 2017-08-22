<div class="wrapper registrationWrapper">
    <div class="registrationArea">
            <?php foreach (['info', 'warning', 'danger'] as $flashType): ?>
                <?php foreach (\app\core\getFlashes($flashType) as $message): ?>
                    <div class="alert alert-<?= $flashType ?>" role="alert">
                        <?= $message ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <form class="registrationForm" method="post" action="<?= \app\core\createUrl('registration') ?>">
            <div class="registrationLabels">
                <label for="registrationInput">Login</label>
                <label for="registrationInputEmail">E-mail</label>
                <label for="registrationPasswordInput">Password</label>
            </div>
            <div class="registrationInputs">
                <input id="registrationInput" class="registrationInput" type="text" name="username" required>
                <input id="registrationInputEmail" class="registrationInputEmail" type="email"
                       name="email" required>
                <input id="registrationPasswordInput" class="registrationPasswordInput" type="password"
                       name="password" required>
            </div>
            <input class="registrationAcceptButton button" type="submit" name="registrationButton" value="Registration">
        </form>
    </div>
</div>