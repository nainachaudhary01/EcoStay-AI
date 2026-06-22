<?php
include("includes/db.php");

if(isset($_POST['login']))
{
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{
if(mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $row['id'];
$_SESSION['user_name'] = $row['name'];

echo "<script>alert('Login Successful'); window.location='homestays.php';</script>";
}
else
{
echo "<script>alert('Invalid Email or Password');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login - EcoStay AI</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<h1>EcoStay AI</h1>
</header>

<div class="form-container">

<h2>User Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<input type="submit" name="login" value="Login">

</form>

</div>

</body>
</html>