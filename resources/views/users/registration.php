<?php foreach (['info', 'warning', 'danger'] as $flashType): ?>
    <?php foreach (\app\core\getFlashes($flashType) as $message): ?>
        <div class="alert alert-<?= $flashType ?>" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
<form method="post" action="<?= \app\core\createUrl('registration') ?>">
    <div class="form-group">
        <label for="registrationInput">Login</label>
        <input id="registrationInput" class="form-control input-sm chat-input" type="text" name="username" required>
    </div>
    <div class="form-group">
        <label for="registrationInputEmail">E-mail</label>
        <input id="registrationInputEmail" class="form-control input-sm chat-input" type="email"
               name="email" required>
    </div>
    <div class="form-group">
        <label for="registrationPasswordInput">Password</label>
        <input id="registrationPasswordInput" class="form-control input-sm chat-input" type="password"
               name="password" required>
    </div>
    <input class="btn btn-success btn-md btn-block" type="submit" name="registrationButton" value="Registration">
</form>