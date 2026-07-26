<?php
session_start();
include("includes/db.php");

$sql = "SELECT bookings.*, users.name AS user_name, homestays.name AS homestay_name
        FROM bookings
        JOIN users ON bookings.user_id = users.id
        JOIN homestays ON bookings.homestay_id = homestays.id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>All Bookings</h1>
</header>

<table border="1" cellpadding="10" cellspacing="0">

<tr>
    <th>User</th>
    <th>Homestay</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['user_name']; ?></td>

<td><?php echo $row['homestay_name']; ?></td>

<td><?php echo $row['booking_date']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a href="confirm_booking.php?id=<?php echo $row['id']; ?>">
<button>Confirm</button>
</a>

<a href="cancel_booking.php?id=<?php echo $row['id']; ?>">
<button style="background:red;color:white;">Cancel</button>
</a>

</td>

</tr>

<?php
}
?>

</table>

</body>
</html>