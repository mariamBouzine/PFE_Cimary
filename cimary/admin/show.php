<?php  
    require 'conx.php'; 
    if(isset($_POST["submit"])){
        $Start_Time = $_POST["Start_Time"];
        $End_Time = $_POST["End_Time"];
        $Cinema = $_POST["Cinema"];
        $date = $_POST["date"];
        $sql_INSERT = "INSERT INTO `show_`(`ID_Movie`, `Date_`, `Start_Time`, `End_Time`) 
                        VALUES ('$Start_Time','$End_Time','$Cinema','$date')";
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
            <form class="main3" action="" method="post" enctype="multipart/form-data">		
                <div class='column'>	  
                <div class="one">
                        <input class='input' name='Start_Time'  type="time"  id="name"  >
                        <label for="name">Start Time</label>  
                    </div>
                    <div class="one">
                        <input class='input' name='End_Time'  type="time"  id="name"  >
                        <label for="name">End Time</label>  
                    </div>
                </div>	
                <div class='column'>	 
                    <div class="one">
                        <select class='input' type="text" id="name" placeholder="Cinema" name="Cinema">
                            <option value="">select movie</option>
                            <?php 
                                $SqlSelect = "SELECT `ID_Movie`, `Title` FROM `movie`";
                                $result = $conn->query($SqlSelect);
                                foreach ( $result as $row ) {
                            ?>
                            <option value="<?php echo $row['ID_Movie'] ;?>"><?php echo $row['ID_Movie'] ;// echo $row['Title'] ;?></option>
                            < <?php
                                }
                                ?>
                        </select>
                        <label for="name">movie</label>  
                    </div>
                    <div class="one">
                        <input class='input' type="date" id="name"  name='date'>
                        <label for="name">Date</label>  
                    </div>
                </div>	
                <div class="butno">
                    <input type="submit" class='btn' name="submit" value="add"/>
                </div>
                <!-- <div class="butno"> 
                    <button type="submit" class="btn" name="submit" form="#"> 
                    <span>submit</span> <svg class="checkmark" viewBox="0 0 52 52"> 
                        <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/> </svg> 
                    </button>
                </div> -->
            </form>
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