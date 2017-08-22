<!-- Edit Post Area -->
<div class="wrapper">
    <div class="editPostArea">
        <form class="editPostForm" method="post" action="<?= \app\core\createUrl('save_edit') ?>">
            <input type="hidden" name="postId" value="<?= $editPosts[0]['id'] ?>">
            <input class="editPostTitle" name="addPostTitle" value="<?=$editPosts[0]['title']?>">
            <textarea class="editPostText" name="addPostText"
                      placeholder=""> <?= trim($editPosts[0]['content']) ?> </textarea>
            <input class="saveButton button" type="submit" name="save" value="Save">
        </form>
    </div>
</div>