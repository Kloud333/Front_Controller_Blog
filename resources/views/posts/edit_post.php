<!-- Edit Post Area -->
<form class="edit-post-form" method="post" action="<?= \app\core\createUrl('save_edit') ?>">
    <input type="hidden" name="postId" value="<?= $editPosts[0]['id'] ?>">
    <div class="form-group">
        <input class="form-control input-sm chat-input" name="addPostTitle" value="<?= $editPosts[0]['title'] ?>">
    </div>
    <div class="form-group">
        <textarea class="form-control input-sm chat-input" name="addPostText"> <?= trim($editPosts[0]['content']) ?> </textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary btn-md btn-block" type="submit" name="save" value="Save">
    </div>
</form>