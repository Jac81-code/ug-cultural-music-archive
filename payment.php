<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Stream Access | UG-Cultural Music</title>
    <style>
        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            background: linear-gradient(135deg, #fdfaf0 0%, #f4f4f4 100%); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .payment-card { 
            background: white; 
            padding: 40px; 
            border-radius: 15px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            text-align: center; 
            width: 380px; 
            border-top: 5px solid #e67e22;
        }
        .momo-btn { 
            background: #ffcc00; 
            color: #333; 
            padding: 14px; 
            display: block; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: bold; 
            margin-bottom: 15px; 
            border: 1px solid #e6b800; 
            transition: 0.3s;
        }
        .momo-btn:hover { background: #ffd633; transform: scale(1.02); }
        
        .airtel-btn { 
            background: #ff0000; 
            color: white; 
            padding: 14px; 
            display: block; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: bold; 
            transition: 0.3s;
        }
        .airtel-btn:hover { background: #cc0000; transform: scale(1.02); }

        .price-tag {
            font-size: 1.5rem;
            color: #2e7d32;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="payment-card">
    <h2 style="color: #e67e22; margin-top: 0;">Live Stream Access</h2>
    <p style="color: #555;">You are about to pay for the <strong>"Engalabi" Master Battle</strong> Live Link.</p>
    
    <div class="price-tag">UGX 15,000</div>
    
    <p style="font-size: 0.9em; color: #666; margin-bottom: 25px;">Select your Mobile Money provider:</p>
    
    <a href="#" class="momo-btn" onclick="alert('Step 1: Dial *165# \nStep 2: Enter Merchant Code \nStep 3: Enter PIN to confirm UGX 15,000')">
        Pay with MTN MoMo
    </a>
    
    <a href="#" class="airtel-btn" onclick="alert('Step 1: Dial *185# \nStep 2: Select Pay Merchant \nStep 3: Enter PIN to confirm UGX 15,000')">
        Pay with Airtel Money
    </a>
    
    <p style="margin-top: 25px;">
        <a href="events.php" style="color: #888; text-decoration: none; font-size: 0.85em; font-weight: bold;">
            ← Cancel and Go Back
        </a>
    </p>
</div>

</body>
</html>