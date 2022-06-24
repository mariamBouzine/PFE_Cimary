<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
      <?php include 'index.php' ;?>
      <section class="home-section">
        <div class="text">Movie</div>
        <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Language</th>
                <th>Genre</th>
                <th>Title</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Release Date</th>
                <th>Country</th>
                <th>Image</th>
                <th>Image_header</th>
                <th>Video</th>
                <th>button</th>
                <th>button</th>
              </tr>
            </thead>
            <tbody>
            <?php                        
                require 'conx.php';
                $SqlSelect = "SELECT * FROM `movie`;";
                $result = $conn->query($SqlSelect);
                if(isset($_REQUEST['Id'])) {
                  $id = $_REQUEST['Id'];
                  $sqlDelete = "DELETE FROM `movie` WHERE ID_Movie = '$id' ";
                  $conn->query($sqlDelete);
                }
                  foreach ( $result as $row ) {
                  ?>
              <tr>
                <td data-column="ID"><?php echo $row["ID_Movie"]?> </td>
                <td data-column="Language"><?php echo $row["ID_Language"]?> </td>
                <td data-column="Genre"><?php echo $row["ID_Genre"]?> </td>
                <td data-column="Title"><?php echo $row["Title"]?> </td>
                <td data-column="Description"><?php// echo $row["Description_"]?> </td>
                <td data-column="Duration"><?php echo $row["Duration"]?> </td>
                <td data-column="Release Date"><?php echo $row["Release_date"]?> </td>
                <td data-column="Country"><?php echo $row["Country"]?> </td>
                <td data-column="Image"><?php echo $row["Image_film"]?> </td>
                <td data-column="Image_header"><?php echo $row["Image_header"]?> </td>
                <td data-column="Video"><?php echo $row["Video"]?> </td>
                <td data-column="button">
                  <a href="movie.php?Id=<?php echo $row["ID_Movie"]; ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">
                    <i class='bx bx-trash'></i>
                  </a>
                </td>
                <td data-column="button">
                  <a href="edit.php?ID=<?php echo $row["ID_Movie"] ."&photo=". $row["Image_film"] . "&photo_header=". $row["Image_header"]; ?>" class="btn btn-danger">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                  </a>
                </td>
              </tr>
              <?php
                }              
              ?>
            </tbody>
        </table>
      </section>
    </div>
</body>
</html>