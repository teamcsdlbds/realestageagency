<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency | Quản lý BĐS</title>
    <link rel="stylesheet" href="../css/my-details.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body> 
<div class="temp" style="padding-top: 50px;">
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
            <div class="sdt_cus but_info_cus info_cus_line">Giá: ~6.5 tỷ</div><br>
            <div class="email_cus but_info_cus">phuoail.com</div>
        </div>
    </div>
    <?php 
        include "menu.php";
        if (!isset($_SESSION["permission"]) || $_SESSION["permission"] == 0) {
            include "prohibit.php";
        } else {
            include "connection.php";
            $userName = $_SESSION["userName"];
            $query = "SELECT * FROM Details WHERE Details.userNameAgency = '$userName'";
            $result = $connection->query($query);
            if ($connection->connect_error) {
                echo "<script type='text/javascript'>alert('Vui lòng thử lại sau!');</script>";
                header('Location: ../app/home.php');
            } 
            echo "<div class='body-content'><div class='content'> ";
            echo "<div class='box-title'> <h2 class='title-h2 title'>Quản lý Bất động sản</h2> </div>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<hr><div class='row item'>";
                        echo "<div class='col span-1-of-3 col1'>";
                            echo "<img src=\"../" . $row["url_img"] . "\"" . " alt='retail' class='image'>";
                        echo "</div>";
                        echo "<div class='col span-2-of-3 col2'>";
                            echo "<div class=\"image-title\"><b>".$row["name"]."</b></div>";
                            echo "<div class=\"location\">";
                                echo "<i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i> ".$row["address"];
                            echo "</div>";
                            echo "<div class=\"price\">";                 
                                echo "<b>Giá: ~ ".$row["price"]." tỷ </b>";
                            echo "</div>";
                            echo "<div class=\"info\">";
                                echo "<div class=\"bed\"><i class=\"fa fa-bed\" aria-hidden=\"true\"></i> ".$row["room"]."</div>";
                                echo "<div class=\"bath\"><i class=\"fa fa-bath\" aria-hidden=\"true\"></i> ".$row["wc"]."</div>";
                                echo "<div class=\"area\"><i class=\"fa fa-home\" aria-hidden=\"true\"></i> ".$row["area"]."m2</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
                
            } else {
                echo "Chưa có bất động sản nào!";
            }
            echo "</div></div>";
        }
    ?>
</body>
</html>