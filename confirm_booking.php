<?php
include("includes/db.php");

$id = $_GET['id'];

mysqli_query($conn,
"UPDATE bookings
SET status='Confirmed'
WHERE id='$id'");

header("Location: admin_bookings.php");
exit();
?>