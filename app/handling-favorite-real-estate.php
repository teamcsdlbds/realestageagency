<?php 
    session_start();
    $userNameCustomer = $_SESSION["userName"];
    $idDetail = $_SESSION["idDetail"];
    // echo $userNameCustomer. " " . $idDetail;
    include "connection.php";
    $query = "SELECT * from FavoriteRealEstates where idRealEstate='$idDetail' and userNameCustomer = '$userNameCustomer'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $query = "delete from FavoriteRealEstates where id='$id'";
        $result = $connection->query($query);
    }
    else {
        $query = "insert into FavoriteRealEstates(idRealEstate, userNameCustomer) values('$idDetail', '$userNameCustomer')";
        $result = $connection->query($query);
    }

?>