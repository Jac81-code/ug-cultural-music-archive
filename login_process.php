<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Search for the artist by email
    $sql = "SELECT * FROM artists WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Check if the password matches the hash in the database
        if (password_verify($password, $row['password'])) {
            $_SESSION['artist_id'] = $row['id'];
            $_SESSION['artist_name'] = $row['fullname'];
            header("Location: archive.php"); // Send them to the archive after login
        } else {
            echo "<script>alert('Invalid Password'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('No account found with that email'); window.location='login.php';</script>";
    }
}
?>