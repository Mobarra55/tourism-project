<?php
$page_title = 'Contact - Tourista Pk';
include 'includes/header.php';
?>
<?php
include 'includes/config.php';

$contact_success = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $query = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
    mysqli_query($conn, $query);

    $contact_success = "Thank you, $name! Your message has been sent successfully. We will contact you soon.";
}
?>


<section class="contact" style="padding: 4rem 2rem; max-width: 1200px; margin: 0 auto;">
    <h2>Contact Us</h2>
    <p class="section-subtitle">Get in touch with us for inquiries and bookings.</p>
    
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem; margin-top: 3rem;">
        <div>
            <h3 style="margin-bottom: 1.5rem;">Contact Information</h3>
            <p style="margin-bottom: 1rem;"><strong>Email:</strong> info@touristapk.com</p>
            <p style="margin-bottom: 1rem;"><strong>Phone:</strong> +92 300 1234567</p>
            <p style="margin-bottom: 1rem;"><strong>Address:</strong> Burewala, Pakistan</p>
            <p><strong>Office Hours:</strong> Monday - Saturday, 9AM - 6PM</p>
        </div>
        
        <div>
            <h3 style="margin-bottom: 1.5rem;">Send us a Message.</h3>
<?php if(!empty($contact_success)): ?>
    <div class="alert alert-success" style="margin-bottom: 2rem;">
        <?php echo $contact_success; ?>
    </div>
<?php endif; ?>




            <form method="POST">
                <div class="form-group">
                    <input type="text" name='name' placeholder="Your Name" required style="width:100%; padding:1rem; margin-bottom:0rem; border-radius:8px; border:1px solid #ddd;">
                </div>
                <div class="form-group">
                    <input type="email" name='email' placeholder="Your Email" required style="width:100%; padding:1rem; margin-bottom:0rem; border-radius:8px; border:1px solid #ddd;">
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Your Message" required style="width:100%; padding:1rem; margin-bottom:0rem; border-radius:8px; border:1px solid #ddd; height:150px;"></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>