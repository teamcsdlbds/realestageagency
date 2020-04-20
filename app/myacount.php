<?php 
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency | My acount</title>
    <link rel="stylesheet" href="../css/myacount.css">
    <link rel="stylesheet" href="../css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "menu.php";
    ?>
    <div class="frame">
        <div class="function-box box-1">
            <a href="/app/edit-acount.php">Chỉnh sửa thông tin</a>
        </div>
        <div class="function-box box-1">
            <a href="/app/logout.php">Đăng xuất</a>
            <!-- finished -->
        </div>
        <div class="function-box box-2">
            <a href="/app/customer.php">Quản lý khách hàng</a>
        </div>
        <div class="function-box box-2">
            <a href="/app/my-details.php">Quản lí BĐS</a>
        </div>
        <div class="function-box box-2">
            <a href="/app/favorite-details.php">BĐS quan tâm</a>
        </div>
    </div>
</body>
</html>