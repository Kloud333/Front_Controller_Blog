<!-- Add Post Area -->
<?php if (isset($cabinet)) { ?>
    <div class="addPostArea">
        <form class="addPostForm" method="post" action="<?= \app\core\createUrl('add_post') ?>">
            <input class="addPostTitle" name="addPostTitle">
            <textarea class="addPostText" name="addPostText"></textarea>
            <input class="addButton button" type="submit" name="submit" value="Add Post">
        </form>
    </div>
    </div>
<?php } ?>