<?php
$conn = new mysqli("localhost", "root", "", "ug_cultural_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Update password and clear token
    $stmt = $conn->prepare("UPDATE artists SET password = ?, reset_token = NULL, reset_expiry = NULL WHERE reset_token = ?");
    $stmt->bind_param("ss", $new_pass, $token);
    
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "Password updated! <a href='login.php'>Login now</a>";
    } else {
        echo "Invalid token or error.";
    }
}
?>