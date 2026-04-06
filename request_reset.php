<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "ug_cultural_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32)); // Secret key
    $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

    // Update the record with token and expiry
    $stmt = $conn->prepare("UPDATE artists SET reset_token = ?, reset_expiry = ? WHERE email = ?");
    $stmt->bind_param("sss", $token, $expiry, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $resetLink = "http://localhost/your_folder_name/reset_password.php?token=" . $token;
        
        echo "<div style='font-family:sans-serif; text-align:center; padding:50px;'>";
        echo "<h2>Link Generated Successfully!</h2>";
        echo "<p>For your demo, use this link to reset the password:</p>";
        echo "<a href='$resetLink' style='color:orange; font-weight:bold;'>$resetLink</a>";
        echo "</div>";
    } else {
        echo "Email not found in our cultural archive.";
    }
}
?>