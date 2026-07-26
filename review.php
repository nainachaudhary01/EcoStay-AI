<?php

session_start();
include("includes/db.php");

$homestay_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

if(isset($_POST['submit']))
{
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    mysqli_query($conn,
    "INSERT INTO reviews(user_id,homestay_id,rating,comment)
    VALUES('$user_id','$homestay_id','$rating','$comment')");

    echo "<script>alert('Review Added');</script>";
}
?>

<form method="POST">

<select name="rating">
<option value="5">5 Star</option>
<option value="4">4 Star</option>
<option value="3">3 Star</option>
<option value="2">2 Star</option>
<option value="1">1 Star</option>
</select>

<br><br>

<textarea
name="comment"
placeholder="Write Review"
required></textarea>

<br><br>

<input type="submit"
name="submit"
value="Submit Review">

</form>