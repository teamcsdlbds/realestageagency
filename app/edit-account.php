<?php include "menu.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency | Chỉnh sửa thông tin</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/edit-account.css">
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
        } </script>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_userName = $_SESSION['userName'];
    $s = $_POST['sex'];
    $birthday = $_POST['birthday'];
    foreach ($s as $sex)
    {
        if ($sex != null) $s = $sex;
    }

    //$birthday = $_POST['birthday'];
    //echo "<script type='text/javascript'>alert($s);</script>";
    //die;

    if($_POST["name"] == "") {$name = $_SESSION['name'];} else $name = $_POST["name"];
    if($_POST["phone"] == "") {$phone = $_SESSION['phone'];} else $phone = $_POST["phone"];
    if($_POST["email"] == "") {$email = $_SESSION['email'];} else $email = $_POST["email"];
    if($_POST["address"] == "") {$address = $_SESSION['address'];} else $address = $_POST["address"];
    if(empty($_POST["birthday"])) {$birthday = $_SESSION['birthday'];} else $birthday = $_POST["birthday"];
    if($_POST["password"] == "") {$password = $_SESSION['password'];} else $password = $_POST["password"];
    if(empty($_POST["sex"])) {$s = $_SESSION['sex'];}
    //if($_POST["sex"] == "") {$sex = $_SESSION['sex'];} else $sex = $_POST["sex"];
    $password = $_POST['password'];
    $password = test_input($password);
    //birthday = '$birthday'
    $type = '';
    if($_SESSION['permission'] == 0){$type = 'Customers';} else {$type = 'Agencies';}
    $query = "UPDATE {'$type'} SET password =  '$password', sex = '$s', 
                                      name = '$name',  phone = '$phone', 
                                    email = '$email', birthday = '$birthday', address = '$address' where userName = '$current_userName';";
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);}
    if ($connection->query($query) === TRUE) {
        echo "Record updated successfully";
    }
    else {
        echo("Error description: " . $connection -> error);
    }

    header('Location: /');


}
?>



<section class="section-news"  style="margin-top: 80px;">
    <form method="post" action="/app/edit-account.php" class='account-box'>
        <h1>Chỉnh sửa thông tin cá nhân</h1>
        <div class="row">
            <div class="col span-1-of-2 cell">
                <div class="textbox">
                    <i>Họ tên</i>
                    <p id="p_name">   <?php echo $_SESSION['name']?> </p>
                    <input class="xinput" id="name" type="text" placeholder="<?php echo $_SESSION['name']?>" name="name" value="" hidden>
                    <button id="btn_name" class="btn" onclick="document.getElementById('name').removeAttribute('hidden'); document.getElementById('p_name').setAttribute('hidden', true);document.getElementById('btn_name').setAttribute('hidden', true)" type="button">Thay đổi họ tên</button>
                </div>
                <div class="textbox">
                    <i>Giới tính</i>
                    <p id="p_sex">   <?php if ($_SESSION['sex'] == 0) {echo "Nam";} else echo "Nữ";?> </p>
                    <div id="d_sex" hidden>
                        <div class="item">
                            <input type="radio" name="sex[]" value="0" style="margin-top: 10px;">
                            <div style="margin-left:20px; margin-top:-18px;">Nam</div>
                        </div>
                        <div class="item">
                            <input type="radio" name="sex[]" value="1" style="margin-top: 10px;">
                            <div style="margin-left:20px; margin-top:-18px;">Nữ</div>
                        </div>

                    </div>
                    <button id="btn_sex" class="btn" onclick="document.getElementById('d_sex').removeAttribute('hidden'); document.getElementById('p_sex').setAttribute('hidden', true); document.getElementById('btn_sex').setAttribute('hidden', true)" type="button">Thay đổi giới tính</button>
                </div>
                <div class="textbox">
                    <i>Mật khẩu</i>
                    <p id="p_password">   <?php echo $_SESSION['password']?> </p>
                    <input class="xinput" id="password" type="password" placeholder="<?php echo $_SESSION['password']?>" name="password" onkeyup='check();' value="" hidden>
                    <button id="btn_pw" class="btn" onclick="document.getElementById('password').removeAttribute('hidden'); document.getElementById('cf_password').removeAttribute('hidden'); document.getElementById('p_password').setAttribute('hidden', true);document.getElementById('btn_pw').setAttribute('hidden', true)" type="button">Thay đổi mật khẩu</button>
                </div>
                <div class="textbox" id="cf_password" hidden>
                    <i>Xác nhận mật khẩu</i>
                    <label>
                        <input class="xinput" id="confirm_password" type="password" placeholder="xác nhân mật khẩu" name="confirm_password" onkeyup='check();' value="">
                        <span id='message'></span>
                    </label>
                </div>
            </div>
            <div class="col span-1-of-2 cell">
                <div class="textbox">
                    <i>Số điện thoại    </i>
                    <p id="p_phone">   <?php echo $_SESSION['phone']?> </p>
                    <input class="xinput" id="phone" type="text" placeholder="<?php echo $_SESSION['phone']?>" name="phone" value="" hidden>
                    <button id="btn_phone" class="btn" onclick="document.getElementById('phone').removeAttribute('hidden'); document.getElementById('p_phone').setAttribute('hidden', true);document.getElementById('btn_phone').setAttribute('hidden', true)" type="button">Thay đổi số điện thoại</button>
                </div>
                <div class="textbox">
                    <i>Email   </i>
                    <p id="p_email">   <?php echo $_SESSION['email']?> </p>
                    <input class="xinput" id="email" type="text" placeholder="<?php echo $_SESSION['email']?>" name="email" value="" hidden>
                    <button id="btn_email" class="btn" onclick="document.getElementById('email').removeAttribute('hidden'); document.getElementById('p_email').setAttribute('hidden', true);document.getElementById('btn_email').setAttribute('hidden', true)" type="button">Thay đổi email</button>
                </div>
                <div class="textbox">
                    <i>Địa chỉ </i>
                    <p id="p_address">   <?php echo $_SESSION['address']?> </p>
                    <input class="xinput" id="address" type="text" placeholder="<?php echo $_SESSION['address']?>" name="address" value="" hidden>
                    <button id="btn_address" class="btn" onclick="document.getElementById('address').removeAttribute('hidden'); document.getElementById('p_address').setAttribute('hidden', true);document.getElementById('btn_address').setAttribute('hidden', true)" type="button">Thay đổi địa chỉ</button>
                </div>
                <div class="textbox">
                    <i>Ngày sinh    </i>
                    <p id="p_birthday"><?php echo $_SESSION['birthday']?> </p>
                    <input class="xinput" id="birthday" type="date" name="birthday" value="" hidden>
                    <button id="btn_bd" class="btn" onclick="document.getElementById('birthday').removeAttribute('hidden'); document.getElementById('p_birthday').setAttribute('hidden', true);document.getElementById('btn_bd').setAttribute('hidden', true)" type="button">Thay đổi ngày sinh</button>
                </div>
            </div>
        </div>
        <input class="btn" type="submit" name="edit-account" value="Xác nhận">
    </form>
</section>
</body>
</html>
