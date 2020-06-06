<?php 
    session_start();
    $userNameCustomer = $_SESSION["userName"];
    $idDetail         = $_SESSION["idDetail"];
    $inputDate        = $_POST["inputDate"];
    $inputMessage     = $_POST["inputMessage"];
    include "connection.php";
    $query = "INSERT INTO ScheduleAppointment(userNameCustomer, idRealEstate, date, note) values ('$userNameCustomer', '$idDetail', '$inputDate', '$inputMessage') ";
    $result = $connection->query($query);
?>