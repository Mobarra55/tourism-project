<?php
$page_title = 'About - Tourista Pk';
include 'includes/header.php';
?>
<style>
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

main {
    flex: 1;
}
</style>
<main>
<section class="about" style="padding: 4rem 2rem; max-width: 1200px; margin: 0 auto;">
    <h2>About Tourista Pk</h2>
    <p class="section-subtitle">Your trusted travel partner in Pakistan.</p>
    
    <p style="font-size: 1.1rem; line-height: 1.8; color: #555; margin-bottom: 2rem;">
        Tourista Pk is dedicated to providing unforgettable travel experiences across the beautiful landscapes of Pakistan. 
        From the majestic mountains of the north to the serene valleys and historic sites, we offer carefully curated packages 
        to make your journey memorable and hassle-free.
    </p>
    
    <p style="font-size: 1.1rem; line-height: 1.8; color: #555;">
        Our mission is to promote tourism in Pakistan and help travelers discover the hidden gems of our country with expert guides, 
        comfortable accommodations, and personalized services.
    </p>
    
    <a href="packages.php" class="btn" style="margin-top: 2rem; display: inline-block;">View Our Packages</a>
    <a href="index.php" class="btn" style="margin-top: 2rem; display: inline-block;">Back to Home</a>
</section>
</main>
<?php include 'includes/footer.php';?>

