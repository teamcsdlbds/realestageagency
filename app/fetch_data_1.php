<?php

    include "connection.php";

    if (isset($_POST["action"])) {
        $query = "SELECT * FROM RealEstates WHERE RealEstates.type = 1";

        if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
            $query .= " AND price BETWEEN " . $_POST["minimum_price"] . " AND " . $_POST["maximum_price"];
        }

        if (isset($_POST["minimum_area"], $_POST["maximum_area"]) && !empty($_POST["minimum_area"]) && !empty($_POST["maximum_area"])) {
            $query .= " AND area BETWEEN " . $_POST["minimum_area"] . " AND " . $_POST["maximum_area"];
        }

        if (isset($_POST["room"])) {
            $room = implode(",", $_POST["room"]);
            $query .= " AND room IN (" . $room . ")";
        }

        if (isset($_POST["price_asc"])) {
            $query .= " ORDER BY price";
        } else if (isset($_POST["price_desc"])) {
            $query .= " ORDER BY price DESC";
        } else if (isset($_POST["area_asc"])) {
            $query .= " ORDER BY area";
        } else if (isset($_POST["area_desc"])) {
            $query .= " ORDER BY area DESC";
        }

        $result = $connection->query($query);
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
                            echo "<b>Giá: ~ " . $row["price"] . " triệu/tháng</b>";
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
        } else {
            echo "<h3 style=\"text-align:center; margin-top:30px;\">Không tìm thấy dữ liệu!</h3>";
        }
    }

?>