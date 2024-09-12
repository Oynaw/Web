<div class="recent-post">
    <img class="recent-post__image" src=<?= $post['image_url'] ?> alt="img">
    <div class="recent-post__information">
        <div class="recent-post__text">
            <a class="recent-post__title" href='/post?id=<?= $post['post_id'] ?>'><?= $post['title'] ?></a>
            <p class="recent-post__subtitle"><?= $post['subtitle'] ?></p>
        </div>
        <div class="recent-post__footer">
            <div class="recent-post__context">
                <img class="avatar" src=<?= $post['author_url'] ?> alt="img">
                <p class="context__author"><?= $post['author'] ?></p>
            </div>
            <h4 class="recent-post___date"><?=date('n/j/Y', strtotime($post['publish_date']))?></h4>
        </div>
    </div>
</div>