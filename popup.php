
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="movieDetails.css"/>
    <title>Cimary</title>
</head>
<body>
        
    <form id="popup1" class="popup-container" id="dataModal" class="modal fade" method="POST" action="dateTime.php?ID_Movie=<?php echo $_GET['ID_Movie'];?>" >
        <div class="popup-content">
            <h2>Choose your cinema</h2>
            <a href="#" class="close">&times;</a>
            <div class="radio" id="employee_detail">
                <?php  
                    session_start();
                    require 'conx.php';
                    $idd = $_GET['ID_Movie'];
                    if(isset($idd)){
                        $sqlSelect_cinema = "SELECT DISTINCT M.ID_Movie, C.Id_cinema,Name_Cinema FROM movie M 
                                                INNER JOIN Show_ S
                                                ON M.ID_Movie = S.ID_Movie
                                                INNER JOIN cinema_Hall_Show CHS
                                                ON S.ID_Show = CHS.ID_Show 
                                                INNER JOIN cinema_Hall CH
                                                ON CHS.Id_cinema_Hall = CH.Id_cinema_Hall
                                                INNER JOIN cinema C
                                                ON CH.Id_cinema = C.Id_cinema
                                                WHERE M.ID_Movie = $idd ";
                        $result_cinema =  mysqli_query($conn,$sqlSelect_cinema); 
                        $res = "";
                        while($row_cinema = mysqli_fetch_array( $result_cinema)){
                            $res = $row_cinema;
                ?>
                        <label><?php echo $row_cinema["Name_Cinema"]?><input type="radio" name="radio_cinema" id="" class="radio-cinema" value="<?php echo $row_cinema["Id_cinema"]?>"></label>
                <?php 
                
                        } 
                    }
                ?>
                <input type="submit" class="Select_cinema" value="select">
            </div>
        </div>
    </form>
            
</body>
</html>