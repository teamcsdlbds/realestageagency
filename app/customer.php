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
    <?php 
        include "menu.php";
        if (!isset($_SESSION["permission"]) || $_SESSION["permission"] == 0) {
            include "prohibit.php";
        } else {
            include "connection.php";
            $userName = $_SESSION["userName"];
            $query = "SELECT Customers.name as 'Tên khách hàng', Customers.phone as 'SĐT', Details.name as 'BĐS', Details.url_img as 'IMG', Details.address as 'add' FROM Details, FavoriteDetails, Customers WHERE Details.userNameAgency = '$userName' AND Details.id = FavoriteDetails.idDetail AND FavoriteDetails.userNameCustomer = Customers.userName";
            $result = $connection->query($query);
            if ($connection->connect_error) {
                echo "<script type='text/javascript'>alert('Vui lòng thử lại sau!');</script>";
                header('Location: ../app/home.php');
            } 
            echo "<div class='body-cus'> <div class='content'> ";
            echo "<div class='box-title'> <h2 class='title-h2 title'>Quản lý khách hàng</h2> </div>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='row item'>";
                        echo "<div class='col span-1-of-3 col1'>";
                            echo "<img src=\"../" . $row["IMG"] . "\"" . " alt='retail' class='image'>";
                        echo "</div>";
                        echo "<div class='col span-2-of-3 col2'>";
                            echo "<div class='name-detail'>". $row["BĐS"] . "</div>";
                            echo "<div class='address-detail'> ";
                                echo "<i class='fa fa-map-marker' aria-hidden='true'></i>";
                                echo " " . $row["add"];
                            echo "</div><hr>";
                            echo "<div class='customer-name'>Khách hàng: ". $row["Tên khách hàng"] . "</div>";
                            echo "<div class='customer-phone'>SĐT:" . $row["SĐT"] . "</div>";
                        echo "</div>";
                    echo "</div>";
                }
                
            } else {
                echo "Chưa có khách hàng nào!";
            }
            echo "</div> </div>";
        }
    ?>
</body>
</html>