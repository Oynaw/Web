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


    function getPostContent(mysqli $conn, string $idFind, &$post): void
    {
        $sql = "SELECT * FROM post WHERE post_id = $idFind";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $post = $row;
            }
        } else {
            $post = null;
        }
    }

    $post = [];
    $postId = $_GET['id'];
    if ($postId == null) {
        header('Location: https://youtu.be/jDYRnlNLF8g?t=9');
        exit();
    }
    $conn = createDBConnection();
    getPostContent($conn, $postId, $post);
    closeDBConnection($conn);
    if ($post == null) {
        header('Location: https://youtu.be/jDYRnlNLF8g?t=9');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $post['title']?></title>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="styles/post.css" rel="stylesheet">   
</head>

<body>
    <header class="header">
        <div class="header-menu">
            <a class="header-logo" href="home.php">Escape.</a>
            <nav class="header-navigation">
                <a class="header-navigation-text" href="home.php">home</a>
                <a class="header-navigation-text" href="home.php">categories</a>
                <a class="header-navigation-text" href="home.php">about</a>
                <a class="header-navigation-text" href="home.php">contact</a>
            </nav>
        </div>
        <div class="header-context">
            <h1 class="header-text_title"><?= $post['title'], " ", $postId?></h1>
            <h2 class="header-text_description"><?= $post['subtitle']?></h2>
        </div>
    </header>
    <div class="section">
        <div class="image-after-menu">
		  <img src=images/TheRoadAhead_second.png>
		</div>
        <div class="section-box section_background">
            <div class="section-content">
            <?= $post['content']?>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-menu">
            <a class="footer-logo" href="home.php">Escape.</a>
            <nav class="footer-navigation">
                <a class="footer-navigation-text" href="home.php">home</a>
                <a class="footer-navigation-text" href="home.php">categories</a>
                <a class="footer-navigation-text" href="home.php">about</a>
                <a class="footer-navigation-text" href="home.php">contact</a>
            </nav>
        </div>
    </footer>
</body>

</html>