<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$username = isset($_SESSION['user_name'])
    ? $_SESSION['user_name']
    : "Admin";
include("includes/db.php");

$totalUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$totalHomestays = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM homestays"));
$totalBookings = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM bookings"));
$totalReviews = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM reviews"));
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard - EcoStay AI</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<header>

<h1>EcoStay AI Admin Dashboard</h1>

<p>Welcome <?php echo htmlspecialchars($username); ?> 👋</p>

</header>

<!-- HERO SECTION START -->

<section class="hero">

    <div class="hero-content">

        <h1>🌿 EcoStay AI</h1>

        <h2>Smart Homestay & Eco-Tourism Platform</h2>

        <p>
            Discover beautiful homestays, explore nearby tourist attractions,
            and experience eco-friendly travel with AI-powered recommendations.
        </p>

        <a href="homestays.php" class="hero-btn">
            Explore Homestays →
        </a>

    </div>

</section>

<!-- HERO SECTION END -->

<div class="dashboard">

<div class="cards">

<a href="register.php" class="card-link">
    <div class="card">
        <div class="icon">👥</div>
        <p>Total Users</p>
        <h2><?php echo $totalUsers; ?></h2>
    </div>
</a>

<a href="homestays.php" class="card-link">
    <div class="card">
        <div class="icon">🏡</div>
        <p>Total Homestays</p>
        <h2><?php echo $totalHomestays; ?></h2>
    </div>
</a>

<a href="admin_bookings.php" class="card-link">
    <div class="card">
        <div class="icon">📅</div>
        <p>Total Bookings</p>
        <h2><?php echo $totalBookings; ?></h2>
    </div>
</a>

<a href="review.php" class="card-link">
    <div class="card">
        <div class="icon">⭐</div>
        <p>Total Reviews</p>
        <h2><?php echo $totalReviews; ?></h2>
    </div>
</a>

</div>

</div>   <!-- cards -->

<div class="actions">

<a href="homestays.php">
<button>🏡 View Homestays</button>
</a>

<a href="add_homestay.php">
<button>➕ Add Homestay</button>
</a>

<a href="booking.php">
<button>📖 Book Homestay</button>
</a>

<a href="review.php">
<button>⭐ Reviews</button>
</a>

<a href="admin_bookings.php">
<button>📅 Manage Bookings</button>
</a>

<a href="logout.php">
<button>🚪 Logout</button>
</a>

</div>

</div> <!-- dashboard ends -->

<section class="info-section">

</section>

</body>

</html>