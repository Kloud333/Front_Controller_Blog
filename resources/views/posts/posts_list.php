<?php foreach ($articles as $post_item) { ?>
    <div style="border-bottom: 1px solid #007bff; padding: 10px;">
        <a href="<?= \app\core\createUrl('post_by_id', ['id' => $post_item['id']]) ?>">
            <h3><?= $post_item['title'] ?></h3></a>
        <a href="<?= \app\core\createUrl('post_by_author', ['author' => $post_item['username']]) ?>">
            <p>Author: <?= $post_item['username'] ?></p></a>
        <p><?= $post_item['created_at'] ?></p>
        <? if (strlen($post_item['content']) >= 50) { ?>
            <p><?= substr($post_item['content'], 0, 50) . ' . . .' ?></p>
        <? } else { ?>
            <p><?= $post_item['content'] ?></p>
        <? } ?>
        <?php if ($app['route']['name'] == 'user_cabinet_page') { ?>
            <a href="<?= \app\core\createUrl('edit_post', ['num' => $post_item['id']]) ?>">
                <button class="btn btn-warning" type="submit" value="Edit">Edit</button>
            </a>
            <form class="d-inline-block" method="post" action="<?= \app\core\createUrl('delete_post') ?>">
                <input type="hidden" name="postId" value="<?= $post_item['id'] ?>">
                <input class="btn btn-danger" type="submit" name="delete" value="Delete">
            </form>
        <?php } ?>
    </div>
<?php } ?>

<div class="container">
    <div class="col-12 text-center" style="padding: 10px 0; font-size: 25px">
        <?php if ($page != 1) { ?>
            <a href="<?= \app\core\createUrl($app['route']['name'], ['author' => $tag]) . $link ?>page=1">First</a>
        <?php } ?>
        <?php for ($i = 0; $i < $pages; $i++) { ?>
            <a href="<?= \app\core\createUrl($app['route']['name'], ['author' => $tag]) . $link . 'page=' . ($i + 1) ?>"><?= ($i + 1) ?></a>
        <?php } ?>
        <?php if ($page != intval($pages)) { ?>
            <a href="<?= \app\core\createUrl($app['route']['name'], ['author' => $tag]) . $link ?>page=<?= intval($pages) ?>">Last</a>
        <?php } ?>
    </div>
</div>

<?= $content ?>

