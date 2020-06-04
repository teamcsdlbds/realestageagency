<?php 
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="shortcut icon" href="https://www.mitdream.com/wp-content/uploads/2019/12/house-2.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="menu">
    <ul class="main-nav">
        <li><a href= "/" class="menu-item">Trang chủ</a></li>
        <li><a href= "/mua-nha" class="menu-item">Mua nhà</a></li>
        <li><a href= "/thue-nha" class="menu-item">Thuê nhà</a></li>
        <li><a href="/moi-gioi" class="menu-item">Môi giới</a></li>
        <?php 
            if (isset($_SESSION["permission"]))
                echo "<li><a href=\"/tai-khoan\" class=\"menu-item\">" .$_SESSION['name']."</a></li>";
            else 
                echo "<li><a href=\"/dang-nhap\" class=\"menu-item\">Đăng nhập</a></li>";
        ?>
    </ul>
</header>
</body>
</html>