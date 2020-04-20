<?php 
    if (isset($_SESSION["userName"]) == false) {
        header('Location: /app/login.php');
    }else {
        if (isset($_SESSION['permision']) == true) {
            $permission = $_SESSION['permision'];
            if ($permission == '0') {
                
                
                exit();
            }
        }
    }
?>