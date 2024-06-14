<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


function closeDBConnection(mysqli $conn): void
{
    $conn->close();
}


function getFeaturePosts(mysqli $conn, &$posts_featured): void
{
    $sql = "SELECT * FROM post WHERE featured = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts_featured[] = $row;
        }
    }
}

function getMostRecentPosts(mysqli $conn, &$posts_most): void
{
    $sql = "SELECT * FROM post WHERE featured = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts_most[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="styles/home.css" rel="stylesheet">   
</head>

<body>
    <header class="header">
        <div class="header__top">
            <a class="header__logo" href="home.php">Escape.</a>
            <nav class="menu" id="menu" >
				<input class="menu__button" type="checkbox" id="btn-menu" />
				<label class="menu__label" for="btn-menu"><img class="menu__icon" src=images/menu.png></label> 
				<ul class="menu__list">
					<li class="menu__list-item"> <a class="menu__list-item-text" href="#" >home</a> </li>
					<li class="menu__list-item"> <a class="menu__list-item-text" href="#" >categories</a> </li>
					<li class="menu__list-item"> <a class="menu__list-item-text" href="#" >about</a> </li>
					<li class="menu__list-item"> <a class="menu__list-item-text" href="#" >contact</a> </li>
				</ul>
            </nav>
        </div>
        <div class="header__context">
            <h1 class="header__context-title">Let's do it together.</h1>
            <h4 class="header__context-description">We travel the world in search of stories. Come along for
                the ride.</h4>
            <a class="button" href="post.php"> View Latest Posts </a>
        </div>
    </header>

    <section class="content">
        <nav class="content__navigation">
            <a class="content__navigation-link" href="post.php">Nature</a>
            <a class="content__navigation-link" href="post.php">Photography</a>
            <a class="content__navigation-link" href="post.php">Relaxation</a>
            <a class="content__navigation-link" href="post.php">Vacation</a>
            <a class="content__navigation-link" href="post.php">Travel</a>
            <a class="content__navigation-link" href="post.php">Adventure</a>
        </nav>
        <div class="post-section">
            <div class="section section_featured">
                <h2 class="section__title">Featured Posts</h2>
                <div class="feature-post-block">
                    <?php 
                    $posts = [];
                    $conn = createDBConnection();
                    getFeaturePosts($conn, $posts);
                    closeDBConnection($conn);
					foreach ($posts as $post) {
						include 'featured_post_preview.php';
					}
					?>
                </div>
            </div>
            <div class="section section_recent">
                <h2 class="section__title">Most Recent</h2>
                <div class="recent-post-block">
                    <?php
                    $posts = [];
                    $conn = createDBConnection();
                    getMostRecentPosts($conn, $posts);
                    closeDBConnection($conn); 
					foreach ($posts as $post) {
						include 'recent_post_preview.php';
					}
					?>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="subscription-form">
            <label class="subscription-form__label">Stay in Touch</label>
            <div class="subscription-form__input-section">
                <input class="subscription-form__input-field" id="input" placeholder="Enter your email address">
                <a class="subscription-form__submit-button">Submit</a>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__menu">
                <a class="footer__logo" href="#">Escape.</a>
                <nav class="navigation navigation_footer">
                    <a class="navigation__item navigation__item_footer">home</a>
                    <a class="navigation__item navigation__item_footer">categories</a>
                    <a class="navigation__item navigation__item_footer">about</a>
                    <a class="navigation__item navigation__item_footer">contact</a>
                </nav>
            </div>
        </div>
    </footer>
</body>
</html>