<!-- Add Post Area -->
<?php if ($app['route']['name'] == 'user_cabinet_page') { ?>
    <form method="post" action="<?= \app\core\createUrl('add_post') ?>">
        <div class="form-group">
            <input class="form-control input-sm chat-input" name="addPostTitle">
        </div>
        <div class="form-group">
            <textarea class="form-control input-sm chat-input" name="addPostText"></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary btn-md btn-block" type="submit" name="submit" value="Add Post">
        </div>
    </form>
<?php } ?>