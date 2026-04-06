<?php
// 1. Connect to the database
$host = "localhost";
$user = "root"; 
$pass = ""; 
$dbname = "ug_cultural_db"; // <--- DOUBLE CHECK: Is this your DB name in phpMyAdmin?

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Check if the form was actually submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the data from the booking.php form
    $fullname = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $event = $conn->real_escape_string($_POST['event_name']);

    // 3. The SQL command to save the data into your 'bookings' table
    $sql = "INSERT INTO bookings (fullname, email, phone, event_name) 
            VALUES ('$fullname', '$email', '$phone', '$event')";

    if ($conn->query($sql) === TRUE) {
        // 4. Show a nice Success Message
        echo "
        <div style='text-align:center; padding:50px; font-family:sans-serif; background:#fdfaf0; min-height:100vh;'>
            <h1 style='color:#2e7d32;'>✔️ Booking Successful!</h1>
            <p style='font-size:1.2rem;'>Thank you <b>$fullname</b>. Your spot for the <b>$event</b> has been reserved.</p>
            <br>
            <a href='events.php' style='padding:10px 20px; background:#f4b400; color:black; text-decoration:none; border-radius:5px; font-weight:bold;'>Go Back to Events</a>
        </div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>