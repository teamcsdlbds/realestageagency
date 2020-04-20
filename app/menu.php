<?php 
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="menu">
    <ul class="main-nav">
        <li><a href= "/app/home.php" class="menu-item">Trang chủ</a></li>
        <li><a href= "/app/retails.php" class="menu-item">Mua nhà</a></li>
        <li><a href= "/app/hired.php" class="menu-item">Thuê nhà</a></li>
        <li><a href="/app/agency.php" class="menu-item">Môi giới</a></li>
        <?php 
            if (isset($_SESSION["permision"]))
                echo "<li><a href= \"/app/myacount.php\" class=\"menu-item\">" .$_SESSION['name']."</a></li>";
            else 
                echo "<li><a href=\"/app/login.php\" class=\"menu-item\">Đăng nhập</a></li>";
        ?>
    </ul>
</header>
</body>
</html>