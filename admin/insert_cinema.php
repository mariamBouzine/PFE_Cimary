<?php
    require 'conx.php'; 
    
    if(isset($_POST["submit"])){
        $NameCinema=$_POST["NameCinema"];
        $Adress = $_POST["Adress"];
        $sql_INSERT = "INSERT INTO `cinema`(`Name_Cinema`, `Adress`) VALUES ('$NameCinema','$Adress')";
        $conn->query($sql_INSERT);
        // header("location: insert_movie.php");
     }else{
        // echo "<script>alert(\"Sorry, there was an error uploading your file\")</script>";
     }
     if(isset($_POST["Language"])){
        $Language = $_POST["language"];
        $sql_INSERT = "INSERT INTO `language`(`Name`) VALUES ('$Language')";
        $conn->query($sql_INSERT);
        // header("location: insert_movie.php");
     }else{
        // echo "<script>alert(\"Sorry, there was an error uploading your file\")</script>";
     }
     if(isset($_POST["Genre"])){
        $Genre = $_POST["genre"];
        $sql_INSERT = "INSERT INTO `genre`(`Name_genre`) VALUES ('$Genre')";
        $conn->query($sql_INSERT);
        // header("location: insert_movie.php");
     }else{
        // echo "<script>alert(\"Sorry, there was an error uploading your file\")</script>";
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insert-movie.css">
    <title>Document</title>
</head>
<body>
<div class="sidebar">
      <?php include 'index.php' ;?>
        <section class="home-section">
            <div class="text">Movie</div>
            <div class='column'>
               
                <form class="main2" action="" method="post" enctype="multipart/form-data">	  
                    <div class="one">
                            <input class='input' type="text" id="name" placeholder="Language" name='language'>
                            <label for="name">Language</label>  
                        </div>     
                    <div class="butno">
                        <input type="submit" class='btn' name="Language" value="add"/>
                    </div>
                </form>
                <form class="main2" action="" method="post" enctype="multipart/form-data">	  
                        <div class="one">
                            <input class='input' type="text" id="name" placeholder="Name Cinema" name='NameCinema' >
                            <label for="name">Name Cinema</label>  
                        </div> 

                    <div class="one">
                            <input class='input' type="text" id="name" placeholder="Adress" name='Adress'>
                            <label for="name">Adress</label>  
                        </div>     
                    <div class="butno">
                        <input type="submit" class='btn' name="submit" value="add"/>
                    </div>
                </form>
                <form class="main2" action="" method="post" enctype="multipart/form-data">	  
                    <div class="one">
                            <input class='input' type="text" id="name" placeholder="Genre" name='genre'>
                            <label for="name">Genre</label>  
                        </div>     
                    <div class="butno">
                        <input type="submit" class='btn' name="Genre" value="add"/>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script>
        const btn = document.querySelector(".btn");
        btn.addEventListener("click", () => {
        btn.classList.add("clicked");
        setTimeout(() => {
            btn.classList.remove("clicked");
        }, 4000);
        });
    </script>
</body>
</html>