

<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title)? $page_title:'Tourista Pk';?></title>
    
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<header>
<nav>
<div class='logo'>        <!-- it includes website's name-->
    <h1> Tourista Pk</h1>  <!-- this is heading-->
</div>

<ul class='nav-links'>   <!-- menu items in <li> tags-->
<!-- each <a> refers to new page-->


<li><a href='index.php'>Home</a></li>
<li><a href='packages.php'>Packages</a></li>
<li><a href='booking.php'>Booking</a></li>
<li><a href='about.php'>About</a></li>
<li><a href='contact.php'>Contact</a></li>

</ul>
<div class="user-menu">
        
            <div class="user-icon-container">
                <div class="user-icon">👤</div>
            </div>

            <?php if (isset($_SESSION['user_id'])): ?>
    <div class="dropdown-menu">
        <span class="user-name"><?php echo $_SESSION['user_name'];  ?>   </span>
        <a href="profile.php">My Profile</a>
        <a href="bookings.php">My Bookings</a>
        <a href="logout.php">Logout</a>
    </div>
    <?php else:  ?>
        <div class="dropdown-menu">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
    <?php endif;    ?>
    </div>


  
</nav>
<!--Now JaveScript-->
<script>
    document.addEventListener("DOMContentLoaded", function(){
        var menu= document.querySelector('.user-menu');
        //when click on icon then ...it happens
    if(menu){
        menu.addEventListener("click", function(e){
            this.classList.toggle("active");
            e.stopPropagation();

        });
    }
document.addEventListener("click", function(){
    if (menu){
        menu.classList.remove("active");
    }
});



//if click on any other section on page then dropdown list close ho jye gi 

var dropdowns = document.querySelectorAll(".dropdown-menu");
dropdowns.forEach(function(dropdown){


        dropdown.addEventListener("click", function(e){
            e.stopPropagation();
        });
});
    });





</script>
</header>