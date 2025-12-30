<?php
$page_title = 'Destination Detail - Tourista Pk';
include 'includes/header.php';

if(!isset($_GET['dest'])) {
    header('Location: index.php');
    exit();
}


$dest_name = htmlspecialchars($_GET['dest']);
$desc_map = [
    'Hunza Valley' => 'Hunza Valley is famous for its breathtaking mountain views, cherry blossoms in spring, and rich cultural heritage. Surrounded by snow-capped peaks like Rakaposhi and Ultar Sar. Best time to visit: April to October. Activities: Trekking, visiting Attabad Lake, Baltit and Altit Forts, exploring local markets, and enjoying apricot season.',
    'Skardu' => 'Skardu is the gateway to K2 and some of the highest peaks in the world. Known for its cold desert, crystal clear lakes like Shangrila and Satpara, and Deosai National Park. Best time: May to September. Activities: Jeep safaris, boating, trekking to K2 base camp, and exploring ancient forts.',
    'Murree' => 'Murree is a popular hill station near Islamabad with pleasant weather year-round. Famous for Mall Road, Patriata Chair Lift, and snowfall in winter. Best time: Summer for cool weather, winter for snow. Activities: Shopping, cable car rides, hiking, and enjoying local food.',
    'Swat Valley' => 'Known as the Switzerland of Pakistan with mesmerizing landscapes, rivers, and waterfalls. Rich in history with Buddhist ruins and beautiful valleys like Kalam and Mahodand Lake. Best time: April to October. Activities: Fishing, rafting, hiking, and exploring ancient sites.',
    'Naran' => 'Naran is a beautiful valley with Saif-ul-Malook Lake, lush green meadows, and rivers. Gateway to Babusar Pass. Best time: May to September. Activities: Horse riding, jeep safaris, boating, and camping.',
    'Fairy Meadows' => 'Fairy Meadows offers breathtaking views of Nanga Parbat (9th highest mountain). Heaven on earth with green meadows and forests. Best time: June to August. Activities: Trekking, camping, and photography.'
];

$description = $desc_map[$dest_name] ?? 'Beautiful destination in Pakistan with breathtaking views and rich culture.';

$image_map = [
    'Hunza Valley' => 'images/hunza.jpg',
    'Skardu' => 'images/skardu.jpg',
    'Murree' => 'images/murree.jpg',
    'Swat Valley' => 'images/swat.jpg',
    'Naran' => 'images/naran.jpg',
    'Fairy Meadows' => 'images/fairy-meadows.jpg'
];

$image = $image_map[$dest_name] ?? 'images/hero-bg.jpg';
?>



<section class="destinations">
    <h2><?php echo $dest_name; ?></h2>
    <p class="section-subtitle">Explore the beauty and culture of this amazing destination.</p>

    <div class="card" style="max-width: 800px; margin: 0 auto;">
       
        <img src="<?php echo $image; ?>" alt="<?php echo $dest_name; ?>" style="width:100%; height:400px; object-fit:cover; border-radius:10px;">
        
        <div class="card-content">
            <h3>About <?php echo $dest_name; ?></h3>
           <p style="font-size: 1.1rem; line-height: 1.8; color: #555; margin-top: 1rem;">
    <?php echo $description; ?>
</p>
            <p style="margin-top: 1rem;">
                <strong>Recommended Packages:</strong> Check our packages for this destination.
            </p>
            <a href="packages.php" class="btn">View Packages</a>
            <a href="index.php" class="btn" style="margin-left: 1rem;">Back to Home</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>