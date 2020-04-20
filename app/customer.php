<?php 
    session_start();
    include "menu.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency | Quản lý khách hàng</title>
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="content">
        
        <?php 
            if (!isset($_SESSION["permision"]) || $_SESSION["permision"] == 0) {
                include "prohibit.php";
            } else {
                include "connection.php";
                $userName = $_SESSION["userName"];
                $query = "SELECT Customers.name as 'Tên khách hàng', Customers.phone as 'SĐT', Details.name as 'BĐS' FROM Details, FavoriteDetails, Customers WHERE Details.userNameAgency = '$userName' AND Details.id = FavoriteDetails.idDetail AND FavoriteDetails.userNameCustomer = Customers.userName";
                $result = $connection->query($query);
                if ($connection->connect_error) {
                    echo "<script type='text/javascript'>alert('Vui lòng thử lại sau!');</script>";
                    header('Location: ../app/home.php');
                } 
                echo "<h2 class='title-h2'>Quản lý khách hàng</h2>";
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div style='width:1000px; margin-right:20px;'>" . $row["Tên khách hàng"] . " " . $row["SĐT"]. " " . $row["BĐS"]. "toi"."</div>";
                        echo "toi";
                    }
                    
                } else {
                    echo "Chưa có khách hàng nào!";
                }
            }
        ?>
    </div>
</body>
</html>