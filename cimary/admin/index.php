<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

    <div class="logo-details">
        <div class="logo_name">Cimary</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
     <li>
       <a href="insert_movie.php">
        <i class='bx bxs-camera-movie'></i>
         <span class="links_name">Add new movie</span>
       </a>
       <span class="tooltip">Add new movie</span>
     </li>
     <li>
       <a href="movie.php">
        <i class='bx bx-table' ></i>
         <span class="links_name">movies</span>
       </a>
       <span class="tooltip">movies</span>
     </li>
     <li>
       <a href="insert_cinema.php">
       <!-- <i class='bx bxs-add-to-queue'></i> -->
         <i class='bx bxs-chalkboard'></i>
         <span class="links_name">Add new cinema</span>
       </a>
       <span class="tooltip"><box-icon name='copyright'></box-icon>Add new cinema / Language / Genre</span>
     </li>
     <li>
       <a href="show.php">
         <i class='bx bxs-show'></i>
         <span class="links_name">Show</span>
       </a>
       <span class="tooltip">Show</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">Bouzine mariam</div>
             <!-- <div class="job">Web designer</div> -->
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>
