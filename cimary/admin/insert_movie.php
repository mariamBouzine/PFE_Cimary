<?php  
    require 'conx.php'; 
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
            <form class="main" action="upload.php" method="post" enctype="multipart/form-data">	
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
                        <input class='input' type="text" id="name" placeholder="Title" name="Title">
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
                            <option value="<?php echo $row['ID_Genre'] ;?>"><?php echo $row['Name_genre'] ;?></option>
                            < <?php
                                }
                                ?>
                        </select>
                        <label for="name">Genre</label>  
                    </div>
                   
                </div>	
                <div class='column'>	  
                    <div class="one">
                        <textarea  class='input' type="text"  rows="5" cols="23" id="name" name='Description' ></textarea>
                        <label for="name">Description</label>  
                    </div>  
                    
                    <div class="one">
                        <input class='input' type="text" id="name" placeholder="Country" name='Country' >
                        <label for="name">Country</label>  
                    </div> 
                    <div class="one">
                        <input class='input' type="text" id="name" placeholder="Video" name='Video'>
                        <label for="name">Video</label>  
                    </div>    
                    
                </div>	
                <div class='column'>	
                    <div class="one">
                        <input class='input' type="file" id="name" placeholder="Image" name='Image'>
                        <label for="name">Image</label>  
                    </div>
                    <div class="one">
                        <input class='input' type="file" id="name" placeholder="Image header"  name='Image_header'>
                        <label for="name">Image header</label>  
                    </div>
                </div>	
                <div class='column'>	 
                   
                    <div class="one">
                        <input class='input' type="date" id="name"  name='date'>
                        <label for="name">Release date</label>  
                    </div>
                    <div class="one">
                        <input class='input' name='time'  type="time"  min="10:00" max="00:00" id="name"  >
                        <label for="name">Duration</label>  
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