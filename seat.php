<?php require 'conx.php';
    session_start();
    
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="seat.css" />
    <title>Cimary</title>
  </head>
  <body>
    <!-- navbar -->
  <?php include 'navbar.php';?>
  <!-- <form method="POST" action=""> -->
    <div  class="body">
      <div class="movie-container">
          <label> choose Type Seat:</label>  <br>
          <?php
              $SqlSelect = "SELECT DISTINCT Ts.Type_ ,Ts.Trif ,S.ID_Type_Seat FROM `cinema_seat` S
                              INNER JOIN `type_seat` Ts
                              ON S.ID_Type_Seat= Ts.ID_Type_Seat;";
              $result =  mysqli_query($conn,$SqlSelect); 
              while($row = mysqli_fetch_array($result)){
                  $pro_id = $row['Type_'];
          ?>
                  <button class='<?php echo $pro_id ?> ' id="btnLang" ><?php echo $pro_id ?></button>
          <?php         
              }
          ?>
          <button class='test' id="btnLang">all</button>   
  </div>

      <ul class="showcase">
        <li>
          <div class="seat">.</div>
          <small>Available</small>
        </li>
        <li>
          <div class="seat selected" id="selected">.</div>
          <small>Selected</small>
        </li>
        <li>
          <div class="seat sold">.</div>
          <small>Sold</small>
        </li>
      </ul>
      <div>
      
      </div>
      <div class="container">
          <div class="screen"></div>  
          <div id="row_cont">
              <div class="row">
                  <?php 
                        $SqlSelect = "SELECT  Ts.Type_ ,Ts.Trif ,S.ID_Type_Seat ,S.Seat_Number, S.ID_cinema_Seat FROM `cinema_seat` S
                                      INNER JOIN `type_seat` Ts
                                      ON S.ID_Type_Seat= Ts.ID_Type_Seat;";
                              $result =  mysqli_query($conn,$SqlSelect); 
                              while($row_seat = mysqli_fetch_array($result)){
                  ?>
                      <div class="seat post  test <?php echo $row_seat["Type_"] ;?> "><a href='checkout.php?ID_show=<?php echo $_GET['ID_Show']; ?>&Tarif=<?php echo $row_seat['Trif'];?>&id_seat=<?php echo $row_seat['ID_cinema_Seat'];?>'><?php echo $row_seat["Seat_Number"];?></a></div>
                  <?php 
                        }
                  ?>
              </div>
          </div>
      </div>
      <button class="text">You have selected <span id="count">0</span> seat for a price of RS.<span
        id="total"
        >0</span></button>
        <!-- filter -->
        <script src="script/filter.js"></script>  
  <!-- </form> -->
    <script src="script/seat.js"></script>
    <?php include 'footer.php';?>
  </body>
</html>
