<?php 
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <link rel="shortcut icon" href="https://www.mitdream.com/wp-content/uploads/2019/12/house-2.png"/>
    <link rel="stylesheet" href="../css/myaccount.css">
    <link rel="stylesheet" href="../css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "menu.php";
        if (!isset($_SESSION["permission"])) {
            include "prohibit.php";
        } else {
            echo "<div class=\"frame\">";
                echo "<div class=\"function-box box-1\">";
                    echo "<a href=\"/chinh-sua-thong-tin\">Chỉnh sửa thông tin</a>";
                echo "</div>";
                echo "<div class=\"function-box box-1\">";
                    echo "<a href=\"/app/logout.php\">Đăng xuất</a>";
                echo "</div>";
                if ($_SESSION["permission"] == 1) {
                    echo "<div class=\"function-box box-2\">";
                        echo "<a href=\"/khach-hang\">Quản lý khách hàng</a>";
                    echo "</div>";
                    echo "<div class=\"function-box box-2\">";
                        echo "<a href=\"/quan-ly-bds\">Quản lý BĐS</a>";
                    echo "</div>";
                } else {
                    echo "<div class=\"function-box box-2\">";
                        echo "<a href=\"/bds-quan-tam\">BĐS quan tâm</a>";
                    echo "</div>";
                }
                echo "<div class=\"function-box box-2\">";
                    echo "<a href=\"/lich-hen\">Lịch hẹn của tôi</a>";
                echo "</div>";
            echo "</div>";
        }
    ?>
    
</body>
</html>