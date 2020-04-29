<?php
    include "menu.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency</title>
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
        include "connection.php";
        $query = "SELECT * from Details where id='$idDetail';";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class=\"image-intro\">";
                echo "<img src=\"../".$row["url_img"]."\" alt=\"detail\" class=\"image-intro-item\">";
                echo "<img src=\"../".$row["url_img"]."\" alt=\"detail\" class=\"image-intro-item\">";
            echo "</div>";
            echo "<div class=\"content-detail\">";
                echo "<div class=\"title-detail\">";
                    echo "<b> ".$row["name"]. "</b>";
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
                            echo "<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error repudiandae numquam repellat placeat blanditiis veritatis aut officiis. Sapiente architecto veniam facere nobis, vitae autem quos consequuntur in nemo sint excepturi.</p>";
                            echo "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem, asperiores veniam pariatur natus aliquam eligendi nulla ratione unde laborum consequuntur accusantium, eos praesentium cupiditate? Non enim quibusdam pariatur cumque laudantium.</p>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col span-1-of-3 agency-of-detail\">";
                        echo "<div class=\"box-agency\">";
                            echo "<div class=\"box-title\"><b>Liên hệ môi giới</b></div>";
                            echo "<div class=\"row\">";
                                echo "<div class=\"col span-1-of-3\">";
                                    echo "<img src=\"../".$row["url_img"]."\" alt=\"detail\" class=\"image-agency\">";
                                echo "</div>";
                                echo "<div class=\"col span-2-of-3\">";
                                $userNameAgency = $row["userNameAgency"];
                                $query = "SELECT * from Agencies where Agencies.userName = '$userNameAgency' ";
                                $result = $connection->query($query);
                                $row = $result->fetch_assoc();
                                    echo "<div class=\"agency-name\"><b>". $row["name"] ."</b></div>";
                                    echo "<div class=\"agency-phone\">". $row["phone"] ."</div>";
                                    echo "<div class=\"agency-email\">". $row["email"] ."</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
        else {
            header('Location: /');
        }
    ?>
</body>
</html>