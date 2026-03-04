<?php
session_start();
include "db.php";

if(!isset($_SESSION['id'])){
    header("location:login.php");
}

$id = $_SESSION['id'];
$result = mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container profile-box">
    <h2>My Profile</h2>
    <p><b>Name:</b> <?php echo $row['name']; ?></p>
    <p><b>Email:</b> <?php echo $row['email']; ?></p>
    <p><b>Stream:</b> <?php echo $row['stream']; ?></p>
    <p><b>Qualification:</b> <?php echo $row['qualification']; ?></p>
    
    <br>
    <!-- Buttons instead of links -->
    <form action="update.php" method="get" style="display:inline-block;">
        <button type="submit">Update Profile</button>
    </form>

    <form action="logout.php" method="post" style="display:inline-block; margin-left:10px;">
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>