<div class="box">
    <img src=<?= $post['image_url'] ?> alt="img" class="box-image">
    <div class="box-information">
        <div class="box-text">
            <a class="box-title" href='/post.php?id=<?= $post['post_id'] ?>'><?= $post['title'] ?></a>
            <p class="box-description"><?= $post['subtitle'] ?></p>
        </div>
        <div class="box-footer">
            <div class="box-context">
                <img src=<?= $post['author_url'] ?> alt="img">
                <p class="context_author"><?= $post['author'] ?></p>
            </div>
            <h4 class="box-date"><?=date('n/j/Y', strtotime($post['publish_date']))?></h4>
        </div>
    </div>
</div>