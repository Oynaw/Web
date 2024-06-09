<div class="box">
    <img src=<?= $post['prview_image_path'] ?> alt="img" class="box-image">
    <div class="box-information">
        <div class="box-text">
            <h3 class="box-title"><?= $post['title'] ?></h3>
            <p class="box-description"><?= $post['subtitle'] ?></p>
        </div>
        <div class="box-footer">
            <div class="box-context">
                <img src=<?= $post['author_image_path'] ?> alt="img">
                <p class="context_author"><?= $post['author'] ?></p>
            </div>
            <h4 class="box-date"><?= $post['date'] ?></h4>
        </div>
    </div>
</div>