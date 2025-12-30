<?php
session_start();
include '../includes/config.php'; 

if(!isset($_SESSION['admin_logged_in'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin123'){
            $_SESSION['admin_logged_in'] = true;
        } else {
            $error = "Wrong Credentials!";
        }
    }
    if(!isset($_SESSION['admin_logged_in'])){
?>
<style>
    body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
    .login-box { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); width: 350px; }
    input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
    .btn { background: #2563eb; color: white; width: 100%; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
</style>
<div class="login-box">
    <h2 style="text-align:center; color:#1e3a8a;">Admin Login</h2>
    <?php if(isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
<?php 
    exit();
    }
}

if(isset($_GET['delete_user'])){
    $user_id = (int)$_GET['delete_user'];
    mysqli_query($conn, "DELETE FROM users WHERE id = $user_id");
    header("Location: admin-bookings.php"); 
    exit();
}

$bookings_result = mysqli_query($conn, "SELECT * FROM bookings ORDER BY created_at DESC");
$users_result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Tourista PK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; margin: 0; }
        .navbar { background: #1e3a8a; color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .container { padding: 20px; max-width: 1100px; margin: auto; }
        .card { background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 30px; overflow: hidden; }
        .card-header { background: #2563eb; color: white; padding: 12px 20px; font-weight: 600; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f8fafc; color: #1e40af; text-align: left; padding: 12px; border-bottom: 2px solid #e2e8f0; }
        td { padding: 12px; border-bottom: 1px solid #eee; color: #333; }
        .btn-edit { color: #2563eb; text-decoration: none; font-weight: bold; margin-right: 10px; border: 1px solid #2563eb; padding: 4px 8px; border-radius: 4px; font-size: 13px; }
        .btn-delete { color: #dc2626; text-decoration: none; font-weight: bold; border: 1px solid #dc2626; padding: 4px 8px; border-radius: 4px; font-size: 13px; }
        .logout-btn { background: #dc2626; color: white; padding: 7px 15px; border-radius: 4px; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="navbar">
    <h2>Admin Dashboard</h2>
    <a href="logout.php" class="logout-btn"><i class="fa fa-sign-out-alt"></i> Logout</a>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">Manage Users</div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = mysqli_fetch_assoc($users_result)): ?>
                    <tr>
                        <td>#<?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn-edit">Edit</a>
                            <a href="admin-bookings.php?delete_user=<?php echo $user['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header" style="background:#1e3a8a;">All Bookings</div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Package</th>
                        <th>Customer</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($bookings_result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><strong><?php echo $row['package_name']; ?></strong></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['travel_date']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>