<?php
include("includes/db.php");

if(isset($_POST['register']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')";

if(mysqli_query($conn,$sql))
{
echo "<script>alert('Registration Successful');</script>";
}
}
else
{
echo mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">

<h2>User Registration</h2>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<input type="submit" name="register" value="Register">

</form>

</div>

</body>
</html>