<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Portal | UG-Cultural Music</title>
    
    <style>
        :root {
            --primary: #2e7d32; --accent: #e67e22; --gold: #f4b400;
            --dark: #1a1a1a; --cream: #fdfaf0;
        }

        body { 
            font-family: 'Segoe UI', Roboto, sans-serif; margin: 0;
            display: flex; flex-direction: column; min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('images/background.jpg'); 
            background-size: cover; background-position: center; background-attachment: fixed;
        }

        /* Navigation */
        nav { 
            background: rgba(26, 26, 26, 0.95); backdrop-filter: blur(10px);
            color: white; padding: 15px 8%; display: flex; 
            justify-content: space-between; align-items: center;
            border-bottom: 3px solid var(--gold); 
        }
        nav a { color: white; text-decoration: none; margin-left: 20px; font-weight: 600; font-size: 0.9rem; transition: 0.3s; }
        nav a:hover { color: var(--gold); }

        .login-container { flex: 1; display: flex; align-items: center; justify-content: center; padding: 20px; }

        .login-card { 
            background: white; width: 100%; max-width: 420px; 
            padding: 40px; border-radius: 20px; 
            box-shadow: 0px 20px 40px rgba(0,0,0,0.4); 
            border-top: 8px solid var(--accent); text-align: center;
        }

        .login-card h2 { color: var(--dark); font-size: 2rem; margin-bottom: 10px; font-weight: 800; }
        .login-card p { color: #666; font-size: 0.95rem; margin-bottom: 30px; }

        .form-group { text-align: left; margin-bottom: 20px; position: relative; }
        label { display: block; font-size: 0.85rem; font-weight: 700; color: var(--dark); margin-bottom: 8px; text-transform: uppercase; }

        input[type="email"], input[type="password"] { 
            width: 100%; padding: 14px; border: 2px solid #eee; 
            border-radius: 10px; box-sizing: border-box; font-size: 1rem;
            transition: 0.3s; outline: none;
        }

        input:focus { border-color: var(--accent); background: #fffcf9; }

        /* Terms Wrapper */
        .terms-wrapper {
            background: #f9f9f9; padding: 12px; border-radius: 8px;
            margin-bottom: 25px; text-align: left; font-size: 0.85rem;
            border: 1px solid #eee;
        }

        .btn-warm { 
            width: 100%; padding: 16px; background: var(--accent); 
            color: white; border: none; border-radius: 10px;
            font-size: 1rem; font-weight: 800; cursor: pointer; 
            transition: 0.3s; text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3);
        }

        .btn-warm:hover { background: #d35400; transform: translateY(-2px); }

        /* Modal CSS */
        .modal { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); }
        .modal-content { background: white; margin: 10% auto; padding: 30px; border-radius: 15px; width: 90%; max-width: 500px; animation: slideDown 0.4s; }
        .modal-header { border-bottom: 2px solid var(--gold); padding-bottom: 10px; margin-bottom: 15px; font-weight: 800; color: var(--primary); font-size: 1.2rem; }
        @keyframes slideDown { from { transform: translateY(-100px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }

        .footer-links { margin-top: 30px; font-size: 0.9rem; color: #777; line-height: 1.6; }
        .footer-links a { color: var(--accent); font-weight: 700; text-decoration: none; }
    </style>
</head>
<body>

<nav>
    <div class="logo">
        <span style="color: var(--gold); font-size: 1.5rem; font-weight: 900;">UG</span>-CULTURAL
    </div>
    <div>
        <a href="index.php">Home</a>
        <a href="archive.php">Archive</a>
        <a href="events.php">Events</a>
      <?php if(isset($_SESSION['artist_id'])): ?>
            <a href="profile.php" style="color: var(--gold);">View Profile</a>
        <?php endif; ?>
    </div>
</nav>

<div class="login-container">
    <div class="login-card">
        <h2>Artist Portal</h2>
        <p>Enter your credentials to manage your archive.</p>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div style="background: #ffebee; color: #c62828; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; border-left: 4px solid #c62828; text-align: left;">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        
        <form action="login_process.php" method="POST" id="loginForm">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="e.g. musa@culture.ug" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="passInput" placeholder="••••••••" required>
               <div style="text-align: right; margin-top: 5px; display: flex; justify-content: space-between; align-items: center;">
    <a href="forgot_password.php" style="color: var(--accent); font-size: 0.8rem; font-weight: 700; text-decoration: none;">Forgot Password?</a>
    
    <small style="cursor: pointer; color: var(--primary); font-weight: 600;" onclick="togglePass()">Show Password</small>
</div>
            </div>

            <div class="terms-wrapper">
                <input type="checkbox" id="termsCheck" name="terms" required>
                <label for="termsCheck" style="display: inline; text-transform: none; font-weight: 500; cursor: pointer;">
                    I accept the <a href="javascript:void(0)" id="openModal" style="color: var(--accent); text-decoration: underline;">Portal Usage Terms</a>
                </label>
            </div>
            
            <button type="submit" class="btn-warm">Sign In to Dashboard</button>
        </form>
        
        <div class="footer-links">
            Don't have an account? <a href="register.php">Register as Artist</a><br>
            <a href="index.php" style="color: #aaa; font-weight: 400; font-size: 0.8rem;">← Back to Main Website</a>
        </div>
    </div>
</div>

<div id="termsModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">TERMS OF SERVICE</div>
        <div style="max-height: 250px; overflow-y: auto; font-size: 0.9rem; color: #444; text-align: left; line-height: 1.6; padding-right: 10px;">
            <p><strong>1. Data Accuracy:</strong> You agree that all traditional instruments (like the Adungu) and music details provided are authentic.</p>
            <p><strong>2. Copyright:</strong> Media uploaded grants the UG-Archive permission for academic use at UICT.</p>
            <p><strong>3. Security:</strong> You are responsible for your Artist ID and password confidentiality.</p>
            <p><strong>4. Compliance:</strong> All activities must align with the Uganda National Culture Policy.</p>
        </div>
        <button type="button" class="btn-warm" id="closeModal" style="margin-top: 20px; background: var(--primary);">I Agree & Close</button>
    </div>
</div>

<script>
    // Modal Interaction
    const modal = document.getElementById("termsModal");
    const btn = document.getElementById("openModal");
    const closeBtn = document.getElementById("closeModal");
    const check = document.getElementById("termsCheck");

    btn.onclick = function() { modal.style.display = "block"; }
    
    closeBtn.onclick = function() { 
        modal.style.display = "none"; 
        check.checked = true; // Automatically check the box once they close the modal
    }

    // Toggle Password Visibility Logic
    function togglePass() {
        const x = document.getElementById("passInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    // Close modal if clicking outside the white box
    window.onclick = function(event) {
        if (event.target == modal) { modal.style.display = "none"; }
    }
</script>

</body>
</html>