<?php
session_start();
include "db.php";

if(!isset($_SESSION['id'])){
    header("location:login.php");
}

$id = $_SESSION['id'];

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stream = $_POST['stream'];
    $qualification = $_POST['qualification'];

    mysqli_query($conn,"UPDATE users SET 
        name='$name',
        email='$email',
        password='$password',
        stream='$stream',
        qualification='$qualification'
        WHERE id='$id'");

    echo "<script>alert('Profile Updated Successfully'); window.location='profile.php';</script>";
}

$result = mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Update Profile</h2>
    <form method="post">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <input type="text" name="password" value="<?php echo $row['password']; ?>" required>

        <select name="stream">
            <option <?php if($row['stream']=="Computer Science") echo "selected"; ?>>Computer Science</option>
            <option <?php if($row['stream']=="Electrical") echo "selected"; ?>>Electrical</option>
            <option <?php if($row['stream']=="Civil") echo "selected"; ?>>Civil</option>
        </select>

        <select name="qualification">
            <option <?php if($row['qualification']=="High School") echo "selected"; ?>>High School</option>
            <option <?php if($row['qualification']=="Diploma") echo "selected"; ?>>Diploma</option>
            <option <?php if($row['qualification']=="Bachelor") echo "selected"; ?>>Bachelor</option>
        </select>

        <button name="update">Update</button>
    </form>
</div>
</body>
</html>