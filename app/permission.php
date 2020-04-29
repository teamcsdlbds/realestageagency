<?php 
    if (isset($_SESSION["userName"]) == false) {
        header('Location: /app/login.php');
    }else {
        if (isset($_SESSION['permission']) == true) {
            $permission = $_SESSION['permission'];
            if ($permission == '0') {
                
                
                exit();
            }
        }
    }
?>