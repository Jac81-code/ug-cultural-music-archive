<?php
$token = $_GET['token'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set New Password | UG-Cultural</title>
    </head>
<body>
    <div class="login-card" style="margin: auto; margin-top: 10vh;">
        <h2>New Password</h2>
        <form action="update_password.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <div class="form-group" style="text-align:left;">
                <label>Enter New Password</label>
                <input type="password" name="new_password" style="width:100%; padding:14px; border:2px solid #eee; border-radius:10px;" required>
            </div>
            <button type="submit" class="btn-warm" style="width:100%; padding:16px; background:#e67e22; color:white; border:none; border-radius:10px; cursor:pointer;">Update Password</button>
        </form>
    </div>
</body>
</html>