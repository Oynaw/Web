<div class="featured-post" style="background-image: url(<?=$post['image_url'] ?>);">
    <div class="tag tag_<?=$post['tag_type'] ?>">
        <p class="tag__text"><?=$post['tag_text'] ?></p>
    </div>
    <div class="featured-post__text">
        <a class="featured-post__title" href='/post?id=<?= $post['post_id'] ?>'><?=$post['title'] ?></a>
        <p class="featured-post__subtitle"><?=$post['subtitle'] ?></p>
        <div class="featured-post__context">
            <img class="avatar" src=<?=$post['author_url'] ?> alt="img">
            <p class="context__author"><?=$post['author'] ?></p>
        </div>
        <p class="featured-post__date"><?=date('F j,Y', strtotime($post['publish_date']))?></p>
    </div>
</div>