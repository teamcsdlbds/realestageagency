<?php include "menu.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency | Đăng ký</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/edit-acount.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script> var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }
    </script>
    <script type="text/javascript">
        function validateForm() {
            var a = document.forms["form"]["userName"].value;
            var b = document.forms["form"]["password"].value;
            var c = document.forms["form"]["email"].value;
            var d = document.forms["form"]["phone"].value;
            if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "") {
                alert("Please Fill All Username, Password, Email and Phone");
                return false;
            }
        }
    </script>
</head>
<body>
<?php

include("connection.php");
$query_userName = "SELECT userName from Customers UNION SELECT userName from Agencies;";
$query = $connection->query($query_userName);
$list_userName = [];
while($result = $query->fetch_assoc()){
    $list_userName[] = $result['userName'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    if (in_array($userName, $list_userName)) {echo "<script type='text/javascript'>alert(\"Username đã có người sử dụng !\");</script>";}
    else {
        $s = $_POST['sex'];
        if (!empty($s)) foreach ($s as $sex)
        {
            if ($sex != null) $s = $sex;
        } else $s = '';

        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $birthday = $_POST["birthday"];
        $password = $_POST["password"];
        //if ($birthday == '') $birthday = NULL;

        //birthday = '$birthday'
        $query = "INSERT INTO Customers (password, sex, name, phone, email, birthday, address, userName) 
              VALUES ('$password',NULLIF('$s',''),'$name',  '$phone','$email',  NULLIF('$birthday',''), '$address', '$userName');";

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);}
        if ($connection->query($query) === TRUE) {
            echo "<script type='text/javascript'>alert(\"Record successfully !\");</script>";}
        else {
            echo "<script type='text/javascript'>alert(\" There is problem with the connection, try again later ! \");</script>";
            echo "<p><br><br><br><br><br><br><br><br><br><br><br><br> '$name' '$password' '$phone' '$email' '$birthday' '$address' '$s' '$userName' <p>";
            die;
        }
        //echo("Error description: " . $connection -> error);



        header('Location: ../app/login.php');
    }
}
?>


<section class="section-news"  style="margin-top: 80px;">
    <form method="post" action="" class='account-box' name="form" onsubmit="return validateForm()">
        <h1>Đăng kí tài khoản</h1>
        <div class="textbox">
            <i>Họ tên</i>
            <input type="text" placeholder="Họ tên" name="name" value="">
        </div>
        <div class="textbox">
            <i>Username</i>
            <input type="text" placeholder="user name" name="userName" value="">
            <script></script>
        </div>
        <div class="textbox">
            <i>Mật khẩu</i>
            <input id="password" type="password" placeholder="mật khẩu" name="password" value="">
        </div>
        <div class="textbox">
            <i>Xác nhận mật khẩu</i>
            <label>
                <input id="confirm_password" type="password" placeholder="xác nhân mật khẩu" name="confirm_password" onkeyup='check();' value="">
                <span id='message'></span>
            </label>
        </div>
        <div class="textbox">
            <i>Giới tính</i>
            <div >
                <input type="radio" name="sex[]" value="0" style="margin-left : 0">
                <label for="male"> Nam</label><br>
                <input type="radio" name="sex[]" value="1" style="margin-left : 90px">
                <label for="female"> Nữ</label><br>
            </div>
        </div>
        <div class="textbox">
            <i>Số điện thoại</i>
            <input type="text" placeholder="số điện thoại" name="phone" value="">
        </div>
        <div class="textbox">
            <i>Email</i>
            <input type="text" placeholder="email" name="email" value="">
        </div>
        <div class="textbox">
            <i>Địa chỉ</i>
            <input type="text" placeholder="Địa chỉ" name="address" value="">
        </div>
        <div class="textbox">
            <i>Ngày sinh</i>
            <input type="date" name="birthday" value="">
        </div>
        <input class="btn" type="submit" name="sign-in" value="Xác nhận">
    </form>
</section>
</body>
</html>
