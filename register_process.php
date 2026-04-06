<?php
// 1. Include the database connection
include 'db_connect.php';

// 2. Check if the form was actually submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Collect and "Sanitize" the data (to prevent errors)
    $fullname   = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $region     = mysqli_real_escape_string($conn, $_POST['region']);
    $tribe      = mysqli_real_escape_string($conn, $_POST['tribe']);
    $instrument = mysqli_real_escape_string($conn, $_POST['instrument']);
    
    // 4. Encrypt the password for security (Essential for your project defense!)
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // 5. The SQL Query to insert the new artist into the database
    $sql = "INSERT INTO artists (fullname, email, region, tribe, instrument, password) 
            VALUES ('$fullname', '$email', '$region', '$tribe', '$instrument', '$password')";

    // 6. Execute the query and check if it worked
    if ($conn->query($sql) === TRUE) {
        // Success: Show an alert and send them to the login page
        echo "<script>
                alert('Registration Successful! You can now login.');
                window.location.href='login.php';
              </script>";
    } else {
        // Failure: Show the database error
        echo "Registration Error: " . $conn->error;
    }
} else {
    // If someone tries to access this file directly without the form
    header("Location: register.php");
    exit();
}
?>