<?php foreach ($articles as $post_item) { ?>
    <div class="post">
        <h3 class="postTitle"><?= $post_item['title'] ?></h3>
        <p class="postData"><?= $post_item['created_at'] ?></p>
        <p class="postText"><?= $post_item['content'] ?></p>
    </div>
<?php } ?>