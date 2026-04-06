<?php
// 1. Get the data from the URL (e.g., booking.php?event=Nile+Expo)
$eventName = isset($_GET['event']) ? htmlspecialchars($_GET['event']) : "Unknown Event";
$eventPrice = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : "FREE";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Booking | UG-Cultural Music</title>
    <style>
        :root { --primary: #2e7d32; --gold: #f4b400; --dark: #1a1a1a; --cream: #fdfaf0; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--cream); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 400px; text-align: center; border-top: 5px solid var(--primary); }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .btn { background: var(--gold); color: black; border: none; padding: 15px; width: 100%; border-radius: 8px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>

<div class="card">
    <h2>Confirm Your Pass</h2>
    <p style="color: var(--primary); font-weight: bold;"><?php echo $eventName; ?></p>
    <p>Price: <?php echo $eventPrice; ?> /=</p>

    <form action="process_booking.php" method="POST">
        <input type="hidden" name="event_name" value="<?php echo $eventName; ?>">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="phone" placeholder="Phone Number (MTN/Airtel)" required>
        
        <button type="submit" class="btn">Confirm & Save</button>
    </form>
    
    <a href="events.php" style="display:block; margin-top:15px; font-size:0.8rem; color:#666;">Cancel</a>
</div>

</body>
</html>