<?php
    include "menu.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết BĐS</title>
    <link rel="shortcut icon" href="https://www.mitdream.com/wp-content/uploads/2019/12/house-2.png"/>
    <link rel="stylesheet" href="../css/detail.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
        $request = $_SERVER['REQUEST_URI'];
        $idDetail = (int) filter_var($request, FILTER_SANITIZE_NUMBER_INT);
        $_SESSION["idDetail"] = $idDetail;
        include "connection.php";
        $query = "SELECT * from RealEstates where id='$idDetail';";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class=\"image-intro\" id=\"home\">";
                echo "<img src=\"../".$row["url_img"]."\" alt=\"detail\" class=\"image-intro-item\">";
                echo "<img src=\"../".$row["url_img"]."\" alt=\"detail\" class=\"image-intro-item\">";
            echo "</div>";
            echo "<div class=\"content-detail\">";
                echo "<div class=\"title-detail\">";
                    echo "<b> ".$row["name"]. "</b>";
                    $REname = $row["name"];
                    $_SESSION["REname"] = $REname;
                echo "</div>";
                echo "<div class=\"location-detail\">";
                    echo "<i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>";
                    echo " " . $row["address"];
                echo "</div>";
                $donvi = "tỷ";
                if ($row["type"] == 1) $donvi = "triệu/tháng";
                echo "<div class=\"price-detail\"> <b>".$row["price"]. " " . $donvi ."</b></div>";
                echo "<hr>";
                echo "<div class=\"row\">";
                    echo "<div class=\"col span-2-of-3 body-detail\">";
                        echo "<h4>Thông tin chính</h4><hr>";
                        echo "<div class=\"main-info\">";
                            echo "<ul>";
                                echo "<li> Diện tích: " . $row["area"] . "m2 </li>";
                                echo "<li> Số phòng ngủ: ". $row["room"] . " </li>";
                                echo "<li> Số phòng WC: ". $row["wc"] . " </li>";
                            echo "</ul>";
                        echo "</div>";
                        echo "<h4>Mô tả</h4><hr>";
                        echo "<div class=\"main-info\">";
                            echo "<p style=\"text-align: justify\">".$row["description"]."</p>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col span-1-of-3 agency-of-detail\">";
                        echo "<div class=\"box-agency\">";
                            echo "<div class=\"box-title\"><b>Liên hệ môi giới</b></div>";
                            echo "<div class=\"row\">";
                                echo "<div class=\"col span-1-of-3\">";
                                    echo "<img src=\"http://tuvanascvn938.chiliweb.org/wp-content/uploads/2017/03/tiep-vien-hang-khong.png\" alt=\"detail\" class=\"image-agency\">";
                                echo "</div>";
                                echo "<div class=\"col span-2-of-3\">";
                                $userNameAgency = $row["userNameAgency"];
                                $_SESSION["userNameAgency"] = $userNameAgency;
                                $query = "SELECT * from Agencies where Agencies.userName = '$userNameAgency' ";
                                $result = $connection->query($query);
                                $row = $result->fetch_assoc();
                                    echo "<div class=\"agency-name\"><b>". $row["name"] ."</b></div>";
                                    echo "<div class=\"agency-phone\">". $row["phone"] ."</div>";
                                    echo "<div class=\"agency-email\">". $row["email"] ."</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        if (isset($_SESSION["permission"]) && $_SESSION["permission"] == 0) {
                            echo "<div class=\"group-button\" style=\"margin-top:50px; margin-left: 60px;\" >";
                                $userNameCustomer = $_SESSION["userName"];
                                $query = "SELECT * from FavoriteRealEstates where idRealEstate='$idDetail' and userNameCustomer = '$userNameCustomer'";
                                $result = $connection->query($query);
                                if ($result->num_rows > 0) {
                                    echo "<div id=\"button-favorite\"class=\"button-more\">Quan tâm</div>";
                                }
                                else {
                                    echo "<div id=\"button-favorite\"class=\"button-more change-background\">Quan tâm</div>";
                                }
                                echo "<div id=\"button-schedule-appointment\" class=\"button-contact button-more\">Hẹn lịch tư vấn</div>";
                            echo "</div>";
                        }
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
        else {
            header('Location: /');
        }
        include "footer.php";
    ?>
        <div class="dark-screen"></div>
    <div class="modal-dialog">
        <div class="dia-p1 noselect">
            <div class="dia-title"><h3>Hẹn lịch tư vấn</h3></div>
            <div class="btn-close"></div>
        </div>
        <div class="dia-p2">
            <div class="group-label noselect">
                <div class="label1">Tên khách hàng</div>
                <div class="label2">Tên BĐS</div>
                <div class="label3">Ngày xem BĐS <i style="color: #ff6a00">(*)</i></div>
                <div class="label4">Ghi chú</div>
            </div>
            <div class="group-input">
                <?php echo "<input type=\"text\" class=\"input-hire input-dia\" style=\"margin-top: 35px;\" value=\"".$_SESSION['name']."\" readonly>"; ?>
                <?php echo "<input type=\"text\" class=\"input-hire input-dia\" value=\"".$_SESSION['REname']."\" readonly>"; ?>
                <!-- <input type="text" class="txtEmployeeName input-dia request"> -->
                <input type="date" class="input-date input-dia request">
                <textarea  class="input-message input-dia" style="height:90px !important;" placeholder="Lời nhắn (vd: Buổi, thời gian,...)"></textarea>
            </div>
        </div>
        <div class="dia-p3">
            <div class="btnSave noselect">Lưu lại</div>
            <div class="btnExit noselect">Thoát</div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#button-favorite").mousedown(function(){
            $.ajax({
                url: "../app/handling-favorite-real-estate.php",
                type: "POST", 
                data: {     }
            }).always(function(result){console.log(result)});   
            $(this).toggleClass("change-background");    
        });
        $("#button-schedule-appointment").click(function(){
            $(" .dark-screen").show();
            $(" .modal-dialog").fadeIn();
            $(" .modal-dialog").show();
            // $(".txtEmployeeCode").focus();
            document.getElementById("home").scrollIntoView();
        });
        $(".btnExit").click(function(){
            $(" .dark-screen").hide();
            $(" .modal-dialog").hide(500);
        });
        $(".btnSave").click(function(){
            var inputDate = $(".input-date").val();
            var inputMessage = $(".input-message").val();
            if (!inputMessage) inputMessage = "";
            if (!inputDate) {
                alert("Lưu không thành công!");
            } else {
                $.ajax({
                    url: "../app/handling-schedule-appointment.php",
                    type: "POST", 
                    data: {
                        inputDate: inputDate,
                        inputMessage: inputMessage
                    }
                }).always(function(result){console.log(result)});   
                alert("Lưu thành công!");
                $(" .dark-screen").hide();
                $(" .modal-dialog").hide(500);
            }
        });
        $(".request").blur(function(){
            var value = this.value;
            if (!value) {
                $(this).addClass("request-error");
            } else {
                $(this).removeClass("request-error");
            }
        });
        $(".request").blur(this.checkrequest);
    });
</script>
</html>