<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billiards in Line: Your Automated Reservation System</title>
</head>

<?php require_once('../components/navbar.php')?>

<body>
    <div id="home" class="landing-container">
        <div class="mini">B.I.L.Y.A.R</div>
        <div class="title">Billiards in Line</div>
        <div class="subtitle">Your Automated Reservation System</div>       
        <a href="#reservation" class="view-btn">Reserve Now!</a>
    </div>

    <?php require_once('../pages/reservation.php')?>

    <div id="about-us" class="section-background">
        <div class="about-us-container">
            <h2>About Us</h2>
            <p>Welcome to <strong>B.I.L.Y.A.R.</strong>, your go-to online platform for reserving billiard tables with ease and convenience.</p>
            <p>We, <strong>SIPAT Ltd.</strong>, are a team of tech enthusiasts and billiards lovers who understand the frustration of long queues, uncertain wait times, and crowded halls. Our mission is simple: to modernize the billiards experience for both customers and business owners through smart, easy-to-use technology.</p>
            <p>With <strong>B.I.L.Y.A.R.</strong>, customers can check real-time table availability, book their preferred timeslot, and receive instant confirmation—all from their phone or computer. For billiard hall owners and staff, our system provides an efficient way to manage bookings, reduce walk-in congestion, and improve customer satisfaction.</p>
            <p>Whether you're a casual player, a competitive enthusiast, or a business looking to streamline operations, <strong>B.I.L.Y.A.R.</strong> is designed to make your billiards experience smoother, smarter, and stress-free.</p>
            <p><em>Let us handle the reservations — because smooth players don’t wait around.</em></p>
        </div>
    </div>

    

</body>
<?php require_once('../components/footer.php')?>

</html>
