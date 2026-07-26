<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM homestays WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    mysqli_query($conn,"
        UPDATE homestays
        SET
        name='$name',
        location='$location',
        price='$price',
        description='$description'
        WHERE id='$id'
    ");

    header("Location: homestays.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Homestay</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

<h2>Edit Homestay</h2>

<form method="POST">

<input
type="text"
name="name"
value="<?php echo $row['name']; ?>"
required>

<input
type="text"
name="location"
value="<?php echo $row['location']; ?>"
required>

<input
type="number"
name="price"
value="<?php echo $row['price']; ?>"
required>

<textarea
name="description"
required><?php echo $row['description']; ?></textarea>

<br><br>

<input
type="submit"
name="update"
value="Update Homestay">

</form>

<br>

<a href="homestays.php">
<button>⬅ Back</button>
</a>

</div>

</body>
</html>