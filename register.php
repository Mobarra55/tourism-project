<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Tourista Pk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--now login container creating-->
<section class="login-container">
<div class="login-box">
        <h2>Create your account</h2>
<?php if(isset($success_message)):   ?>
    <div class="alert alert-success"><?php echo $success_message;   ?></div>
    <?php endif;   ?>
<?php
include 'includes/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST['full_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $hashed_password=password_hash($password, PASSWORD_DEFAULT);
    $query="INSERT INTO users(name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashed_password')";
    if(mysqli_query($conn,$query))  {
    
    $user_id = mysqli_insert_id($conn);
    
    // ye Auto-login hoga
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $name;
    $_SESSION['success_message'] = "Registration successful! Welcome to Tourista Pk.";
    
    // Check if redirect URL saved hai
    if(isset($_SESSION['redirect_after_login'])) {
        $redirect_url = $_SESSION['redirect_after_login'];
        unset($_SESSION['redirect_after_login']);
        header("Location: " . $redirect_url);
    } else {
        header("Location: index.php");
    }
    exit();
}
    } else{
    echo "Error:" .mysqli_error($conn);
}


?>












<!--form crete krna hy-->       
<form method="POST" action="register.php">
<!--for name field-->
<div class="form-group">
    <label> Full Name</label>
    <input type="text" name="full_name" placeholder="Enter Your Full Name" required>

</div>
<!--for email field-->
<div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
</div>
<!--phone number field-->
<div class="form-group">
    <label>Phone Number</label>
    <input type="tel" name="phone" placeholder="Enter Your Phone Number" required>

</div>
<!--for password fields-->
<div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
</div>
<!--foe cpassword confirmation-->
<div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" placeholder="Confirm Your Password" required>
</div>
<!--for login buttons now-->
<button type="submit">Sign Up</button>
        </form>
<p class="register-link">
    Already have account? <a href="login.php">Login</a>
</p>
</div>
</section><!--this is for login container-->

</body>
</html>