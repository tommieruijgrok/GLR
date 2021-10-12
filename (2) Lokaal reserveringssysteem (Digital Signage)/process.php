<?php

include "include/config.php";

$sql = "INSERT INTO Reservering_Reserveringen (lokaalId, date, student)
VALUES ('" . $_POST['lokaal'] ."', '" . $_POST['date'] . "', '" . $_POST['studentnummer'] . "')";



if ($conn->query($sql) === TRUE) {
    $reservering = $conn->insert_id;

    $sqlA = "INSERT INTO Reservering_Tijden (reserveringId, lestijdId)
    VALUES ('" . $reservering ."', '" . $_POST['uur1'] . "')";
    if ($conn->query($sqlA) === TRUE) {


        $sqlB = "INSERT INTO Reservering_Tijden (reserveringId, lestijdId)
    VALUES ('" . $reservering ."', '" . $_POST['uur2'] . "')";
        if ($conn->query($sqlB) === TRUE) {
            header("location: index.php");

        }

    }





} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}