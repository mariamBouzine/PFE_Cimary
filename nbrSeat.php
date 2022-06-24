<?php
     include "conx.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="seat.css" />
    <title>Cimary</title>
</head>
<body>
    <div class="container">
        <div class="screen"></div>  
        <div id="row_cont">
            <div class="row">
                <?php 
                    include "conx.php";
                    $q = intval($_GET['q']);
                    mysqli_select_db($conn,"booking-film");
                    $SqlSelect = "SELECT * FROM cinema_seat
                    WHERE ID_cinema_Seat BETWEEN 1 AND 48;";
                    $result =  mysqli_query($conn,$SqlSelect); 
                    while($row_seat = mysqli_fetch_array($result)){
                ?>
                <div class="seat"><p><?php echo $row_seat["Seat_Number"];?></p></div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>