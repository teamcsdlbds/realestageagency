
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency | Chỉnh sửa thông tin</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/edit-acount.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include("connection.php");
$current_userName = $_SESSION['userName'];
$query = "SELECT userName FROM Agencies;";
$result = $connection->query($query);
$row = $result->fetch_assoc();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $birthday = $_POST["birthday"];
    $userName = test_input($userName);
    $password = test_input($password);
    if ($userName == "" || $password == "") {
        echo "<script type='text/javascript'>alert('Không được để trống username và mật khẩu!');</script>";
    }
    else if (in_array($userName, $row)){
        echo "<script type='text/javascript'>alert('user name đã có người dùng, hãy chọn user name khác');</script>";
    }
    else
    {
        $query = "UPDATE Agencies SET userName = '$userName', password =  '$password', 
                                      name = '$name', sex = '$sex', phone = '$phone', 
                                    email = '$email', address = '$address', birthday = '$birthday' where userName = '$current_userName';";
        header('Location: ../app/home.php');
    }

}
?>

<?php include "menu.php";?>

<section class="section-news"  style="margin-top: 80px;">
    <form method="post" action="/app/edit-acount.php" class='account-box'>
        <h1>Chỉnh sửa thông tin cá nhân</h1>

        <div class="textbox">
            <i>User account</i>
            <p id="p_user-account">   <?php echo $_SESSION['userName']?> </p>
            <input id="user-account" type="text" placeholder="<?php echo $_SESSION['userName']?>" name="userName" value="" hidden>
            <button class="btn" onclick="document.getElementById('user-account').removeAttribute('hidden'); document.getElementById('p_user-account').setAttribute('hidden', true)" type="button">Thay đổi user account</button>
        </div>
        <div class="textbox">
            <i>Họ tên</i>
            <p id="p_name">   <?php echo $_SESSION['name']?> </p>
            <input id="name" type="text" placeholder="<?php echo $_SESSION['name']?>" name="name" value="" hidden>
            <button class="btn" onclick="document.getElementById('name').removeAttribute('hidden'); document.getElementById('p_name').setAttribute('hidden', true)" type="button">Thay đổi họ tên</button>
        </div>
        <div class="textbox">
            <i>Mật khẩu</i>
            <p id="p_password">   <?php echo $_SESSION['password']?> </p>
            <input id="password" type="text" placeholder="<?php echo $_SESSION['password']?>" name="password" value="" hidden>
            <button class="btn" onclick="document.getElementById('password').removeAttribute('hidden'); document.getElementById('p_password').setAttribute('hidden', true)" type="button">Thay đổi mật khẩu</button>
        </div>
        <div class="textbox">
            <i>Giới tính</i>
            <p id="p_sex">   <?php echo $_SESSION['sex']?> </p>
            <input id="sex" type="text" placeholder="<?php echo $_SESSION['sex']?>" name="sex" value="" hidden>
            <button class="btn" onclick="document.getElementById('sex').removeAttribute('hidden'); document.getElementById('p_sex').setAttribute('hidden', true)" type="button">Thay đổi giới tính</button>
        </div>
        <div class="textbox">
            <i>Số điện thoại    </i>
            <p id="p_phone">   <?php echo $_SESSION['phone']?> </p>
            <input id="phone" type="text" placeholder="<?php echo $_SESSION['phone']?>" name="phone" value="" hidden>
            <button class="btn" onclick="document.getElementById('phone').removeAttribute('hidden'); document.getElementById('p_phone').setAttribute('hidden', true)" type="button">Thay đổi số điện thoại</button>
        </div>
        <div class="textbox">
            <i>Email   </i>
            <p id="p_email">   <?php echo $_SESSION['email']?> </p>
            <input id="email" type="text" placeholder="<?php echo $_SESSION['email']?>" name="email" value="" hidden>
            <button class="btn" onclick="document.getElementById('email').removeAttribute('hidden'); document.getElementById('p_email').setAttribute('hidden', true)" type="button">Thay đổi email</button>
        </div>
        <div class="textbox">
            <i>Địa chỉ     </i>
            <p id="p_address">   <?php echo $_SESSION['address']?> </p>
            <input id="address" type="text" placeholder="<?php echo $_SESSION['address']?>" name="address" value="" hidden>
            <button class="btn" onclick="document.getElementById('address').removeAttribute('hidden'); document.getElementById('p_address').setAttribute('hidden', true)" type="button">Thay đổi địa chỉ</button>
        </div>
        <div class="textbox">
            <i>Ngày sinh    </i>
            <p id="p_birthday"><?php echo $_SESSION['birthday']?> </p>
            <input id="birthday" type="text" placeholder="<?php echo $_SESSION['birthday']?>" name="birthday" value="" hidden>
            <button class="btn" onclick="document.getElementById('birthday').removeAttribute('birthday'); document.getElementById('p_birthday').setAttribute('hidden', true)" type="button">Thay đổi ngày sinh</button>
        </div>
        <input class="btn" type="submit" name="edit-acount" value="Xác nhận">
    </form>
</section>
</body>
</html>
