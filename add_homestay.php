<?php

session_start();
include("includes/db.php");

if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $image = "";

    if(!empty($_FILES['image']['name']))
    {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp, "uploads/" . $image);
    }

    $sql = "INSERT INTO homestays(name, location, price, description, image)
            VALUES('$name', '$location', '$price', '$description', '$image')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Homestay Added Successfully');</script>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Homestay - EcoStay AI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Add New Homestay</h1>
</header>

<div class="form-container">

    <form method="POST" enctype="multipart/form-data">

        <input type="text"
               name="name"
               placeholder="Homestay Name"
               required>

        <input type="text"
               name="location"
               placeholder="Location"
               required>

        <input type="number"
               name="price"
               placeholder="Price"
               required>

        <textarea
               name="description"
               placeholder="Description"
               required></textarea>

        <br><br>

        <label>Select Image (Optional)</label><br>
        <input type="file" name="image">

        <br><br>

        <input type="submit"
               name="add"
               value="Add Homestay">

    </form>

</div>

</body>
</html>