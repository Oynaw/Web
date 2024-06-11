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
    <link href="styles/home.css" rel="stylesheet">
</head>

<body>
    <header class="header header_main-background">
        <div class="header-menu">
            <a class="header-logo" href="home.php">Escape.</a>
            <nav class="header-navigation navigation">
                <a class="navigation-text" href="home.php">home</a>
                <a class="navigation-text" href="home.php">categories</a>
                <a class="navigation-text" href="home.php">about</a>
                <a class="navigation-text" href="home.php">contact</a>
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
            <div class="section-box">
                <h2 class="section-title">Most Recent</h2>
                <div class="boxes">
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
        <a class="footer-logo" href="home.php">Escape.</a>
        <nav class="footer-nav nav">
            <a class="nav-text" href="home.php">home</a>
            <a class="nav-text" href="home.php">categories</a>
            <a class="nav-text" href="home.php">about</a>
            <a class="nav-text" href="home.php">contact</a>
        </nav>
    </footer>
</body>

</html>