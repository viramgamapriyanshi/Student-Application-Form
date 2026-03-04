<?php
include "db.php";

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stream = $_POST['stream'];
    $qualification = $_POST['qualification'];

    mysqli_query($conn,"INSERT INTO users(name,email,password,stream,qualification)
    VALUES('$name','$email','$password','$stream','$qualification')");
    
    echo "<script>alert('Registration Successful'); window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="stream">
            <option>Computer Science</option>
            <option>Electrical</option>
            <option>Civil</option>
        </select>

        <select name="qualification">
            <option>High School</option>
            <option>Diploma</option>
            <option>Bachelor</option>
        </select>

        <button name="register">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>