<?php
session_start(); 
include 'includes/config.php';

$static_reviews = [
    ['name' => 'Ali Khan', 'rating' => 5, 'comment' => 'Amazing experience in Hunza! Highly recommend!', 'destination' => 'Hunza Valley'],
    ['name' => 'Sara Ahmed', 'rating' => 5, 'comment' => 'Best tour of Skardu! Will book again!', 'destination' => 'Skardu'],
    ['name' => 'Usman Malik', 'rating' => 4, 'comment' => 'Great trip to Naran! Excellent service.', 'destination' => 'Naran'],
    ['name' => 'Ayesha Siddiqui', 'rating' => 5, 'comment' => 'Fairy Meadows was heaven on earth!', 'destination' => 'Fairy Meadows']
];
//it fetch reviews from just session not from database

$user_reviews = isset($_SESSION['user_reviews']) ? $_SESSION['user_reviews'] : [];
//itfetch reviews frommdb
$database_reviews = [];
$query = "SELECT * FROM reviews ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {
    $database_reviews[] = [
        'name' => $row['name'],
        'rating' => $row['rating'],
        'comment' => $row['comment'],
        'destination' => $row['destination']
    ];
}
$success_message='';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['review_name'])) {
    $name = htmlspecialchars($_POST['review_name']);
    $destination = htmlspecialchars($_POST['review_destination']);
    $rating = (int)$_POST['review_rating'];
    $comment = htmlspecialchars($_POST['review_comment']);

    // Database mein save hoga
    $query = "INSERT INTO reviews (name, destination, rating, comment) VALUES ('$name', '$destination', $rating, '$comment')";
    mysqli_query($conn, $query);

    $_SESSION['review_success'] = "Thank you, $name! Your review has been added.";
    header('Location: index.php');
    exit();
}
$all_reviews = array_merge($database_reviews, $static_reviews);


$page_title='Home-Tourista Pk';
include 'includes/header.php';

$review_success = '';
if(isset($_SESSION['review_success'])) {
    $review_success = $_SESSION['review_success'];
    unset($_SESSION['review_success']);
}

//foe checking error msg etc
if(isset($_SESSION['success_message']))  {
    echo '<div class="alert alert-success">'.$_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}


?>

<section class="hero">
    <div class="hero-slider">
        <div class="slide active" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/hero-bg.jpg');"></div>
        <div class="slide" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/hunza.jpg');"></div>
        <div class="slide" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/skardu.jpg');"></div>
    </div>

    <div class="slider-dots">
        <span class="dot active" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    
    <div class="hero-content">
        <h1>Discover the Beauty of Pakistan</h1>
        <p>Your journey begins here. Explore breathtaking destinations</p>
        <form class="search-bar" method="GET" action="destinations.php">
            <input type="text" placeholder="Where do you want to go?" name="search">
            <button type="submit">Search</button>
        </form>
    </div>
    
   
</section>

<section class="destinations">
    <h2>Popular Destinations</h2>
    <p class="section-subtitle">Explore the most beautiful places in Pakistan.</p>
    <div class="destination-container">
<!--ye 1st card hy-->
            <div class="card">
             <img src="images/hunza.jpg" alt="Hunza Valley">
            <div class="card-content">
                <h3>Hunza Valley</h3>
                <p>Experience the stunning mountain views and rich culture.</p>
                <a href="destination-detail.php?dest=Hunza Valley" class="btn">Explore</a>
            </div>
            </div>
<!--foe card 2-->
<div class="card">
             <img src="images/skardu.jpg" alt="Skardu">
            <div class="card-content">
                <h3>Skardu</h3>
                <p>Gateway to the world's highest peaks and crystal lakes.</p>
                <a href="destination-detail.php?dest=Skardu" class="btn">Explore</a>
            </div>
</div>
<!--For card 3-->
            <div class="card">
             <img src="images/murree.jpg" alt="Murree">
            

            <div class="card-content">
                <h3>Murree</h3>
                <p> Perfect hill station with pleasant weather year-round.</p>
                <a href="destination-detail.php?dest=Murree" class="btn">Explore</a>
            </div>
            </div>
<!--for card 4-->
            <div class="card">
                <img src="images/swat.jpg" alt="Swat Valley">
            <div class="card-content">
                <h3>Swat Valley</h3>
                <p>Switzerland of Pakistan with mesmerizing landscapes.</p>
                <a href="destination-detail.php?dest=Swat Valley" class="btn">Explore</a>
            </div>
            </div>
<!--For card 5-->
<div class="card">
                <img src="images/naran.jpg" alt="Naran">
            

            <div class="card-content">
                <h3>Naran</h3>
                <p>Beautiful valley with lakes and lush green meadows.</p>
                <a href="destination-detail.php?dest=Naran" class="btn">Explore</a>
            </div>
