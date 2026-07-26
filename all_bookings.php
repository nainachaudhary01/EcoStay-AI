<?php

include("includes/db.php");

$sql = "SELECT bookings.*, users.name as uname,
homestays.name as hname

FROM bookings

JOIN users
ON bookings.user_id = users.id

JOIN homestays
ON bookings.homestay_id = homestays.id";

$result = mysqli_query($conn,$sql);

?>

<h1>All Bookings</h1>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

<h3><?php echo $row['uname']; ?></h3>

<p>
Homestay:
<?php echo $row['hname']; ?>
</p>

<p>
Date:
<?php echo $row['booking_date']; ?>
</p>

</div>

<?php
}
?>