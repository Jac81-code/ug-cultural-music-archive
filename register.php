<form method="POST" action="register_process.php">
    <h2 style="text-align: center; color: #2e7d32; margin-top: 0;">Artist Registration</h2>
    
    <label>Full Name / Group Name</label>
    <input type="text" name="fullname" placeholder="e.g. Ndere Troupe" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

    <label>Email Address</label>
    <input type="email" name="email" placeholder="Enter your email" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

    <div style="display: flex; gap: 10px; margin-bottom: 15px;">
        <div style="flex: 1;">
            <label>Region</label>
            <select name="region" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="Central">Central</option>
                <option value="Northern">Northern</option>
                <option value="Eastern">Eastern</option>
                <option value="Western">Western</option>
            </select>
        </div>
        <div style="flex: 1;">
            <label>Tribe</label>
            <input type="text" name="tribe" placeholder="e.g. Baganda" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
    </div>

    <label>Primary Instrument</label>
    <input type="text" name="instrument" placeholder="e.g. Adungu / Engalabi" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

    <label>Create Password</label>
    <input type="password" name="password" placeholder="••••••••" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">

    <button type="submit" class="btn-warm" style="width: 100%; padding: 14px; background: #2e7d32; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">
        Create My Archive Account
    </button>

    <p style="text-align: center; font-size: 14px; margin-top: 20px; color: #666;">
        Already a Member? 
        <a href="login.php" style="color: #2e7d32; font-weight: bold; text-decoration: none;">
            Login to Portal
        </a>
    </p>
</form>