</div>
<!--For card 6-->
<div class="card">
            <img src="images/fairy-meadows.jpg" alt="Fairy Meadows">
            <div class="card-content">
                <h3>Fairy Meadows</h3>
                <p>Heaven on earth with views of Nanga Parbat.</p>
                <a href="destination-detail.php?dest=Fairy Meadows" class="btn">Explore</a>
            </div>
</div>
</section>
<div style="text-align: center; margin: 3rem 0;">
    <a href="packages.php" class="btn" style="font-size: 1.2rem; padding: 1rem 2rem;">Discover More Packages</a>
</div>

<!--section for features-->
<section class="features">
    <h2>Why Choose Tourista Pk</h2>
    <p class="section-subtitle">Your trusted travel partner</p>
<div class="features-container">
<!--1st feature box-->
    <div class="feature-box">
        <div class="icon">💰</div>
        <h3>Best Prices</h3>
        <p>We offer competitive prices and great value for money.</p>
    </div>
<!--2nd fetaure box-->
<div class="feature-box">
        <div class="icon">👨‍🏫</div>
        <h3>Expert Guides</h3>
        <p>Professional and experienced guides for your journey.</p>
</div>
<!--3rd fetaure box-->
<div class="feature-box">
        <div class="icon">📞</div>
        <h3>24/7 Support</h3>
        <p>Round the clock customer support for your convenience.</p>
</div>
<!--4rth fetaure box-->
<div class="feature-box">
        <div class="icon">🔒</div>
        <h3>Safe & Secure</h3>
        <p>Your safety is our priority with verified accommodations.</p>
</div>

</div>
</section>
<!--now we add section for reviews-->
<section class="reviews" style="padding: 4rem 2rem; background: #f8f9fa;">
    <h2 style="text-align: center; margin-bottom: 1rem;">Customer Reviews</h2>
    <p class="section-subtitle" style="text-align: center; margin-bottom: 3rem;">What our travelers say about us</p>

    <?php if(!empty($review_success)): ?>
        <div style="background: #d4edda; color: #155724; padding: 1.5rem; border-radius: 10px; text-align: center; max-width: 600px; margin: 0 auto 3rem;">
            <?php echo $review_success; ?>
        </div>
    <?php endif; ?>

    <div class="reviews-container" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; max-width: 1200px; margin: 0 auto;">
        <?php foreach($all_reviews as $review): ?>
            <div class="review-card">
                <div class="stars">
                    <?php echo str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']); ?>
                </div>
                <p style="font-style: italic; margin-bottom: 1rem;">"<?php echo $review['comment']; ?>"</p>
                <strong><?php echo $review['name']; ?></strong><br>
                <small><?php echo $review['destination']; ?></small>
            </div>
        <?php endforeach; ?>
    </div>
</section>




<section class="leave-review" style="padding: 4rem 2rem; background: white;">
    <h2 style="text-align: center; margin-bottom: 1rem;">Leave a Review</h2>
    <p class="section-subtitle" style="text-align: center; margin-bottom: 3rem;">Share your experience with us!</p>

    <div style="max-width: 600px; margin: 0 auto;">
        <form method="POST">
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label>Your Name</label>
                <input type="text" name="review_name" placeholder="Enter your name" required style="width:100%; padding:1rem; border-radius:8px; border:1px solid #ddd;">
            </div>
<div class="form-group" style="margin-bottom: 1.5rem;">
                <label>Rating</label>
                <select name="review_rating" required style="width:100%; padding:1rem; border-radius:8px; border:1px solid #ddd;">
                    <option value="">Select Rating</option>
                    <option value="5">5 Stars - Excellent</option>
                    <option value="4">4 Stars - Very Good</option>
                    <option value="3">3 Stars - Good</option>
                    <option value="2">2 Stars - Fair</option>
                    <option value="1">1 Star - Poor</option>
                </select>
</div>
<div class="form-group" style="margin-bottom: 1.5rem;">
                <!--this is for destination-->
    <label>Destination</label>
    <select name="review_destination" required style="width:100%; padding:1rem; border-radius:8px; border:1px solid #ddd;">
        <option value="">Select Destination</option>
        <option value="Hunza Valley">Hunza Valley</option>
        <option value="Skardu">Skardu</option>
        <option value="Murree">Murree</option>
        <option value="Swat Valley">Swat Valley</option>
        <option value="Naran">Naran</option>
        <option value="Fairy Meadows">Fairy Meadows</option>
    </select>
</div>
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label>Your Review</label>
                <textarea name="review_comment" placeholder="Share your experience..." required style="width:100%; padding:1rem; border-radius:8px; border:1px solid #ddd; height:150px;"></textarea>
            </div>

            <button type="submit" class="btn" style="width:100%; padding:1.2rem;">Submit Review</button>
        </form>
    </div>
</section>
<?php include 'includes/footer.php'; ?>

