<?php
$page_title='Destinations-Tourista Pk';
include 'includes/header.php';
?>


<?php
$search_query='';
if(isset($_GET['search'])) {
    $search_query = strtolower(trim($_GET['search']));
}

/*data in array for all destinations */
$destinations = [
    [
        'name' => 'Hunza Valley',
        'image' => 'images/hunza.jpg',
        'desc' => 'Experience the stunning mountain views and rich culture.'
    ],
    [
        'name' => 'Skardu',
        'image' => 'images/skardu.jpg',
        'desc' => 'Gateway to the world\'s highest peaks and crystal lakes.'
    ],
    [
        'name' => 'Murree',
        'image' => 'images/murree.jpg',
        'desc' => 'Perfect hill station with pleasant weather year-round.'
    ],
    [
        'name' => 'Swat Valley',
        'image' => 'images/swat.jpg',
        'desc' => 'Switzerland of Pakistan with mesmerizing landscapes.'
    ],
    [
        'name' => 'Naran',
        'image' => 'images/naran.jpg',
        'desc' => 'Beautiful valley with lakes and lush green meadows.'
    ],
    [
        'name' => 'Fairy Meadows',
        'image' => 'images/fairy-meadows.jpg',
        'desc' => 'Heaven on earth with views of Nanga Parbat.'
    ]
];
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
<section class="destinations">
    <h2>Explore All Destinations</h2>
<?php if(!empty($search_query)): ?>

    <p class="section-subtitle">
    Search results for: "<?php echo htmlspecialchars($_GET['search']);?>"
    <a href="index.php" class="btn" style="display:inline-block;margin-top: 1rem;">Back to Home.</a>
</p>
<?php else: ?>
    <p class="section-subtitle">Discover the most beautiful places across Pakistan.</p>
    <?php endif; ?>





    <div class="destination-container">
        <?php 
        $found=false;
        foreach($destinations as $dest):
            if(empty($search_query)|| strpos(strtolower($dest['name']), $search_query)!==false):
                $found=true;
                ?>
<!--ye 1st card hy-->
            <div class="card">
             <img src='<?php echo $dest['image']; ?>' alt='<?php echo $dest['name'];?>'>
            <div class="card-content">
                <h3><?php echo $dest['name'];    ?></h3>
                <p><?php echo $dest['desc'];   ?></p>
                <a href="destination-detail.php?dest=<?php echo urlencode($dest['name']); ?>" class="btn">Explore</a>
            </div>
            </div>


<?php 
endif;
endforeach;
//if nothing found then 
if(!$found && !empty($search_query)):
    ?>

                <p style="grid-column: 1/-1; text-align:center; color:#666;  font-size: 1.2rem; padding:2rem;">
                No destinations found for "<?php echo htmlspecialchars($_GET['search']);  ?>"
                </p>
<?php endif; ?>
</div>
</section>
</main>
<?php include 'includes/footer.php';?>