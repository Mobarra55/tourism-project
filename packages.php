<?php

$page_title = 'Packages-Tourista Pk';
include 'includes/header.php';
?>


<section class="packages">
<h2>Our Tour Packages</h2>
<p class="section-subtitle">Choose your perfect adventure for you.</p>
<div class="packages-container">
<!--1st package card-->
<div class="package-card">
        <img src="images/package1.jpg" alt="Northern Areas Tour">
    <div class="package-content">
        <h3>Northern Areas Tour</h3>
        <p class="duration">Duration: 5 Days / 4 Nights.</p>
        <p class="price">Price: Rs. 45,000</p>
        <p>Explore Hunza, Skardu, and Fairy Meadows with guided tours.</p>
        <a href="booking.php?package=Northern Areas Tour&price=45000" class="btn">Book Now</a>
    </div>
 </div>
 <!--2nd Package Card-->
 <div class="package-card">
        <img src="images/package2.jpg" alt="Naran Kaghan Tour">
    <div class="package-content">
        <h3>Naran Kaghan Tour</h3>
        <p class="duration">Duration: 3 Days / 2 Nights.</p>
        <p class="price">Price: Rs. 25,000</p>
        <p>Visit Saif-ul-Malook Lake, Lalazar, and enjoy scenic valleys.</p>
        <a href="booking.php?package=Naran Kaghan Tour&price=25000" class="btn">Book Now</a>
    </div>
 </div>
 <!-- 3rd Package Card-->
   <div class="package-card">
        <img src="images/package3.jpg" alt="Hunza Valley Tour">
    <div class="package-content">
        <h3>Hunza Valley Premium</h3>
        <p class="duration">Duration: 7 Days / 6 Nights.</p>
        <p class="price">Price: Rs. 65,000</p>
        <p>Complete Hunza experience with Khunjerab Pass and local culture.</p>
        <a href="booking.php?package=Hunza Valley Premium&price=65000" class="btn">Book Now</a>
    </div>
 </div>
  <!--4rth Package Card -->
     <div class="package-card">
        <img src="images/package4.jpg" alt="Kashmir Tour">
    <div class="package-content">
        <h3>Kashmir Valley Tour</h3>
        <p class="duration">Duration: 4 Days / 3 Nights.</p>
        <p class="price">Price: Rs. 35,000</p>
        <p>Discover Neelum Valley, Sharda, and Kel with comfortable stay.</p>
        <a href="booking.php?package=Kashmir Valley Tour&price=35000" class="btn">Book Now</a>
    </div>
 </div>
  <!--close all tags-->
</div>
<div style="text-align: center; margin: 4rem 0;">
    <a href="index.php" class="btn" style="font-size: 1.2rem; padding: 1rem 3rem;">Back to Home</a>
</div>
</section>

<?php include 'includes/footer.php';?>