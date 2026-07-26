<?php
session_start();
include("includes/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT bookings.*, homestays.name
        FROM bookings
        JOIN homestays ON bookings.homestay_id = homestays.id
        WHERE bookings.user_id='$user_id'";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Bookings</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<h1>My Bookings</h1>
</header>

<div class="form-container">

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

<h3><?php echo $row['name']; ?></h3>

<p>
Booking Date:
<?php echo $row['booking_date']; ?>
</p>

<a href="cancel_booking.php?id=<?php echo $row['id']; ?>">
<button>Cancel Booking</button>
</a>
<a href="review.php?id=<?php echo $row['homestay_id']; ?>">
<button>Give Review</button>
</a>

</div>
<?php
}
?>

</div>

</body>
</html>