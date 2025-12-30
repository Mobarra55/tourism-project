<?php
session_start();
include '../includes/config.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $user = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_user'])) {
    $id = (int)$_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    mysqli_query($conn, "UPDATE users SET name='$name', email='$email' WHERE id=$id");
    header("Location: admin-bookings.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body { font-family: sans-serif; background: #f4f7f6; display: flex; justify-content: center; padding-top: 50px; }
        .box { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 350px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn { background: #2563eb; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; border-radius: 4px; }
    </style>
</head>
<body>
<div class="box">
    <h2 style="color:#1e3a8a;">Edit User</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>">
        <button type="submit" name="update_user" class="btn">Update</button>
        <a href="admin-bookings.php" style="display:block; text-align:center; margin-top:10px; color:#666; font-size:14px;">Back</a>
    </form>
</div>
</body>
</html>