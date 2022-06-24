<?php require 'conx.php';
    session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <title>Cimary</title>
</head>
<body>
    <!-- navbar -->
    <?php include 'navbar.php';?>
    <!-- header -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
            <div class="swiper-slide"><img src='image_slider/IMG5.png'  alt="icon_Languages"></div>
            <div class="swiper-slide"><img src='image_slider/IMG1.png'  alt="icon_Languages"></div>
            <div class="swiper-slide"><img src='image_slider/IMG2.png'  alt="icon_Languages"></div>
            <div class="swiper-slide"><img src='image_slider/IMG3.png'  alt="icon_Languages"></div>
            <div class="swiper-slide"><img src='image_slider/IMG4.png'  alt="icon_Languages"></div>
            <div class="swiper-slide"><img src='image_slider/IMG1.png'  alt="icon_Languages"></div>
            <div class="swiper-slide"><img src='image_slider/IMG1.png'  alt="icon_Languages"></div>
            <div class="swiper-slide"><img src='image_slider/IMG6.png'  alt="icon_Languages"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script >
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            },
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
        });
    </script>
    <!-- Movies -->
    <div class="Movies"  id="Movies">
        <h1>Movies</h1>
        <div class=container1>
            <div class="sub-container1">
                <!-- card Languages -->
                <div class="card-Languages">
                    <header class="header-Languages">
                        <img src='img/icons8-langue-48 1.png' class="icon-card" alt="icon_Languages">
                        <h3>Languages</h3>
                    </header>
                    <main class="main-Languages">
                    <?php
                        $SqlSelect = "SELECT * FROM `language` " ;
                        $result = $conn->query($SqlSelect); 
                        $row = $result -> fetch_assoc(); 
                        foreach ( $result as $row ) {  
                            $pro_id = $row['Name'];
                    ?>
                        <button class='<?php echo $pro_id ?> ' id="btnLang"><?php echo $pro_id ?></button>
                    <?php         
                        }
                    ?>
                        <button class='test' id="btnLang">all</button>
                    </main>
                </div>
                <!-- card Genres -->
                <div class="card-Genres">
                    <header class="header-Languages">
                        <img src='img/film.png' class="icon-card" alt="icon_Languages">
                        <h3>Genres</h3>
                    </header>
                    <main class="main-Languages" id='filter'>
                    <?php
                         $SqlSelect = "SELECT * FROM `genre` " ;
                         $result = $conn->query($SqlSelect); 
                         $row = $result -> fetch_assoc(); 
                         foreach ( $result as $row ) {  
                            $genre_id = $row['Name_genre'];
                    ?>
                        <button class='<?php echo $genre_id ?>' id="btnLang"><?php echo $genre_id ?></button>
                    <?php         
                        }
                    ?>
                     <button class='test' id="btnLang">all</button>
                    </main>
                  
                </div>
                <!-- card Cinema-->
                <div class="card-Cinema">
                    <header class="header-Languages">
                        <img src='img/cinema.png' class="icon-card" alt="icon_Languages">
                        <h3>Genres</h3>
                    </header>
                    <main class="main-Languages">
                        <?php
                            $SqlSelect = "SELECT * FROM `cinema` " ;
                            $result = $conn->query($SqlSelect); 
                            $row = $result -> fetch_assoc(); 
                            foreach ( $result as $row ) {  
                                $genre_id = $row['Name_Cinema'];
                        ?>
                        <button class='<?php echo $genre_id ?>' id="btnLang"><?php echo $genre_id ?></button>
                    <?php         
                        }
                    ?>
                    </main>
                   
                </div>
            </div>
            <form method='post' action='' class="sub-container2">
                <div class="flex items" id='posts'>
                    <?php
                        $SqlSelect = "SELECT * FROM `movie`
                                        INNER JOIN `genre`
                                        ON movie.ID_Genre = genre.ID_Genre
                                        INNER JOIN `language` 
                                        ON movie.ID_Language = language.ID_Language;" ;
                            $result =  mysqli_query($conn,$SqlSelect); 
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="post  test <?php echo $row["Name"] ;?> <?php  echo $row["Name_genre"]?>  ítem item " >
                            <article class="card "  style="background: url('<?php echo $row["Image_film"] ;?>') center no-repeat ; background-size: cover;">
                                <div class="card_content">
                                    <h3 class="card_title" id="card_title"><?php echo $row["Title"] ?></h3>
                                    <span card class="card_subtitle"><?php echo $row["Name_genre"] ?><span>
                                    <div class="card_description">
                                        <a href="movieDetails.php?ID_Movie=<?php echo $row['ID_Movie']?>" class="linkAdd"><input type="button" value=" See more  " class="btnAdd" /></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php
                            }
                        ?>
                        <!-- filter -->
                        <script src="script/filter.js"></script>    
                    </div>
                    <!-- Button view more -->
                    <div class="buttonToogle" style="display: none;">
                        <a href="javascript:;" class="showMore">+ View More</a>
                    </div>
                    <!-- view more -->
                    <script src="script/viewmore.js"></script> 
                </form>
   
        </div>
    </div>
    <!-- Button Back to top  -->
    <?php include 'backtotop.php';?>
    <!-- footer  -->   
    <?php include 'footer.php';?>
</body>
</html>