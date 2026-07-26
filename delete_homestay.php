<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/db.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM homestays WHERE id='$id'");

    header("Location: homestays.php");
    exit();
}
?>