<?php  
    require 'conx.php'; 
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

     if(isset($_POST["submit"])){
        $sql_INSERT = "INSERT INTO `movie`(`ID_Language`, `ID_Genre`, `Title`, `Description_`, `Duration`, `Release_date`, `Country`, `Image_film`, `Image_header`, `Video`) 
        VALUES ($Language,$Genre,'$Title','$Description',' $time ','$date','$Country','$filename','$filename_header','$Video')";
        move_uploaded_file($tempfile, "img/$filename");
        move_uploaded_file($tempfile_header, "img/$filename_header");
        $conn->query($sql_INSERT);
        header("location: insert_movie.php");
     }else{
        echo "<script>alert(\"Sorry, there was an error uploading your file\")</script>";
     }
    




?>