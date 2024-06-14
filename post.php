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


    function getPostContent(mysqli $conn, $idFind, &$post): void
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="styles/post.css" rel="stylesheet">   
</head>

<body>
<header class="header">
        <div class="header__content-area">
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
    </header>
    <div class="post-content">
        <div class="post-content__tilte-area">
            <h1 class="post-content__title"><?= $post['title'], " ", $postId?></h1>
            <h2 class="post-content__subtitle"><?= $post['subtitle']?></h2>
        </div>
        <div>
		  <img class="post-content__image" src=images/TheRoadAhead_second.png alt='img'>
		</div>
        <div class="post-content__text-area">
            <p class="post-content__text"><?= $post['content']?></p>
        </div>
    </div>
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
                    <a class="navigation__item navigation__item_footer" href="#">home</a>
                    <a class="navigation__item navigation__item_footer" href="#">categories</a>
                    <a class="navigation__item navigation__item_footer" href="#">about</a>
                    <a class="navigation__item navigation__item_footer" href="#">contact</a>
                </nav>
            </div>
        </div>
    </footer>
</body>

</html>