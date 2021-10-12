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
            <h2>Bevestig uw reservering</h2>
            <h3>Wat is uw studentnummer?</h3>
            <form action="process.php" method="post">
            <input id="output" name="studentnummer" readonly>
            <div style="display: flex; gap: 10px">
                <div class="number" onclick="addNumber(1)">
                    <p>1</p>
                </div>
                <div class="number" onclick="addNumber(2)">
                    <p>2</p>
                </div>
                <div class="number" onclick="addNumber(3)">
                    <p>3</p>
                </div>
                <div class="number" onclick="addNumber(4)">
                    <p>4</p>
                </div>
                <div class="number" onclick="addNumber(5)">
                    <p>5</p>
                </div>
                <div class="number" onclick="addNumber(6)">
                    <p>6</p>
                </div>
                <div class="number" onclick="addNumber(7)">
                    <p>7</p>
                </div>
                <div class="number" onclick="addNumber(8)">
                    <p>8</p>
                </div>
                <div class="number" onclick="addNumber(9)">
                    <p>9</p>
                </div>
                <div class="number" onclick="addNumber(0)">
                    <p>0</p>
                </div>
            </div>
            <p>Datum: <?php echo $_GET['date'] ?></p>
            <p>Lokaal: <?php echo $_GET['lokaal'] ?></p>
            <p>Uren: <?php
                if ($_GET['tijd'] == 8){
                    echo $_GET['tijd'] . " & " . ($_GET['tijd'] - 1);
                } else {
                    echo $_GET['tijd'] . " & " . ($_GET['tijd'] + 1);
                }

                ?>
            </p>
            <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
            <input type="hidden" name="lokaal" value="<?php echo $_GET['lokaal'] ?>">
            <input type="hidden" name="uur1" value="<?php echo $_GET['tijd'] ?>">
            <input type="hidden" name="uur2" value="<?php
            if ($_GET['tijd'] == 8){
                echo ($_GET['tijd'] - 1);
            } else {
                echo ($_GET['tijd'] + 1);
            }

            ?>">
                <input type="submit">
            </form>
        </div>
    </div>
</div>
<style>
    .number {
        background-color: lightblue;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<script>

    x = [];
    function addNumber(num){
        x.push(num);
        if (x.length > 5){
            x.splice(0, 1);
        }
        z = '';
        for (i=0; i < x.length; i++){
            z += x[i];

        }
        document.getElementById('output').value = z;


    }

</script>