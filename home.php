<?php
$featuredPosts = [
    [
       'title' => 'The Road Ahead',
       'description' => 'The road ahead might be paved - it might not be',
       'theme' => '',
       'theme_modifier' => 'theme_hide',
       'author' => 'Mat Vogels',
       'author_image_path' => 'images/matvogels.jpg',
       'date' => 'September 25,2015',
       'preview_image_path' => "images/TheRoadAhead.png",
    ],
    [ 
        'title' => 'From Top Down',
        'description' => 'Once a year, go someplace you\'ve never been before.',
        'theme' => 'adventure',
        'theme_modifier' => '',
        'author' => 'William Wong',
        'author_image_path' => 'images/williamwong.jpg',
        'date' => 'September 25,2015',                 
        'preview_image_path' => "images/FromTopDown.png",
    ]
];

$recentPosts = [
    [
       'title' => 'Still Standing Tall',
       'subtitle' => 'Life begins at the end of your comfort zone',
       'img_modifier' => 'none',
       'author' => 'William Wong',
       'author_image_path' => 'images/williamwong.jpg',
       'date' => '9/25/2015',
       'prview_image_path' => "images/stillstandingtall.jpg"
    ],
    [ 
        'title' => 'Sunny Side Up',
        'subtitle' => 'No place is ever as bad as they tell you it\'s going to be.',
        'img_modifier' => 'none',
        'author' => 'Mat Vogels',
        'author_image_path' => 'images/matvogels.jpg',
        'date' => '9/25/2015',                 
        'prview_image_path' => "images/sunnysideup.png"
    ],
    [
        'title' => 'Water Falls',
        'subtitle' => 'We travel not to escape life, but for life not to escape us.',
        'img_modifier' => 'none',
        'author' => 'Mat Vogels',
        'author_image_path' => 'images/matvogels.jpg',
        'date' => '9/25/2015',
        'prview_image_path' => "images/waterfalls.png",
    ],
    [
        'title' => 'Through the Mist',
        'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
        'img_modifier' => 'none',
        'author' => 'William Wong',
        'author_image_path' => 'images/williamwong.jpg',
        'date' => '9/25/2015',
        'prview_image_path' => "images/throughthemist.png"
    ],
    [
        'title' => 'Awaken Early',
        'subtitle' => 'Not all those who wander are lost.',
        'img_modifier' => 'none',
        'author' => 'Mat Vogels',
        'author_image_path' => 'images/matvogels.jpg',
        'date' => '9/25/2015',
        'prview_image_path' => "images/awakenearly.png",
    ],
    [
        'title' => 'Try it Always',
        'subtitle' => 'The world is a book, and those who do not travel read only one page.',
        'img_modifier' => 'none',
        'author' => 'Mat Vogels',
        'author_image_path' => 'images/matvogels.jpg',
        'date' => '9/25/2015',
        'prview_image_path' => "images/tryitalways.png",
    ],

];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link href="styles/index.css" rel="stylesheet">
</head>

<body>
    <header class="header header_main-background">
        <div class="header-menu">
            <a class="header-logo" href="index.html">Escape.</a>
            <nav class="header-navigation navigation">
                <a class="navigation-text" href="index.html">home</a>
                <a class="navigation-text" href="index.html">categories</a>
                <a class="navigation-text" href="index.html">about</a>
                <a class="navigation-text" href="index.html">contact</a>
            </nav>
        </div>
        <div class="header-context">
            <h1 class="header-context_title">Let's do it together.</h1>
            <h2 class="header-context_description">We travel the world in search of stories. Come along for
                the ride.</h2>
            <a class="button" href="post.php"> View Latest Posts </a>
        </div>
    </header>
    <section class="section">
        <nav class="section-nav">
            <a class="section-nav-link" href="post.php">Nature</a>
            <a class="section-nav-link" href="post.php">Photography</a>
            <a class="section-nav-link" href="post.php">Relaxation</a>
            <a class="section-nav-link" href="post.php">Vacation</a>
            <a class="section-nav-link" href="post.php">Travel</a>
            <a class="section-nav-link" href="post.php">Adventure</a>
        </nav>
        <div class="section-unit section-unit_background">
            <div class="section-cards">
                <h2 class="section-title">Featured Posts</h2>
                <div class="cards">
                <?php 
                    foreach ($featuredPosts as $post) {
                    include 'featured_post_preview.php';
                    }
                ?>
                </div>
            </div>
            <div class="section-box">
                <h2 class="section-title">Most Recent</h2>
                <div class="boxes">
                <?php 
                    foreach ($recentPosts as $post) {
                    include 'recent_post_preview.php';
                    }
                ?>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <a class="footer-logo" href="index.html">Escape.</a>
        <nav class="footer-nav nav">
            <a class="nav-text" href="index.html">home</a>
            <a class="nav-text" href="index.html">categories</a>
            <a class="nav-text" href="index.html">about</a>
            <a class="nav-text" href="index.html">contact</a>
        </nav>
    </footer>
</body>

</html>