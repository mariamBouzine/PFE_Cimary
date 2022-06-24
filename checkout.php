<?php 
    include 'conx.php';
    session_start();
    $ID_show = $_REQUEST["ID_show"];
    $Tarif = $_REQUEST["Tarif"];
    $user = $_SESSION['ID_User'];
    $id_seat = $_REQUEST["id_seat"];
    echo $ID_show ;
    echo $Tarif;
    echo $user;
    echo $id_seat;
    $sql_INSERT = "INSERT INTO `booking`( `ID_Show`, `ID_User`, `Time_`, `total`, `Payement_methode`) 
                    VALUES (' $ID_show','$user','". date('Y-m-d h:i:sa') ."','$Tarif', NULL)";
    $conn->query($sql_INSERT);
    $Id_booking = $conn->insert_id;
    $sql_INSERT = "INSERT INTO `cinema_seat_booking`(`ID_Booking`, `ID_cinema_Seat`) VALUES ('$Id_booking','$id_seat')";
    $conn->query($sql_INSERT);

    header("Location: index.php");
?>