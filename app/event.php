<?php
include "menu.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sự kiện</title>
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
$idEvent = (int) filter_var($request, FILTER_SANITIZE_NUMBER_INT);
$_SESSION["idEvent"] = $idEvent;
include "connection.php";
$query = "SELECT * from EventHeld where id='$idEvent';";
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
    echo "<hr>";
    echo "<div class=\"row\">";
    echo "<div class=\"col span-2-of-3 body-detail\">";
    echo "<hr>";
    echo "<div class=\"main-info\">";
    echo "</div>";
    echo "<h4>Mô tả</h4><hr>";
    echo "<div class=\"main-info\">";
    echo "<p style=\"text-align: justify\">".$row["description"]."</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class=\"col span-1-of-3 agency-of-detail\">";
    echo "<div class=\"box-agency\">";
    echo "<div class=\"box-title\"><b>Liên hệ người tổ chức</b></div>";
    echo "<div class=\"row\">";
    echo "<div class=\"col span-1-of-3\">";
    echo "<img src=\"http://tuvanascvn938.chiliweb.org/wp-content/uploads/2017/03/tiep-vien-hang-khong.png\" alt=\"detail\" class=\"image-agency\">";
    echo "</div>";
    echo "<div class=\"col span-2-of-3\">";
    $userNameAgency = $row["managerID"];
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
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
else {
    header('Location: /');
}
include "footer.php";
?>

</body>

</html>