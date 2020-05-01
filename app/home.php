<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "menu.php";?>
    <header class="header-home"  style="margin-top: 70px;"> </header>
    <section class="section-news events">
        <h2 class="title-h2">Sự kiện nổi bật</h2>
        <div class="row">
            <div class="col span-1-of-3 cell">
                <img src="../image/img-event-001.jpg" alt="event" class="image">
            </div>
            <div class="col span-1-of-3 cell">
                <img src="../image/img-event-002.jpg" alt="event" class="image">
            </div>
            <div class="col span-1-of-3 cell">
                <img src="../image/img-event-003.jpg" alt="event" class="image">
            </div>
        </div>
    </section>
    <section class="section-news retails retails-home">
        <h2 class="title-h2">Nhà lẻ bán</h2>
        <?php
            include "connection.php";
            $query = "SELECT * FROM Details WHERE Details.type = 0";
            $result = $connection->query($query);
            if ($connection->connect_error) {
                header('Location: ../app/home.php');
            }
            if ($result->num_rows > 0) {
                $totalCells = 0;
                $rows = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($totalCells == 8) break;
                    if ($rows == 0) {
                        echo "<div class='row' style='font-size: 15px;'>";
                    }
                    if ($rows < 4) {
                        echo "<div class='col span-1-of-4 cell'>";
                            echo "<a href=\"/detail/" . $row["id"] . "\" style='text-decoration: none;'>";
                                echo "<img src=\"../" . $row["url_img"] . "\"" . " alt='retail' class='image'>";
                                echo "<div class='image-title'><b>" . $row["name"] . "</b></div>";
                            echo "</a>";
                            echo "<div class='location'>";
                                echo "<i class='fa fa-map-marker' aria-hidden='true'></i> " . $row["address"];
                            echo "</div>";
                            echo "<div class='price'>";
                                echo "<b>Giá: ~ " . $row["price"] . " tỷ</b>";
                            echo "</div>";
                            echo "<div class='info'>";
                                echo "<div class='bed'><i class='fa fa-bed' aria-hidden='true'></i> " . $row["room"] . "</div>";
                                echo "<div class='bath'><i class='fa fa-bath' aria-hidden='true'></i> " . $row["wc"] . "</div>";
                                echo "<div class='area'><i class='fa fa-home' aria-hidden='true'></i> " . $row["area"] . "</div>";
                            echo "</div>";
                        echo "</div>";
                    $rows++;
                    $totalCells++;
                    }
                    if ($rows == 4) {
                        echo "</div>";
                        $rows = 0;
                    }
                }
                if ($rows < 4) echo "</div>";
            }
        ?>
    </section>
    <section class="section-news hired">
        <h2 class="title-h2">Nhà lẻ cho thuê</h2>
        <?php
            include "connection.php";
            $query = "SELECT * FROM Details WHERE Details.type = 1";
            $result = $connection->query($query);
            if ($connection->connect_error) {
                header('Location: ../app/home.php');
            }
            if ($result->num_rows > 0) {
                $totalCells = 0;
                $rows = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($totalCells == 8) break;
                    if ($rows == 0) {
                        echo "<div class='row' style='font-size: 15px;'>";
                    }
                    if ($rows < 4) {
                        echo "<div class='col span-1-of-4 cell'>";
                            echo "<a href=\"/detail/" . $row["id"] . "\" style='text-decoration: none;'>";
                                echo "<img src=\"../" . $row["url_img"] . "\"" . " alt='retail' class='image'>";
                                echo "<div class='image-title'><b>" . $row["name"] . "</b></div>";
                            echo "</a>";
                            echo "<div class='location'>";
                                echo "<i class='fa fa-map-marker' aria-hidden='true'></i> " . $row["address"];
                            echo "</div>";
                            echo "<div class='price'>";
                                echo "<b>Giá: ~ " . $row["price"] . " triệu/tháng</b>";
                            echo "</div>";
                            echo "<div class='info'>";
                                echo "<div class='bed'><i class='fa fa-bed' aria-hidden='true'></i> " . $row["room"] . "</div>";
                                echo "<div class='bath'><i class='fa fa-bath' aria-hidden='true'></i> " . $row["wc"] . "</div>";
                                echo "<div class='area'><i class='fa fa-home' aria-hidden='true'></i> " . $row["area"] . "</div>";
                            echo "</div>";
                        echo "</div>";
                    $rows++;
                    $totalCells++;
                    }
                    if ($rows == 4) {
                        echo "</div>";
                        $rows = 0;
                    }
                }
                if ($rows < 4) echo "</div>";
            }
        ?>
    </section>
    <footer class="footer-home" style="font-size: 18px;">
        <div class="row">
            <div class="col span-2-of-4 cell info-company">
                <div><img src="../image/logo-batdongsan.png" alt="logo" class="logo"></div>
                <div class="location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    Số 245 Nguyễn Ngọc Vũ <br>
                    Trung Hòa, Cầu Giấy, Hà Nội
                </div>
                <div class="hotline"><i class="fa fa-phone" aria-hidden="true"></i> <b>18006668</b> </div>
                <div class="email"><i class="fa fa-envelope" aria-hidden="true"></i> <b >hotro@batdongsan.vn</b> </div>
            </div>
            <div class="col span-1-of-4 cell">
                <h2 style="padding-top: 80px; padding-bottom: 15px;">Tìm hiểu thêm</h2>
                Dự án Bất động sản <br>
                Nhà bán <br>
                Nhà cho thuê <br>
                Điều khoản sử dụng
            </div>
            <div class="col span-1-of-4 cell" style="padding-top: 80px;">
                <div><img src="../image/dathongbao.png" alt="logo" class="logo"></div>
                <i class="fa fa-facebook-official fa-5x icon-facebook" aria-hidden="true"></i>
                <i class="fa fa-youtube-play fa-5x icon-youtube" style="padding-left: 10px;"  aria-hidden="true"></i>
            </div>
        </div>
    </footer>
</body>
</html>
