<?php
include("includes/db.php");

// Fetch bookings
$bookings = mysqli_query($conn,"SELECT * FROM bookings");

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<h1>Admin Dashboard - EcoStay AI</h1>
</header>

<div class="form-container" style="width:80%">

<h2>All Bookings</h2>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>ID</th>
<th>User ID</th>
<th>Homestay ID</th>
<th>Booking Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($bookings)) { ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['homestay_id']; ?></td>
<td><?php echo $row['booking_date']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>