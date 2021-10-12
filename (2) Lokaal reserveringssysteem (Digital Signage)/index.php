<?php
    include 'include/config.php';

    if (isset($_GET['date'])){
        $weekDay = date('w', strtotime($_GET['date']));
        if ($weekDay == 0 || $weekDay == 6){

            ?>
                <script>
                    alert('Geen weekenden!');
                    location.href = "index.php";
                </script>
            <?php
        }

        $week3 = date('Y m d', strtotime("+3 weeks"));
        $date = date('Y m d', strtotime($_GET['date']));
        if ($date > $week3) {
            ?>
            <script>
                alert('Niet verder dan 3 weken!');
                location.href = "index.php";
            </script>
            <?php
        }else{
        }


    }

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
            <h2>Welk lokaal wil je reserveren</h2>
            <div id="lokaalChooser">
                <form action="" method="get">
                    <input type="date" name="date" onchange="this.parentElement.submit()" value="<?php echo $_GET['date'] ?>">
                </form>
                <form action="tijden.php" method="get">
                    <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
                    <div id="grid">
                        <?php
                        $sql = "SELECT * FROM Reservering_Lokalen";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                ?>
                                    <button value="<?php echo $row['id'] ?>" name="lokaal">
                                <div class="classRoom">
                                    <p><?php echo $row['name'] ?></p>
                                    <?php

                                    $sqlA = "SELECT * FROM Reservering_Reserveringen WHERE lokaalId = " . $row['id'] . " AND date = '" . $_GET['date'] . "'";
                                    $resultA = $conn->query($sqlA);

                                    if ($resultA->num_rows > 0) {
                                        // output data of each row
                                        while ($rowA = $resultA->fetch_assoc()) {
                                            $sqlB = "SELECT * FROM Reservering_Tijden WHERE reserveringId = " . $rowA['id'];
                                            $resultB = $conn->query($sqlB);

                                            if ($resultB->num_rows > 0) {
                                                // output data of each row
                                                ?>

                                                <?php
                                                echo "Niet beschikbaar op uur: ";
                                                while ($rowB = $resultB->fetch_assoc()) {
                                                     echo $rowB['LestijdId'] . " ";
                                                }
                                                ?>

                                                <?php
                                            }

                                        }
                                    } else {
                                        ?>
                                        <p>Hele dag beschikbaar!</p>
                                        <?php
                                    }
                                    ?>
                                </div>

                                <?php
                            }
                        } else {
                            echo "0 results";
                        }

                        ?>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>

</body>
</html>