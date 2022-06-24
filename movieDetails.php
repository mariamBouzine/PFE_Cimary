<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    -->
    <link rel="stylesheet" href="movieDetails.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Cimary</title>
</head>

<body>
    <?php 
    // if(!isset($_SESSION)){
    //     session_start();
    // }   
        // session_start();
        require 'conx.php';
        $idd = $_GET['ID_Movie'];
        if(isset($idd)){
            $sqlSelect = "SELECT * FROM movie
                         INNER JOIN genre
                         ON movie.ID_Genre = genre.ID_Genre
                         INNER JOIN language l 
                         ON movie.ID_Language = l.ID_Language
                         WHERE movie.ID_Movie = $idd" ;
            $result =  mysqli_query($conn,$sqlSelect); 
            $row = mysqli_fetch_array($result);
        }
    ?>
    <!-- navbar -->
    <?php include 'navbar.php';?>
     <!-- header -->
     <form class="image-header" method='post' action=''>
        <img id="img-bg" src="<?php echo $row["Image_header"]?>" alt=""/>
             <img src="<?php echo  $row["Image_film"]?>" alt="image-film" class="film"/>
             <h3 class="title-film"><?php echo $row["Title"]?></h3>
             <p class="type-film"><?php echo $row["Name_genre"]?> <span><?php echo $row["Duration"]?></span></p>
             <?php  
                if(!isset($_SESSION)){
                    session_start();
                }   
                if (isset($_SESSION['ID_User'])) { 
             ?>
                <a href="popup.php?ID_Movie=<?php echo $row['ID_Movie']?>" style="cursor: pointer;"><input type="button" value="Book tickets" id="<?php echo $row["ID_Movie"]; ?>" class="book view_data"/></a>
             <?php }
                else{
             ?>
                <a href="login.php" style="cursor: pointer;"><input type="button" value="Book tickets" id="<?php echo $row["ID_Movie"]; ?>" class="book view_data" /></a>;
            <?php
                }
             ?>
             <a href="#trailer"><input type="button" value="Play Trailer" class="book" id="Trailer"/></a>
    </form>
     <!-- /popUp/ -->          
     <!-- <div id="popup1" class="popup-container" id="dataModal" class="modal fade">
        <div class="popup-content">
            <h2>Choose your cinema</h2>
        <a href="#" class="close">&times;</a>
        <div class="radio" id="employee_detail"> -->
                
            <!-- <label>Cinema Roxy<input type="radio" id="" class="radio-cinema"></label>
            
            <label>Megarama Goya<input type="radio" id="" class="radio-cinema"></label> -->
            <!-- <a href="#" ><button class="Select_cinema">Select cinema</button></a>
        </div>
        
        </div>
     </div> -->

    <!-- /about movie/ -->
     <div class="about-movie">
        <h1>About the movie</h1>
        <p class="descreption"><?php echo $row["Description_"]?></p>
        <div class="title">
            <div class="title1">
                <h3>Country :</h3><p><?php echo $row["Country"]?></p>
            </div>
            <div class="title2">
                <h3>Sortie:</h3><p><?php echo $row["Release_date"]?></p>
            <div>
        </div>
     </div>
     <h1 id="trailer">Trailer</h1>
     <div class="trailer">
        <iframe width="900" height="400" src="<?php echo $row["Video"]?>" frameborder="0" allowfullscreen>
        </iframe>
        <!-- <video  width="900" height="400" controls  >
            <source src="<?php echo $row["Video"]?>" type="video/ogg">
            </source>
        </video> -->
        <!-- <iframe width="420" height="345" src="https://www.youtube.com/embed/Rt_UqUm38BI"> -->
</iframe>
     </div>
     <!-- Button Back to top  -->
     <?php include 'backtotop.php';?>
     <?php include("footer.php");?>
</body>
</html>