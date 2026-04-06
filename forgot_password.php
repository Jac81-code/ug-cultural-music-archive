<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recover Access | UG-Cultural</title>
    <style>
        /* Reusing your CSS variables and styles */
        :root { --primary: #2e7d32; --accent: #e67e22; --gold: #f4b400; --dark: #1a1a1a; }
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/background.jpg'); background-size: cover; background-attachment: fixed; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .login-card { background: white; width: 100%; max-width: 420px; padding: 40px; border-radius: 20px; text-align: center; border-top: 8px solid var(--accent); box-shadow: 0px 20px 40px rgba(0,0,0,0.4); }
        .form-group { text-align: left; margin-bottom: 20px; }
        label { display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px; text-transform: uppercase; }
        input[type="email"] { width: 100%; padding: 14px; border: 2px solid #eee; border-radius: 10px; box-sizing: border-box; outline: none; }
        .btn-warm { width: 100%; padding: 16px; background: var(--accent); color: white; border: none; border-radius: 10px; font-weight: 800; cursor: pointer; text-transform: uppercase; transition: 0.3s; }
        .btn-warm:hover { background: #d35400; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Recover Access</h2>
        <p>Enter your email to receive a recovery link.</p>
        <form action="request_reset.php" method="POST">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="e.g. musa@culture.ug" required>
            </div>
            <button type="submit" class="btn-warm">Request Reset Link</button>
        </form>
        <div style="margin-top: 20px;">
            <a href="login.php" style="color: #777; text-decoration: none; font-size: 0.9rem;">← Back to Login</a>
        </div>
    </div>
</body>
</html>