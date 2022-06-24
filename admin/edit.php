<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insert-movie.css">
    <title>Document</title>
</head>
<?php  
    require 'conx.php'; 
    if(isset($_REQUEST["ID"])){
        $ID = $_REQUEST["ID"];
        $data = "SELECT * FROM `movie` WHERE ID_Movie = $ID;";
        $get_data = $conn->query($data);
        $row_data = $get_data->fetch_array(MYSQLI_ASSOC);
    }
    if(isset($_POST["btn_edit"])){
        $photo_film_backp = $_REQUEST["photo"];
        $photo_header_backp = $_REQUEST["photo_header"];
        $photo = "";
        $photo_header="";
        $Language=$_POST["Language"];
        $Title = $_POST["Title"];
        $Genre = $_POST["Genre"];
        $Description = $_POST["Description"];
        $Country = $_POST["Country"];
        $Video = $_POST["Video"];
        $Image = $_FILES["Image"];
        $filename = $Image["name"];
        $tempfile = $Image["tmp_name"];
        $Image_header = $_FILES["Image_header"];
        $filename_header =  $Image_header["name"];
        $tempfile_header = $Image_header["tmp_name"];
        $date = $_POST["date"];
        $time = $_POST["time"];

        if($filename=="" && $filename_header=="" ){
            $photo = $photo_film_backp;
            $photo_header=$photo_header_backp;
        }
        else{
            $photo = $filename;
            $photo_header= $filename_header;
        }
        $sql = "UPDATE `movie` SET `ID_Language`= $Language ,
                `ID_Genre`= $Genre ,`Title`='$Title',`Description_`='$Description',
                `Duration`='$time',`Release_date`='$date',`Country`='$Country',
                `Image_film`=' $photo',`Image_header`='$photo_header',`Video`='$Video'
            WHERE ID_Movie = '".$_REQUEST["ID"]."';
        ";
        move_uploaded_file($tempfile, "images/$filename");
        $conn->query($sql);
        header("location: movie.php");
    }
?>
<body>
    <div class="sidebar">
      <?php include 'index.php' ;?>
        <section class="home-section">
            <div class="text">Movie</div>
            <form class="main" action="edit.php?ID=<?php  echo $_REQUEST["ID"] ."&photo=". $_REQUEST["photo"] . "&photo_header=". $_REQUEST["photo_header"]; ?>" method="post" enctype="multipart/form-data">	
                <div class='column'>	
                    <div class="one">
                        <select class='input' type="text" id="name" placeholder="Language"  name="Language">
                            <option value="">select Language</option>
                            <?php 
                                $SqlSelect = "SELECT * FROM `language`;";
                                $result = $conn->query($SqlSelect);
                                foreach ( $result as $row ) {
                            ?>
                            <option value="<?php echo $row['ID_Language'] ;?>"><?php echo $row['Name'] ;?></option>
                            <?php
                                }
                                ?>
                        </select>
                        <label for="name">Language</label>  
                    </div>
                    <div class="one">
                        <input class='input' type="text" id="name" value="<?php echo $row_data["Title"]?>" placeholder="Title" name="Title">
                        <label for="name">Title</label>  
                    </div>
                    <div class="one">
                        <select class='input' type="text" id="name" placeholder="Genre" name="Genre">
                            <option value="">select Genre</option>
                            <?php 
                                $SqlSelect = "SELECT * FROM `genre`;";
                                $result = $conn->query($SqlSelect);
                                foreach ( $result as $row ) {
                            ?>
                            <option value="<?php echo $row['ID_Genre'] ;?>" selectd="<?php echo $row['Name_genre'] ;?>"><?php echo $row['Name_genre'] ;?></option>
                            < <?php
                                }
                                ?>
                        </select>
                        <label for="name">Genre</label>  
                    </div>
                   
                </div>	
                <div class='column'>	  
                    <div class="one">
                        <textarea  class='input' type="text" value="<?php echo $row_data["Description_"]?>"  rows="5" cols="23" id="name" name='Description' ></textarea>
                        <label for="name">Description</label>  
                    </div>  
                    
                    <div class="one">
                        <input class='input' type="text" id="name" value="<?php echo $row_data["Country"]?>" placeholder="Country" name='Country' >
                        <label for="name">Country</label>  
                    </div> 
                    <div class="one">
                        <input class='input' type="text" id="name" value="<?php echo $row_data["Video"]?>" placeholder="Video" name='Video'>
                        <label for="name">Video</label>  
                    </div>    
                    
                </div>	
                <div class='column'>	
                    <div class="one">
                        <input class='input' type="file" id="name" value="<?php echo $row_data["Image_film"]?>" placeholder="Image" name='Image'>
                        <label for="name">Image</label>  
                    </div>
                    <div class="one">
                        <input class='input' type="file" id="name" value="<?php echo $row_data["Image_header"]?>" placeholder="Image header"  name='Image_header'>
                        <label for="name">Image header</label>  
                    </div>
                </div>	
                <div class='column'>	 
                   
                    <div class="one">
                        <input class='input' type="date" id="name" value="<?php echo $row_data["Release_date"]?>" name='date'>
                        <label for="name">Release date</label>  
                    </div>
                    <div class="one">
                        <input class='input' name='time'  type="time" value="<?php echo $row_data["Duration"]?>" min="10:00" max="00:00" id="name"  >
                        <label for="name">Duration</label>  
                    </div>
                   
                  
                </div>	
                <div class="butno">
                    <input type="submit" class='btn' name="btn_edit" value="add"/>
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
</body>
</html>