<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Galas | UG-Cultural Music</title>
    <style>
        :root {
            --primary: #2e7d32; --accent: #e67e22; --gold: #f4b400;
            --dark: #1a1a1a; --cream: #f4f1ea; --royal: #800000; --vocal: #006064;
        }
        
        body { 
            font-family: 'Segoe UI', sans-serif; margin: 0; 
            background: linear-gradient(rgba(244, 241, 234, 0.92), rgba(244, 241, 234, 0.92)), 
                        url('https://www.transparenttextures.com/patterns/wood-pattern.png');
            color: #333; scroll-behavior: smooth; 
        }
        
        nav { 
            background: var(--dark); color: white; padding: 15px 8%; 
            display: flex; justify-content: space-between; align-items: center; 
            border-bottom: 4px solid var(--gold); position: sticky; top: 0; z-index: 1000; 
        }
        nav a { color: white; text-decoration: none; margin-left: 25px; font-weight: 600; font-size: 0.9rem; transition: 0.3s; }
        nav a:hover { color: var(--gold); }
        
        .container { max-width: 1000px; margin: 0 auto; padding: 40px 20px; }

        .event-card { 
            background: white; border-radius: 20px; margin-bottom: 35px; 
            display: flex; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            border-left: 10px solid var(--primary); transition: 0.4s;
        }
        .event-card:hover { transform: translateY(-5px); }
        
        .event-img { width: 320px; object-fit: cover; background: #ccc; }
        .event-info { padding: 30px; flex: 1; }
        
        .date-badge { font-weight: 800; font-size: 0.85rem; margin-bottom: 8px; display: block; }

        .prize-tag {
            background: #fffdf0; border: 1px solid var(--gold);
            padding: 8px 12px; border-radius: 8px; margin: 10px 0;
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 0.85rem; font-weight: 700; color: #856404;
        }

        /* Styling for the Fees */
        .fee-tag {
            font-size: 0.9rem; font-weight: bold; color: #d32f2f; margin-top: 5px; display: block;
        }

        .significance-box {
            background: #fdfdfd; border: 1px dashed #ddd;
            padding: 12px; border-radius: 8px; margin: 15px 0;
            font-size: 0.85rem; color: #555; line-height: 1.5;
        }

        .ticket-btn { 
            background: var(--accent); color: white; padding: 12px 25px; 
            text-decoration: none; border-radius: 8px; font-weight: bold; 
            display: inline-block; transition: 0.3s; border: none; cursor: pointer;
        }

        @media (max-width: 768px) {
            .event-card { flex-direction: column; }
            .event-img { width: 100%; height: 200px; }
        }

        #booking-section {
            background: white; padding: 40px; border-radius: 20px; 
            margin-top: 50px; border: 2px solid var(--gold); 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        footer { background: var(--dark); color: white; text-align: center; padding: 40px; margin-top: 60px; }
    </style>
</head>
<body>

<nav>
    <div class="logo">
        <span style="color: var(--gold); font-size: 1.5rem; font-weight: 900;">UG</span>-CULTURAL MUSIC
    </div>
    <div>
        <a href="index.php">Home</a>
        <a href="archive.php">Music Archive</a>
        <a href="events.php" style="color: var(--gold);">Events</a>
        <a href="login.php" style="background: var(--gold); color: black; padding: 8px 15px; border-radius: 5px;">Portal</a>
    </div>
</nav>

<div class="container">
    <h1 style="text-align: center; margin-bottom: 5px; font-size: 2.5rem; color: var(--dark);">Cultural Galas & Events</h1>
    <p style="text-align: center; color: #666; margin-bottom: 40px;">Preserving heritage through live performance and rhythm.</p>

    <div class="event-card" style="border-left-color: var(--royal);">
        <img src="images/muw.jpg" class="event-img" onerror="this.src='https://via.placeholder.com/320x240?text=Baganda+Dance'">
        <div class="event-info">
            <span class="date-badge" style="color: var(--royal);">12 OCT, 2026</span>
            <span style="background: #ffedea; color: #d32f2f; padding: 4px 10px; border-radius: 5px; font-size: 0.75rem; font-weight: bold;">🔥 ONLY 30 TICKETS LEFT</span>
            <h2>Baganda Dancing Competition</h2>
            <div class="prize-tag">🏆 Prize: 2,500,000/=</div>
            <span class="fee-tag">Registration Fee: 100,000/=</span>
            <div class="significance-box">Traditional Bakisimba and Muwogola dance showcase.</div>
            <a href="#booking-section" class="ticket-btn" style="background: var(--royal);">Register Troupe</a>
        </div>
    </div>

    <div class="event-card" style="border-left-color: var(--accent);">
        <img src="images/miw.jpg" class="event-img" onerror="this.src='https://via.placeholder.com/320x240?text=Kadodi+Festival'">
        <div class="event-info">
            <span class="date-badge" style="color: var(--accent);">05 NOV, 2026</span>
            <h2>Kadodi Cultural Festival</h2>
            <div class="prize-tag">🏆 Prize: 1,800,000/=</div>
            <span class="fee-tag" style="color: var(--primary);">🎟 Entry: FREE PASS</span>
            <div class="significance-box">Bamasaba Imbalu rhythms and street processions.</div>
            <a href="#booking-section" class="ticket-btn">Get Tickets</a>
        </div>
    </div>

    <div class="event-card" style="border-left-color: var(--primary);">
        <img src="images/mew.jpg" class="event-img" onerror="this.src='https://via.placeholder.com/320x240?text=Drumming+Battle'">
        <div class="event-info">
            <span class="date-badge" style="color: var(--primary);">20 DEC, 2026</span>
            <h2>National Drumming Battle</h2>
            <div class="prize-tag">🏆 Prize: 3,000,000/=</div>
            <span class="fee-tag">Registration Fee: 50,000/=</span>
            <div class="significance-box">A competition of speed and precision across all tribes.</div>
            <a href="#booking-section" class="ticket-btn" style="background: var(--primary);">Join Battle</a>
        </div>
    </div>

    <div class="event-card" style="border-left-color: var(--vocal);">
        <img src="images/vocals.jpg" class="event-img" onerror="this.src='https://via.placeholder.com/320x240?text=Vocal+Gala'">
        <div class="event-info">
            <span class="date-badge" style="color: var(--vocal);">15 JAN, 2027</span>
            <h2>Vocal Singing Gala</h2>
            <div class="prize-tag">🏆 Prize: 2,000,000/=</div>
            <span class="fee-tag">Registration Fee: 50,000/=</span>
            <div class="significance-box">Celebrating Ugandan folk melodies and choral beauty.</div>
            <a href="#booking-section" class="ticket-btn" style="background: var(--vocal);">Book Seat</a>
        </div>
    </div>

    <div id="booking-section">
        <h2 style="text-align: center;">Registration & Tickets</h2>
        <form style="display: grid; gap: 15px; max-width: 500px; margin: 0 auto;">
            <input type="text" placeholder="Name or Troupe Name" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
            <select style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                <option>Baganda Dancing (100,000/=)</option>
                <option>Kadodi Festival (Free)</option>
                <option>Drumming Battle (50,000/=)</option>
                <option>Vocal Gala (50,000/=)</option>
            </select>
            <input type="tel" placeholder="Phone Number" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
            <button type="button" onclick="alert('Thank you! Application Received.')" style="background: var(--gold); padding: 15px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">Submit Now</button>
        </form>
    </div>

</div>

<footer>
    <p>&copy; 2026 UG-Cultural Music Archive.</p>
</footer>

</body>
</html>