<?php
session_start();
include 'includes/config.php';
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

$user_id=$_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id=$user_id";
$result=mysqli_query($conn, $query);
$user=mysqli_fetch_assoc($result);

?>

<?php $page_title='MY Profile-Tourista Pk'; include 'includes/header.php';?>
<section class="login-container">
    <div class="login-box">
        <h2>My Profile</h2>
        <p style="text-align: center; margin-bottom: 2rem;">Welcome Back,<?php echo htmlspecialchars($user['name']); ?>!</p>

        <div style="background: #f8f9fa; padding: 2rem; border-radius: 10px;">
            <p><strong>Full name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <?php if(isset($user['phone'])):?>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                <?php endif; ?>
                <p><strong>Member Since:</strong> <?php echo $user['created_at']; ?></p>
        </div>
<p style="text-align: center; margin-top:2rem;">
    <a href="index.php">Back to Home</a>
    <a href="logout.php" class="btn" style="background: #cc0000; margin-left: 1rem;">Logout</a>
</p>
    </div>
</section>
<?php include 'includes/footer.php';?>