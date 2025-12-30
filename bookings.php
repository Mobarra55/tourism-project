<?php
session_start();
include 'includes/config.php';

if(!isset($_SESSION['user_id'])) {
    $_SESSION['success_message'] = "Please login to view your bookings.";
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];


$query = "SELECT * FROM bookings WHERE user_id = $user_id ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

$page_title = 'My Bookings - Tourista Pk';
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
<section style="padding: 4rem 2rem; max-width: 1200px; margin: 0 auto;">
    <h2>My Bookings</h2>
    <p class="section-subtitle">Here are all your booked packages</p>

    <?php if(mysqli_num_rows($result) > 0): ?>
        <div style="overflow-x: auto;">
            <table style="width:100%; border-collapse: collapse; margin-top: 2rem; background: white;">
                <thead>
                    <tr style="background: #f0f0f0;">
                        <th style="padding: 1.5rem; border: 1px solid #ddd; text-align: left;">Package</th>
                        <th style="padding: 1.5rem; border: 1px solid #ddd; text-align: center;">People</th>
                        <th style="padding: 1.5rem; border: 1px solid #ddd; text-align: center;">Room Type</th>
                        <th style="padding: 1.5rem; border: 1px solid #ddd; text-align: center;">Travel Date</th>
                        <th style="padding: 1.5rem; border: 1px solid #ddd; text-align: center;">Booked On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($booking = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td style="padding: 1.5rem; border: 1px solid #ddd;"><?php echo htmlspecialchars($booking['package_name']); ?></td>
                        <td style="padding: 1.5rem; border: 1px solid #ddd; text-align: center;"><?php echo $booking['num_people']; ?></td>
                        <td style="padding: 1.5rem; border: 1px solid #ddd; text-align: center;"><?php echo htmlspecialchars($booking['room_type']); ?></td>
                        <td style="padding: 1.5rem; border: 1px solid #ddd; text-align: center;"><?php echo $booking['travel_date']; ?></td>
                        <td style="padding: 1.5rem; border: 1px solid #ddd; text-align: center;"><?php echo date('M d, Y', strtotime($booking['created_at'])); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p style="text-align: center; margin-top: 3rem; font-size: 1.2rem; color: #666;">
            No bookings yet. <a href="packages.php" class="btn">Book a package now!</a>
        </p>
    <?php endif; ?>

    <p style="text-align: center; margin-top: 3rem;">
        <a href="index.php" class="btn">Back to Home</a>
    </p>
</section>
    </main>
<?php include 'includes/footer.php'; ?>