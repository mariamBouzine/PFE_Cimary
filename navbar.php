<nav>
    <div class="logo">
        <img src="img/Cimary.png" alt="Logo Image">
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">
        <li><a href="index.php" class="link_underline" >Home</a></li>
        <li><a href="#Movies" class="link_underline" >Movies</a></li>
        <li><a href="#" class="link_underline" >About</a></li>
        <li><a href="#" class="link_underline" style="display:none;" >Services</a></li>
        <li><a href="#" class="link_underline" style="display:none;">Contact Us</a></li>
        <li><a href="#" class="link_underline" style="display:none;" >Services</a></li>
        <li><a href="#" class="link_underline" style="display:none;">Contact Us</a></li>
        <li><a href="#" class="link_underline" style="display:none;">Contact Us</a></li>
        <li><a href="#" class="link_underline" style="display:none;" >Services</a></li>
        <li><a href="#" class="link_underline" style="display:none;">Contact Us</a></li>
        <li>
            <?php 
                // if(!isset($_SESSION)){
                //     session_start();
                // }
                if (isset($_SESSION['ID_User'])) {
                    $SQL = mysqli_query($conn,"SELECT * FROM `user_` WHERE ID_User ='".$_SESSION['ID_User']."'");
                    $row=mysqli_fetch_array($SQL);
            ?>
                <a class="login-button" onclick="return confirm('Are you sure to logout?');" href="logout.php"><img src='img/déconnexion.png' id="icon-user" alt="icon-Logout"  />logout <?php //echo $row['Full_Name'];?></a>
            <?php 
                }else{
                    echo "<a class='login-button'  href='login.php' ><img src='img/icons8-utilisateur-48.png' alt='user'  id='icon-user' />Login</a>";  
                }
            ?>
        </li>
    </ul>
</nav>
<script src="script/nav.js"></script>