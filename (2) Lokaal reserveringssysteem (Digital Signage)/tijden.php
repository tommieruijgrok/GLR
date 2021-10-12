<?php
include 'include/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reserveer een lokaal!</title>
    <link rel="stylesheet" href="stylesheet/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>

<div id="container">
    <div id="insideContainer">
        <div>
            <h2>Welke tijden wil je reserveren</h2>
            <p>Lokaal: <?php echo $_GET['lokaal'] ?></p>
            <p>Date: <?php echo $_GET['date'] ?></p>

            <div>
                <table>
                    <tr>
                        <th>Lesuur</th>
                        <th>Begintijd</th>
                        <th>Eindtijd</th>
                        <th>Status</th>
                    </tr>

                    <?php
                        $result = $conn->query("SELECT * FROM Reservering_Lestijden");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['beginTijd'] ?></td>
                                    <td><?php echo $row['eindTijd'] ?></td>
                                    <td><?php


                                    $resultA = $conn->query("SELECT * FROM Reservering_Reserveringen WHERE lokaalId = " . $_GET['lokaal'] . " AND date = '" . $_GET['date'] . "'");
                                    if ($resultA->num_rows > 0) {
                                        while ($rowA = $resultA->fetch_assoc()) {
                                            //echo "SELECT * FROM Reservering_Tijden WHERE `reserveringId` = " . $rowA['id'] . " AND `LestijdId` = '" . $row['id'] . "'";
                                            $resultB = $conn->query("SELECT * FROM Reservering_Tijden WHERE `reserveringId` = " . $rowA['id'] . " AND `LestijdId` = '" . $row['id'] . "'");
                                            if ($resultB->num_rows > 0) {
                                                echo "Niet beschikbaar";

                                            } else {

                                                if ($row['id'] == '8'){
                                                    ?>
                                                    <a href="register.php?lokaal=<?php echo $_GET['lokaal'] ?>&date=<?php echo $_GET['date'] ?>&tijd=<?php echo $row['id'] ?>">Reserveer dit uur en het vorige uur</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="register.php?lokaal=<?php echo $_GET['lokaal'] ?>&date=<?php echo $_GET['date'] ?>&tijd=<?php echo $row['id'] ?>">Reserveer dit uur en het volgende uurr</a>
                                                    <?php
                                                }
                                            }


                                        }

                                    } else {
                                        if ($row['id'] == '8'){
                                            ?>
                                            <a href="register.php?lokaal=<?php echo $_GET['lokaal'] ?>&date=<?php echo $_GET['date'] ?>&tijd=<?php echo $row['id'] ?>">Reserveer dit uur en het vorige uur</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="register.php?lokaal=<?php echo $_GET['lokaal'] ?>&date=<?php echo $_GET['date'] ?>&tijd=<?php echo $row['id'] ?>">Reserveer dit uur en het volgende uur</a>
                                            <?php
                                        }
                                    }

                                    ?></td>

                                </tr>
                            <?php
                        }
                    }
                ?>

                </table>
            </div>
        </div>
    </div>
</div>
