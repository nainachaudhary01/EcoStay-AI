<?php
include("includes/db.php");

// Get homestay id
$id = $_GET['id'];

// Get homestay details
$sql = "SELECT * FROM homestays WHERE id=$id";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);

if(isset($_POST['book']))
{
$user_id = $_SESSION['user_id']; // (abhi demo user id)
$homestay_id = $id;
$booking_date = $_POST['date'];

$insert = "INSERT INTO bookings(user_id,homestay_id,booking_date)
VALUES('$user_id','$homestay_id','$booking_date')";

if(mysqli_query($conn,$insert))
{
echo "<script>alert('Booking Successful');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Homestay</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<h1>Book Your Stay</h1>
</header>

<div class="form-container">

<h2><?php echo $data['name']; ?></h2>
<p><?php echo $data['location']; ?></p>
<p>₹<?php echo $data['price']; ?>/Night</p>

<form method="POST">

<input type="date" name="date" required>

<input type="submit" name="book" value="Confirm Booking">

</form>

</div>

</body>
</html>