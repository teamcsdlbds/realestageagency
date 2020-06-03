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

    <!-- <div class="temp" style="padding-top: 50px;">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo laudantium molestiae repudiandae dolorem ipsa necessitatibus ducimus at, ea ipsam minima quae, excepturi dicta! Expedita earum odio aliquam quaerat modi voluptate.
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non ipsa excepturi, consequatur dignissimos, quisquam dolorum rerum debitis fugit aperiam optio reiciendis. Est ab culpa velit provident nulla omnis fuga exercitationem!
    </div>
    <div class="box_special">
        <div class="title_box_special" style="padding: 15px 20px;">
            <div class="name_bds bold_title_box"><b>Nhà số A1</b></div>
            <div class="address_bds" style="padding-top: 12px;"><i class='fa fa-map-marker' aria-hidden='true'></i> 275 Trần Quốc Hoàn, Bắc Từ Liêm</div>           
        </div>
        <div class="imgBDS">
            <img src="../image/image-retail-1.jpg" alt="detail"  style="width: 100%;">
        </div>
        <div class="info_cus" style="padding: 15px 20px;">
            <div class="name_cus bold_title_box info_cus_line"><b>Nguyễn Đức Tới</b></div>
            <div class="sdt_cus but_info_cus info_cus_line">0982768798</div><br>
            <div class="email_cus but_info_cus">phuoail.com</div>
        </div>
    </div> -->
    
    <?php 
        include "menu.php";
        if (!isset($_SESSION["permission"]) || $_SESSION["permission"] == 0) {
            include "prohibit.php";
        } else {
            include "connection.php";
            $userName = $_SESSION["userName"];
            $query = "SELECT Customers.name as 'Tên khách hàng', Customers.email as 'email', Customers.phone as 'SĐT', RealEstates.name as 'BĐS', RealEstates.url_img as 'IMG', RealEstates.address as 'add' FROM RealEstates, FavoriteRealEstates, Customers WHERE RealEstates.userNameAgency = '$userName' AND RealEstates.id = FavoriteRealEstates.idRealEstate AND FavoriteRealEstates.userNameCustomer = Customers.userName";
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
                    $num_box = 0;
                    while ($row = $result->fetch_assoc()) {
                        if ($num_box == 0) {
                            echo "<div class=\"row\">";
                        }
                        echo "<div class=\"box_special col span-1-of-3\">";
                        echo "<div class=\"title_box_special\" style=\"padding: 15px 20px;\">";
                        echo "<div class=\"name_bds bold_title_box\"><b>".$row["BĐS"]."</b></div>";
                        echo "<div class=\"address_bds\" style=\"padding-top: 12px;\"><i class='fa fa-map-marker' aria-hidden='true'></i>"." ".$row["add"]."</div>";
                        echo "</div>";
                        echo "<div class=\"imgBDS\">";
                        echo "<img src=\"../".$row["IMG"]."\" style=\"width: 100%;\">";
                        echo "</div>";
                        echo "<div class=\"info_cus\" style=\"padding: 15px 20px;\">";
                        echo "<div class=\"name_cus bold_title_box info_cus_line\"><b>".$row["Tên khách hàng"]."</b></div>";
                        echo "<div class=\"sdt_cus but_info_cus info_cus_line\"><i class=\"fa fa-phone\"></i>"." ".$row["SĐT"]."</div><br>";
                        echo "<div class=\"email_cus but_info_cus\"><i class=\"fa fa-envelope\">    </i>"." ".$row["email"]."</div>";
                        echo "</div>";
                        echo "</div>";
                        $num_box++;
                        if ($num_box == 3) {
                            echo "</div>";
                            $num_box = 0;
                        }
                    }
                    if ($num_box > 0) {
                        echo "</div>";
                    }
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
                $query = "SELECT DISTINCT Customers.name as 'Tên khách hàng', Customers.birthday as 'Ngày sinh', Customers.sex as 'Giới tính', Customers.phone as 'SĐT', Customers.email as 'Email' FROM RealEstates, FavoriteRealEstates, Customers WHERE RealEstates.userNameAgency = '$userName' AND RealEstates.id = FavoriteRealEstates.idRealEstate AND FavoriteRealEstates.userNameCustomer = Customers.userName";
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