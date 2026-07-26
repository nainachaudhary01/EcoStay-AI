<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

include("includes/db.php");

if(isset($_POST['submit_review']))
{
    $user_id = $_SESSION['user_id'];
    $homestay_id = $_POST['homestay_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    mysqli_query($conn,
    "INSERT INTO reviews(user_id,homestay_id,rating,comment)
    VALUES('$user_id','$homestay_id','$rating','$comment')");
}

$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $result = mysqli_query($conn,
    "SELECT * FROM homestays
     WHERE location LIKE '%$search%'");
}
else
{
    $result = mysqli_query($conn,
    "SELECT * FROM homestays");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Homestays - EcoStay AI</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<h1>Available Homestays</h1>

<p>Welcome, <?php echo $_SESSION['user_name']; ?></p>

<a href="logout.php">
<button>Logout</button>
</a>
<a href="my_bookings.php">
<button>My Bookings</button>
</a>

<a href="dashboard.php">
<button>Dashboard</button>
</a>

<a href="add_homestay.php">
<button>Add Homestay</button>
</a>

</header>

<form method="GET">

<input type="text"
name="search"
placeholder="Search Location">

<input type="submit"
value="Search">

</form>

<section class="features">

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

<?php
if(!empty($row['image']))
{
?>
<img src="uploads/<?php echo $row['image']; ?>" width="250">
<?php
}
?>

<h3><?php echo $row['name']; ?></h3>

<p>Location: <?php echo $row['location']; ?></p>

<p>Price: ₹<?php echo $row['price']; ?>/Night</p>

<p><?php echo $row['description']; ?></p>

<h4>Reviews:</h4>

<?php

$hid = $row['id'];

$reviews = mysqli_query($conn,
"SELECT * FROM reviews WHERE homestay_id='$hid'");

while($review = mysqli_fetch_assoc($reviews))
{
?>

<p>

<?php

for($i=1; $i<=5; $i++)
{
    if($i <= $review['rating'])
    {
        echo "⭐";
    }
    else
    {
        echo "☆";
    }
}

?>

</p>
<p>
<?php echo $review['comment']; ?>
</p>

<hr>

<?php
}
?>

<form method="POST">

<input type="hidden"
name="homestay_id"
value="<?php echo $row['id']; ?>">

<select name="rating" required>
<option value="">Rate this Homestay</option>
<option value="5">⭐⭐⭐⭐⭐</option>
<option value="4">⭐⭐⭐⭐☆</option>
<option value="3">⭐⭐⭐☆☆</option>
<option value="2">⭐⭐☆☆☆</option>
<option value="1">⭐☆☆☆☆</option>
</select>

<br><br>

<textarea
name="comment"
placeholder="Write your review"
required></textarea>

<br><br>

<input type="submit"
name="submit_review"
value="Submit Review">

</form>

<br><br>

<a href="edit_homestay.php?id=<?php echo $row['id']; ?>">
    <button>✏️ Edit</button>
</a>

<a href="delete_homestay.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this homestay?');">
    <button style="background:red;">🗑 Delete</button>
</a>

<br><br>

<a href="booking.php?id=<?php echo $row['id']; ?>">
    <button>🏡 Book Now</button>
</a>

</div>

<?php
}
?>

</section>

</body>
</html>