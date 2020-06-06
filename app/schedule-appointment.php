<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch hẹn của tôi</title>
    <link rel="shortcut icon" href="https://www.mitdream.com/wp-content/uploads/2019/12/house-2.png"/>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/schedule-appointment.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background: rgb(238, 238, 238);">    
    <?php 
        include "menu.php";
        if (!isset($_SESSION["permission"])) {
            include "prohibit.php";
        } else {
            include "connection.php";
            $userName = $_SESSION["userName"];
            $query = "SELECT ScheduleAppointment.*, RealEstates.name AS 'BĐS', RealEstates.address AS 'add', Agencies.name AS 'Người' FROM ScheduleAppointment INNER JOIN RealEstates ON ScheduleAppointment.idRealEstate = RealEstates.id INNER JOIN Agencies ON RealEstates.userNameAgency = Agencies.userName WHERE ScheduleAppointment.userNameCustomer = '$userName'";
            if ($_SESSION["permission"] == 1) {
                $query = "SELECT ScheduleAppointment.*, Customers.name AS 'Người', RealEstates.name AS 'BĐS', RealEstates.address AS 'add'  FROM ScheduleAppointment INNER JOIN Customers ON ScheduleAppointment.userNameCustomer = Customers.userName INNER JOIN RealEstates ON RealEstates.id = ScheduleAppointment.idRealEstate WHERE ScheduleAppointment.idRealEstate IN (SELECT RealEstates.id FROM RealEstates WHERE RealEstates.userNameAgency = '$userName')";
            }
            $result = $connection->query($query);
            if ($connection->connect_error) {
                echo "<script type='text/javascript'>alert('Vui lòng thử lại sau!');</script>";
                header('Location: ../app/home.php');
            } 
            echo "<div class='body-cus'> <div class='content'> ";
            echo "<h1 class='title-h2 title' style='font-size: 25px;'> Lịch hẹn của tôi </h1> ";
            echo "<div id=\"tab2\" class=\"tabcontent\">";
                echo "<table id=\"lichen\">";
                echo "<tr>";
                    if ($_SESSION["permission"] == 0) echo "<th>Tên môi giới</th>";
                    else echo "<th>Tên khách hàng</th>";
                    echo "<th>Bất động sản</th>";
                    echo "<th>Địa chỉ</th>";
                    echo "<th>Ngày hẹn</th>";
                    echo "<th>Ghi chú</th>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["Người"]."</td>";
                    echo "<td>".$row["BĐS"]."</td>";
                    echo "<td>".$row["add"]."</td>";
                    echo "<td>".$row["date"]."</td>";
                    echo "<td>".$row["note"]."</td>";
                    echo "</tr>";
                }                
                echo "</table>";
            echo "</div>";            
            echo "</div> </div>";
        }
    ?>
</body>