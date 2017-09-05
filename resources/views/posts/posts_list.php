<?php foreach ($articles as $post_item) { ?>
    <div style="border-bottom: 1px solid #007bff; padding: 10px;">
        <a href="<?= \app\core\createUrl('post_by_id', ['id' => $post_item['id']]) ?>">
            <h3><?= $post_item['title'] ?></h3></a>
        <p>Author: <a
                    href="<?= \app\core\createUrl('post_by_author', ['criteria' => $post_item['user']['username']]) ?>"> <?= $post_item['user']['username'] ?></a>
        </p>
        <p><?= $post_item['created_at'] ?></p>
        <? if (strlen($post_item['content']) >= 50) { ?>
            <p><?= substr($post_item['content'], 0, 50) . ' . . .' ?></p>
        <? } else { ?>
            <p><?= $post_item['content'] ?></p>
        <? } ?>
        <?php if ($app['route']['name'] == 'user_cabinet_page' && $app['user']) { ?>
            <a href="<?= \app\core\createUrl('edit_post', ['num' => $post_item['id']]) ?>">
                <button class="btn col-1 btn-warning" type="submit" value="Edit" name="edit">Edit</button>
            </a>
            <a href="<?= \app\core\createUrl('delete_post', ['num' => $post_item['id']]) ?>">
                <button class="btn col-1 btn-danger" type="submit" value="Delete" name="delete">Delete</button>
            </a>
        <?php } ?>
    </div>
<?php } ?>

<div class="col-12" style="padding: 10px 0; font-size: 20px">
    <ul class="pagination justify-content-center">
        <?php if ($page != 1) { ?>
            <li class="page-item>">
                <a class="page-link"
                   href="<?= \app\core\createUrl($app['route']['name'], ['criteria' => $tag]) . $link ?>page=1">First</a>
            </li>
        <?php } ?>
        <?php for ($i = 0; $i < $pages; $i++) { ?>
            <li class="page-item <?= $i == $page - 1 ? 'active' : '' ?>">
                <a class="page-link <?= $i == $page - 1 ? 'active' : '' ?>"
                   href="<?= \app\core\createUrl($app['route']['name'], ['criteria' => $tag]) . $link . 'page=' . ($i + 1) ?>"><?= ($i + 1) ?></a>
            </li>
        <?php } ?>
        <?php if ($page != $pages && $pages != 0) { ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?= \app\core\createUrl($app['route']['name'], ['criteria' => $tag]) . $link ?>page=<?= $pages ?>">Last</a>
            </li>
        <?php } ?>
    </ul>
</div>



