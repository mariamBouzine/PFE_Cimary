<?php include 'conx.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dateTime.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Cimary</title>
</head>
<body>
    <!-- navbar -->
    <?php include 'navbar.php';
    ?>
    <div class="header">
        <img src="img/Rectangle.png" alt='image_dateTime' class='image_dateTime'/>
        <h1>A theatre  you will fall in love with</h1>
    </div>
    <!-- <form> -->
        <div class="date" >
            <?php
                if(isset($_REQUEST['ID_Movie'])&& isset($_POST["radio_cinema"])){
                    $id_=  $_POST["radio_cinema"]; 
                    $idd = $_REQUEST['ID_Movie'];
                    $sqlSelect_cinema_date = "SELECT DISTINCT DATE_FORMAT(Date_, '%W %D'),Name_Cinema
                                                FROM movie M 
                                                INNER JOIN show_ S 
                                                ON M.ID_Movie = S.ID_Movie 
                                                INNER JOIN cinema_Hall_Show CHS 
                                                ON S.ID_Show = CHS.ID_Show 
                                                INNER JOIN cinema_Hall CH 
                                                ON CHS.Id_cinema_Hall = CH.Id_cinema_Hall 
                                                INNER JOIN cinema C 
                                                ON CH.Id_cinema = C.Id_cinema 
                                                WHERE M.ID_Movie = $idd and C.Id_cinema=$id_;";
                    $result_cinema_date =  mysqli_query($conn,$sqlSelect_cinema_date); 
                    while($row_cinema_date = mysqli_fetch_array($result_cinema_date)){
                
            ?>
                <div>
                    <button class="<?php echo $row_cinema_date["Name_Cinema"]?> btn-date" ><?php echo $row_cinema_date["DATE_FORMAT(Date_, '%W %D')"]?></button>
                    <!-- <input class="<?php// echo $row_cinema_date["Name_Cinema"]?> btn-date" type="submit"  name='submit' value="<?php //echo $row_cinema_date["DATE_FORMAT(Date_, '%W %D')"]?>" /> -->
                </div> 
            <?php
            
                    }
                }
            ?>
        </div>
        <div >
            <?php
                if(isset($_REQUEST['ID_Movie'])&& isset($_POST["radio_cinema"])){        
                        $id_=  $_POST["radio_cinema"]; 
                        $idd = $_REQUEST['ID_Movie'];
                        $sqlSelect_cinema_date = "SELECT  DATE_FORMAT(Date_, '%W %D'),Name_cinema_Hall,Start_Time,Name_Cinema,S.ID_Show FROM movie M 
                                                    INNER JOIN show_ S 
                                                    ON M.ID_Movie = S.ID_Movie 
                                                    INNER JOIN cinema_Hall_Show CHS 
                                                    ON S.ID_Show = CHS.ID_Show 
                                                    INNER JOIN cinema_Hall CH 
                                                    ON CHS.Id_cinema_Hall = CH.Id_cinema_Hall 
                                                    INNER JOIN cinema C 
                                                    ON CH.Id_cinema = C.Id_cinema 
                                                    WHERE M.ID_Movie = $idd and C.Id_cinema=$id_;";
                        $result_cinema_date =  mysqli_query($conn,$sqlSelect_cinema_date); 
                        while($row_cinema_date = mysqli_fetch_array($result_cinema_date)){
            ?>
            <div class="post  test <?php echo $row_cinema_date["Name_Cinema"] ;?> hall" >
                <h4><?php echo $row_cinema_date["Name_cinema_Hall"];?>:</h4>
                <div class="hall-time">
                    <div>
                        <a href="seat.php?ID_Show=<?php echo  $row_cinema_date["ID_Show"];?>"><input type="submit" value="<?php echo $row_cinema_date["Start_Time"];?>" class="btn-time" /></a>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    <!-- </form> -->
    <!-- filter -->
    <!-- <script src="script/filter.js"></script>   -->
    <!-- Button Back to top  -->
    <?php include 'backtotop.php';?>
    <?php include("footer.php");?>
</body>
</html>