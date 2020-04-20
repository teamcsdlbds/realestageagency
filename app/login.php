<?php 
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency | Đăng nhập</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/login.css">
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userName = $_POST["userName"];
            $password = $_POST["password"];
            $userName = test_input($userName);
            $password = test_input($password);
            if ($userName == "" || $password == "") {
                echo "<script type='text/javascript'>alert('Đăng nhập lại!');</script>";
            }
            else {
                $query = "SELECT * FROM Agencies where userName = '$userName' and password = '$password';";
                $result = $connection->query($query);
                if ($connection->connect_error) {
                    echo "<script type='text/javascript'>alert('Vui lòng thử lại sau!');</script>";
                    header('Location: ../app/home.php');
                } 
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION["permision"] = 1;
                    $_SESSION["userName"] = $row["userName"];
                    $_SESSION["name"] = $row["name"];
                    header('Location: ../app/home.php');
                } else {
                    $query = "SELECT * from Customers where userName='$userName' and password='$password';";
                    $result = $connection->query($query);                  
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $_SESSION["permision"] = 0;
                        $_SESSION["userName"] = $row["userName"];
                        $_SESSION["name"] = $row["name"];
                        header('Location: ../app/home.php');
                    } 
                    else {
                        echo "<script type='text/javascript'>alert('Đăng nhập lại!');</script>";
                    }
                }
                
            }   
            // $_SESSION[""]
        }
    ?>
    
    <?php include "menu.php";?>
    <section class="section-news"  style="margin-top: 80px;">
        <form method="post" action="/app/login.php" class="login-box">
            <h1>Đăng nhập</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="userName" value="">
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" value="">
            </div>
            <input class="btn" type="submit" name="login" value="Đăng nhập">
            <a href="/app/signup.php">Đăng ký khách hàng mới?</a>
        </form>
    </section>
</body>
</html>