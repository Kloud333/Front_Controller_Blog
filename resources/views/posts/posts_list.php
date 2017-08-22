<?php foreach (['info', 'warning', 'danger'] as $flashType): ?>
    <?php foreach (\app\core\getFlashes($flashType) as $message): ?>
        <div class="alert alert-<?= $flashType ?>" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
<?php foreach ($articles as $post_item) { ?>
    <div class="post">
        <a href="<?= \app\core\createUrl('post_by_id', ['id' => $post_item['id']]) ?>"><h3
                    class="postTitle"><?= $post_item['title'] ?></h3>
            <p class="postData"><?= $post_item['created_at'] ?></p>
            <? if (strlen($post_item['content']) >= 50) { ?>
                <p class="postText"><?= substr($post_item['content'], 0, 50) . ' . . .' ?></p>
            <? } else { ?>
                <p class="postText"><?= $post_item['content'] ?></p>
            <? } ?>
            <?php if (isset($cabinet)) { ?>
                <a href="<?= \app\core\createUrl('edit_post', ['num' => $post_item['id']]) ?>">
                    <button class="editButton button" type="submit" value="Edit">Edit</button>
                </a>
                <form class="postForm" method="post" action="<?= \app\core\createUrl('delete_post') ?>">
                    <input type="hidden" name="postId" value="<?= $post_item['id'] ?>">
                    <input class="deleteButton button" type="submit" name="delete" value="Delete">
                </form>
            <?php } ?>
        </a>
    </div>
<?php } ?>

<div class="navigation">
    <?php if ($page != 1) { ?>
        <a href="<?= (!isset($cabinet) ? \app\core\createUrl('posts') : \app\core\createUrl('user_cabinet_page', ['cabinet' => 'cabinet'])) . $link ?>page=1">First</a>
    <?php } ?>
    <?php for ($i = 0; $i < $pages; $i++) { ?>
        <a href="<?= (!isset($cabinet) ? \app\core\createUrl('posts') : \app\core\createUrl('user_cabinet_page', ['cabinet' => 'cabinet'])) . $link . 'page=' . ($i + 1) ?>"><?= ($i + 1) ?></a>
    <?php } ?>
    <?php if ($page != intval($pages) + 1) { ?>
        <a href="<?= (!isset($cabinet) ? \app\core\createUrl('posts') : \app\core\createUrl('user_cabinet_page', ['cabinet' => 'cabinet'])) . $link ?>page=<?= intval($pages) ?>">Last</a>
    <?php } ?>
</div>

<?= $content ?>

