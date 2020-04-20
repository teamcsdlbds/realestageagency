<?php 
    
    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case '/' :
            require __DIR__ . '/app/home.php';
            break;
        case '' :
            require __DIR__ . '/app/home.php';
            break;
        case '/hired.php' :
            require __DIR__ . '/app/hired.php';
            break;
        case '/login.php' :
            require __DIR__ . '/app/login.php';
            break;
        case '/retails.php' :
            require __DIR__ . '/app/retails.php';
            break;
        default:
        //     http_response_code(404);
            require __DIR__ . '/app/home.php';
            break;
    }
?>

