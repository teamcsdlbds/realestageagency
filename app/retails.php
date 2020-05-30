<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Agency | Nhà lẻ bán</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/retails.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "menu.php";?>
    <section class="section-news retails" style="margin-top: 80px;">
        <h2 class="title-h2">Nhà lẻ bán</h2>
        <?php
            include "connection.php";
            $query = "SELECT * FROM Details WHERE Details.type = 0";
            $result = $connection->query($query);
            if ($connection->connect_error) {
                header('Location: ../app/home.php');
            }
            if ($result->num_rows > 0) {
                $rows = 0;
                while ($row = $result->fetch_assoc()) {
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
                                echo "<div class='area'><i class='fa fa-home' aria-hidden='true'></i> " . $row["area"] . " m2</div>";
                            echo "</div>";
                        echo "</div>";
                    $rows++;
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
    <?php include "footer.php";?>
</body>
</html>
