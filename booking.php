<?php
session_start();
include 'includes/config.php';

if(!isset($_SESSION['user_id'])) {
    $_SESSION['error_message'] = "Please login to book a package!";
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}

$page_title = 'Book Package - Tourista Pk';
include 'includes/header.php';


$package_name = 'Selected Package';
$package_price = '0';

if(isset($_GET['package'])) {
    $package_name = htmlspecialchars($_GET['package']);
}
if(isset($_GET['price'])) {
    $package_price = number_format($_GET['price']);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //it check if user logged in
    if(!isset($_SESSION['user_id'])) {
    $_SESSION['error_message'] = "Please login to book a package!";
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}

    $user_id = $_SESSION['user_id'];
    $package_name = $_POST['package_name'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $num_people = $_POST['num_people'];
    $room_type = $_POST['room_type'];
    $travel_date = $_POST['travel_date'];

    $query = "INSERT INTO bookings (user_id, package_name, full_name, email, phone, num_people, room_type, travel_date) 
              VALUES ($user_id, '$package_name', '$full_name', '$email', '$phone', $num_people, '$room_type', '$travel_date')";


    if(mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = "Booking Successful! Your booking for $package_name has been confirmed!";
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<section class="login-container">
    <div class="login-box" style="max-width: 900px; width: 95%; padding:3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 15px;">
        <h2>Book package: <?php echo $package_name; ?></h2>
        <p style="font-size: 1.2rem; color: #00d9ff; margin-bottom: 2rem; max-width: 800px; width: 90%;">
            Price per person: Rs. <?php echo $package_price; ?>
</p>
<!--form crete krna hy-->       
<form id="bookingForm" method="POST" class="booking-form-container" novalidate>
<!--for name and email field-->
<div class="form-group">
                <label>Full Name *</label>
                <input type="text" name="full_name" placeholder="Enter your full name" required>
                <span class="error" style="color: red; font-size: 0.9rem; display:none;"></span>
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" placeholder="Enter your email" required>
                <span class="error" style="color: red; font-size: 0.9rem; display:none;"></span>
            </div>
<!--phone number and no of people field-->
<div class="form-group">
                <label>Phone Number *</label>
                <input type="tel" name="phone" placeholder="Enter your phone number" required>
                <span class="error" style="color: red; font-size: 0.9rem; display:none;"></span>
            </div>
            <div class="form-group">
                <label>Number of People *</label>
                <input type="number" name="num_people" min="1" value="1" required>
                <span class="error" style="color: red; font-size: 0.9rem; display:none;"></span>
            </div>
<!--foe rooms-->
<div class="form-group">
                <label>Room Type *</label>
                <select name="room_type" required>
                    <option value="">Select Room Type</option>
                    <option value="single">Single Room</option>
                    <option value="double">Double Room</option>
                    <option value="family">Family Room</option>
                </select>
                <span class="error" style="color: red; font-size: 0.9rem; display:none;"></span>
            </div>
            <div class="form-group">
                <label>Travel Date *</label>
                <input type="date" name="travel_date" required>
                <span class="error" style="color: red; font-size: 0.9rem; display:none;"></span>
            </div>

    <input type="hidden" name="package_name" value="<?php echo $package_name; ?>">

    <button type="submit" class="btn full-width">Confirm Booking</button>
</form>
<style>
.form-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #333;
    font-weight: 500;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 0.9rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    transition: border 0.3s;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: #667eea;
}

.form-group input.error-input,
.form-group select.error-input {
    border-color: red !important;
}

.form-group .error {
    display: block;
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: 0.3rem;
    font-weight: 500;
}

.btn.full-width {
    width: 100%;
    padding: 1.2rem;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s;
}

.btn.full-width:hover {
    background: #5568d3;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#bookingForm").on("submit", function(e) {
        let hasError = false;
        
        
        $(".error").hide().text("");
        $("input, select").removeClass("error-input");

      
        let full_name = $("input[name='full_name']").val().trim();
        let namePattern = /^[a-zA-Z\s]+$/;
        if(full_name === "") {
            showError("full_name", "Full Name is required!");
            hasError = true;
        } else if(!namePattern.test(full_name)) {
            showError("full_name", "Only alphabets are allowed!");
            hasError = true;
        }

      
        let email = $("input[name='email']").val().trim();
        
        let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        
        if(email === "") {
            showError("email", "Email is required!");
            hasError = true;
        } else if(!emailPattern.test(email)) {
            showError("email", "Invalid email format (e.g. name@mail.com)");
            hasError = true;
        }

        let phone = $("input[name='phone']").val().trim();
        if(phone === "") {
            showError("phone", "Phone number is required!");
            hasError = true;
        } else if(phone.length !== 11 || !/^\d+$/.test(phone)) {
            showError("phone", "Phone must be exactly 11 digits!");
            hasError = true;
        }

     
        let num_people = $("input[name='num_people']").val();
        if(num_people === "" || num_people < 1 || isNaN(num_people)) {
            showError("num_people", "Please enter a valid number (Min: 1)");
            hasError = true;
        }

        if(hasError) {
            e.preventDefault();
           
            $('html, body').animate({
                scrollTop: $(".error-input").first().offset().top - 100
            }, 500);
        }
    });

   
    function showError(fieldName, message) {
        let inputField = $("[name='" + fieldName + "']");
        inputField.addClass("error-input");
        inputField.siblings(".error").text(message).show();
    }

  
    $("input, select").on("input change", function() {
        $(this).removeClass("error-input");
        $(this).siblings(".error").hide();
    });
});
</script>

<p class="register-link" style="text-align: center;">
    <a href="packages.php">Back to packages</a>
</p>
</div>
</section>
<?php include 'includes/footer.php';?>