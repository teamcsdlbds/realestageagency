<?php 
    
    $request = $_SERVER['REQUEST_URI'];

    if (preg_match("/^\/detail\/\d+$/", $request)) {
        require __DIR__ . '/app/detail.php';
    }
        
    else {
        switch ($request) {
            case '/' :
                require __DIR__ . '/app/home.php';
                break;
            case '' :
                require __DIR__ . '/app/home.php';
                break;
            case '/trang-chu' :
                require __DIR__ . '/app/home.php';
                break;
            case '/thue-nha' :
                require __DIR__ . '/app/hired.php';
                break;
            case '/mua-nha' :
                require __DIR__ . '/app/retails.php';
                break;
            case '/dang-nhap' :
                require __DIR__ . '/app/login.php';
                break;
            case '/tai-khoan' :
                require __DIR__ . '/app/myaccount.php';
                break;
            case '/dang-ky' :
                require __DIR__ . '/app/signup.php';
                break;
            case '/chinh-sua-thong-tin' :
                require __DIR__ . '/app/edit-account.php';
                break;
            case '/khach-hang' :
                require __DIR__ . '/app/customer.php';
                break;
            case '/quan-ly-bds' :
                require __DIR__ . '/app/my-real-estate.php';
                break;
            case '/bds-quan-tam' :
                require __DIR__ . '/app/favorite-real-estate.php';
                break;
            // case '/retails.php' :
            //     require __DIR__ . '/app/retails.php';
            //     break;
            default:
            //     http_response_code(404);
                require __DIR__ . '/app/home.php';
                break;
        }
    }
?>

