<?php
include 'includes/config.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
       $user=mysqli_fetch_assoc($result);
if(password_verify($password, $user['password'])){
    $_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['success_message'] = "Welcome back, " . $user['name'] . "!";

if(isset($_SESSION['redirect_after_login'])) {
    $redirect_url = $_SESSION['redirect_after_login'];
    unset($_SESSION['redirect_after_login']);
    header("Location: " . $redirect_url);
} else {
    header("Location: index.php");
}
exit();
} else{
            $error_message = "Wrong Password!";

         }
    }else{
        $error_message = "User not found";
    }

}
?>


<?php  if(isset($success_message)):  ?>
    <div class="alert alert-success"><?php echo $success_message;  ?></div>
    <?php endif; ?>
<?php if(isset($error_message)):   ?>
    <div class="alert alert-error"><?php echo $error_message;?></div>
    <?php endif; ?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login-Tourista Pk </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--now login container creating-->
<section class="login-container">
<div class="login-box">
        <h2>Login to get started with Tourista Pk</h2>
<?php
if(isset($_SESSION['success_message'])){
    echo '<div class="alert alert-success">'.$_SESSION['success_message'] . '</div>';
  
    unset($_SESSION['success_message']);
}

?>

<?php if(isset($error_message)):  ?>
    <div class="alert alert-error"><?php echo $error_message; ?></div>
<?php endif;  ?>












<form method="POST" action="login.php">
<div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
</div>
<!--for password fields-->
<div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
</div>
<!--for remember me checkbox-->
<div class="remember-group">
    <input type="checkbox" id="remember">
    <label for="remember">Remember Me</label>
</div>
                             
<!--for login buttons now-->
<button type="submit">Login</button>
        </form>
<p class="register-link">
    No Account? <a href="register.php">Register</a>
</p>
</div>
</section><!--this is for login container-->

</body>
</html>