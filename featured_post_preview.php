<div class="card" style="background: url(<?=$post['preview_image_path'] ?>);">
    <div class="theme <?=$post['theme_modifier'] ?>">
        <p class="theme_text"><?=$post['theme'] ?></p>
    </div>
    <div class="card-text">
        <a class="card-title" href="post.php"><?=$post['title'] ?></a>
        <p class="card-description"><?=$post['description'] ?></p>
        <div class="card-context context">
            <img class="avatar" src=<?=$post['author_image_path'] ?> alt="img">
            <p class="context_author"><?=$post['author'] ?></p>
        </div>
        <p class="card-data"><?=$post['date'] ?></p>
    </div>
</div>