<?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    include "connection.php";
    if ($connection->connect_error) {
        echo "324354768909";
    }
    $userName = "testadmin";
    $password = "123456789";
    $userName = test_input($userName);
    $password = test_input($password);
    if ($userName == "" || $password == "") {
        echo "<script type='text/javascript'>alert('Đăng nhập lại!');</script>";
    }
    else {
        echo $userName . " " . $password;
        // $sql = "SELECT userName, password FROM Agency WHERE userName='$userName' and password='$password;'";
        $result = $connection->query("SELECT * from Agency where userName = '$userName' and password = '$password'");

        
        // $count = mysqli_num_rows($result);
        // $query = "";
        // $result = $connection->query($query);
        if ($result->num_rows > 0) {
            echo "Thanhf coo";
            $row = $result->fetch_assoc();
            echo $row["name"];
        }
        else echo "fail";
    }
?>