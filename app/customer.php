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
<body style="background: rgb(238, 238, 238);"> 
    
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
            echo "<div class=\"tab box-title\">";
                echo "<button id=\"tab-default\" class=\"tablinks title-h2 title\" onclick=\"openTab(event, 'tab1')\"><b>Quản lý khách hàng</b></button>";
                echo "<button class=\"tablinks title-h2 title\" onclick=\"openTab(event, 'tab2')\"><b>Danh sách khách hàng</b></button>";
            echo "</div>";
            echo "<div id=\"tab1\" class=\"tabcontent\">";
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
            echo "</div>";

            echo "<div id=\"tab2\" class=\"tabcontent\">";
                echo "<table id=\"customers\">";
                echo "<tr>";
                    echo "<th>Họ tên</th>";
                    echo "<th>Ngày sinh</th>";
                    echo "<th>Giới tính</th>";
                    echo "<th>SĐT</th>";
                    echo "<th>Email</th>";
                echo "</tr>";
                $query = "SELECT DISTINCT Customers.name as 'Tên khách hàng', Customers.birthday as 'Ngày sinh', Customers.sex as 'Giới tính', Customers.phone as 'SĐT', Customers.email as 'Email' FROM Details, FavoriteDetails, Customers WHERE Details.userNameAgency = '$userName' AND Details.id = FavoriteDetails.idDetail AND FavoriteDetails.userNameCustomer = Customers.userName";
                $result = $connection->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["Tên khách hàng"]."</td>";
                    echo "<td>".$row["Ngày sinh"]."</td>";
                    echo "<td>";
                        if ($row["Giới tính"] == 0) echo "Nam"; else echo "Nữ";
                    echo "</td>";
                    echo "<td>".$row["SĐT"]."</td>";
                    echo "<td>".$row["Email"]."</td>";
                    echo "</tr>";
                }                
                echo "</table>";
            echo "</div>";
            echo "</div> </div>";
        }
    ?>
<script>
function openTab(evt, typeTab) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(typeTab).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById('tab-default').click();
</script>
</body>
</html>