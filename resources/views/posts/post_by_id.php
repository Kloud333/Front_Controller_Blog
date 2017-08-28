<?php foreach ($articles as $post_item) { ?>
    <div style="border-bottom: 1px solid #007bff; padding: 10px;">
        <h3><?= $post_item['title'] ?></h3>
        <p>Author: <?= $post_item['username'] ?></p>
        <p><?= $post_item['created_at'] ?></p>
        <p><?= $post_item['content'] ?></p>
    </div>
<?php } ?>