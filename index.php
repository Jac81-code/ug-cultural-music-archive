<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | UG-Cultural Music Archive</title>
    <style>
        :root {
            --primary: #2e7d32; --accent: #e67e22; --gold: #f4b400;
            --dark: #1a1a1a; --cream: #fdfaf0;
        }
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: var(--cream); color: #333; line-height: 1.6; scroll-behavior: smooth; }
        
        nav { 
            background: var(--dark); color: white; padding: 15px 8%; 
            display: flex; justify-content: space-between; align-items: center; 
            border-bottom: 4px solid var(--gold); position: sticky; top: 0; z-index: 1000; 
        }
        .nav-links { display: flex; align-items: center; }
        nav a { color: white; text-decoration: none; margin-left: 25px; font-weight: 600; font-size: 0.9rem; transition: 0.3s; }
        nav a:hover { color: var(--gold); }

        .hero-container { position: relative; height: 70vh; display: flex; align-items: center; justify-content: center; text-align: center; color: white; }
        .hero-bg-img { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -2; }
        .overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: -1; }
        .hero-content h1 { font-size: 3.5rem; margin: 0; }

        .btn { padding: 12px 25px; text-decoration: none; border-radius: 50px; font-weight: bold; display: inline-block; margin: 10px; transition: 0.3s; cursor: pointer; }
        .btn-primary { background: var(--accent); color: white; border: none; }
        .btn-primary:hover { background: #d35400; transform: translateY(-2px); }
        .btn-secondary { border: 2px solid white; color: white; }
        .btn-secondary:hover { background: white; color: black; }

        .counter-section { background: var(--dark); color: white; padding: 30px 8%; display: flex; justify-content: space-around; text-align: center; border-bottom: 4px solid var(--gold); }
        .counter-item h2 { color: var(--gold); margin: 0; font-size: 2.5rem; }
        .counter-item p { margin: 0; opacity: 0.7; font-size: 0.9rem; text-transform: uppercase; }

        .container { padding: 60px 8%; text-align: center; }
        .library-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-top: 30px; }
        
        .card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: left; transition: 0.4s; display: flex; flex-direction: column; }
        .card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.2); }
        .card img { width: 100%; height: 220px; object-fit: cover; }
        .card-body { padding: 20px; flex-grow: 1; }

        .mission-box { background: #e8f5e9; padding: 50px 8%; border-radius: 50px; margin: 20px 8%; border: 1px solid rgba(46, 125, 50, 0.1); }
        
        .tag { background: var(--primary); color: white; padding: 4px 12px; border-radius: 50px; display: inline-block; margin-bottom: 10px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; }

        .dark-section { background: #121921; color: white; padding: 60px 8%; margin-top: 40px; border-radius: 40px 40px 0 0; }
        .audio-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-top: 30px; }
        .audio-card { background: rgba(255,255,255,0.05); padding: 20px; border-radius: 12px; border-left: 4px solid var(--gold); text-align: left; }
        
        .cta-section { background: var(--primary); color: white; padding: 60px 8%; text-align: center; }

        footer { background: var(--dark); color: white; text-align: center; padding: 40px; }
    </style>
</head>
<body>

<nav>
    <div class="logo">
        <span style="color: var(--gold); font-size: 1.5rem; font-weight: 900;">UG</span>-CULTURAL MUSIC
    </div>
    <div class="nav-links">
        <a href="index.php" style="color: var(--gold);">Home</a>
        <a href="archive.php">Archive</a>
        <a href="events.php">Galas</a>
        <?php if(isset($_SESSION['artist_id'])): ?>
            <a href="dashboard.php" style="background: var(--gold); color: black; padding: 8px 15px; border-radius: 5px;">Dashboard</a>
        <?php else: ?>
            <a href="login.php" style="background: var(--gold); color: black; padding: 8px 15px; border-radius: 5px;">Portal</a>
        <?php endif; ?>
    </div>
</nav>

<header class="hero-container">
    <img src="images/maw.jpg" alt="Traditional Dance" class="hero-bg-img">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>UG-Cultural Music Preservation</h1>
        <p>Documenting Uganda's rhythmic heritage for future generations.</p>
        <a href="archive.php" class="btn btn-primary">Listen to Archive</a>
        <a href="events.php" class="btn btn-secondary">Upcoming Galas</a>
    </div>
</header>

<section class="counter-section">
    <div class="counter-item">
        <h2>56+</h2>
        <p>Tribes Documented</p>
    </div>
    <div class="counter-item">
        <h2>120+</h2>
        <p>Field Recordings</p>
    </div>
    <div class="counter-item">
        <h2>15+</h2>
        <p>Instrument Types</p>
    </div>
</section>

<div class="mission-box">
    <h2 style="color: var(--primary); margin-top: 0; text-align: center;">Our Preservation Mission</h2>
    <p style="max-width: 900px; margin: 0 auto; color: #444; font-size: 1.1rem; text-align: center;">
        As traditional melodies begin to fade, the <strong>UG-Cultural Music Archive</strong> 
        serves as a digital sanctuary. We are dedicated to recording, archiving, and celebrating 
        the diverse sounds of Uganda’s tribes—ensuring the rhythm of our ancestors lives on.
    </p>
</div>

<div class="container">
    <h2 style="font-size: 2.2rem; margin-bottom: 10px;">The Royal Orchestra</h2>
    <p style="color: #666;">Classification of traditional Ugandan instruments in the archive.</p>
    
    <div class="library-grid">
        <div class="card">
            <img src="images/engoma.jpg" alt="Engoma Drums">
            <div class="card-body">
                <span class="tag" style="background: #c0392b;">Membranophones</span>
                <h3>Engoma (Drum Set)</h3>
                <p>The heartbeat of ceremonies: <strong>Nankasa</strong> (lead), <strong>Empuunya</strong> (bass), and the <strong>Baksimba</strong> drum.</p>
            </div>
        </div>

        <div class="card">
            <img src="images/engalabi.jpg" alt="Engalabi Long Drum">
            <div class="card-body">
                <span class="tag" style="background: #c0392b;">Membranophones</span>
                <h3>Engalabi</h3>
                <p>A long, cylindrical drum essential for Baganda folk dances, played with the hands.</p>
            </div>
        </div>

        <div class="card">
            <img src="images/adungu.jpg" alt="Adungu Harp">
            <div class="card-body">
                <span class="tag" style="background: #2980b9;">Chordophones</span>
                <h3>Adungu (Harp)</h3>
                <p>A nine-stringed arched harp from the West Nile, capable of complex modern and traditional scales.</p>
            </div>
        </div>

        <div class="card">
            <img src="images/endingidi.jpg" alt="Tube Fiddle">
            <div class="card-body">
                <span class="tag" style="background: #2980b9;">Chordophones</span>
                <h3>Endingidi / Endongo</h3>
                <p>Featuring the one-stringed <strong>Tube Fiddle</strong> and the traditional <strong>Lyre</strong> (Endongo/Entongoli).</p>
            </div>
        </div>

        <div class="card">
            <img src="images/akogo.jpg" alt="Akogo Thumb Piano">
            <div class="card-body">
                <span class="tag" style="background: var(--accent);">Idiophones</span>
                <h3>Akogo / Kalimba</h3>
                <p>The melodic thumb piano of the Iteso and Acholi, creating bright, percussive melodies.</p>
            </div>
        </div>

        <div class="card">
            <img src="images/ensaasi.jpg" alt="Shakers and Bells">
            <div class="card-body">
                <span class="tag" style="background: var(--accent);">Idiophones</span>
                <h3>Ensaasi & Endege</h3>
                <p>Gourd shakers and ankle bells that provide the rhythmic texture for every Ugandan dancer.</p>
            </div>
        </div>
    </div>
</div>

<div class="dark-section">
    <h2 style="text-align: center; color: var(--gold); margin-top: 0;">Regional Masterpieces</h2>
    <p style="text-align: center; opacity: 0.8; margin-bottom: 40px;">Listen to authentic field recordings from across Uganda (30s Previews).</p>
    
    <div class="audio-grid">
        <div class="audio-card">
            <span style="color: var(--gold); font-size: 0.7rem; font-weight: bold;">CENTRAL - BUGANDA</span>
            <h3 style="margin: 10px 0;">Amagunjju (Royal Dance)</h3>
            <audio controls style="width: 100%;">
                <source src="music/amagunjju.mp3" type="audio/mpeg">
            </audio>
        </div>

        <div class="audio-card" style="border-left-color: #d90000;">
            <span style="color: #d90000; font-size: 0.7rem; font-weight: bold;">EASTERN - BAMASABA</span>
            <h3 style="margin: 10px 0;">Kadodi (Imbalu Procession)</h3>
            <audio controls style="width: 100%;">
                <source src="music/kadodi.mp3" type="audio/mpeg">
            </audio>
        </div>

        <div class="audio-card" style="border-left-color: #2980b9;">
            <span style="color: #2980b9; font-size: 0.7rem; font-weight: bold;">NORTHERN - ACHOLI</span>
            <h3 style="margin: 10px 0;">Larakaraka (Courtship)</h3>
            <audio controls style="width: 100%;">
                <source src="music/larakaraka.mp3" type="audio/mpeg">
            </audio>
        </div>

        <div class="audio-card" style="border-left-color: #27ae60;">
            <span style="color: #27ae60; font-size: 0.7rem; font-weight: bold;">WESTERN - ANKOLE</span>
            <h3 style="margin: 10px 0;">Ekitaguriro (Harvest)</h3>
            <audio controls style="width: 100%;">
                <source src="music/ekitaguriro.mp3" type="audio/mpeg">
            </audio>
        </div>
    </div>
</div>

<div class="cta-section">
    <h2>Contribute to the Archive</h2>
    <p>Are you a musician or dancer? Help us document your region's sound.</p>
    <a href="login.php" class="btn btn-secondary">Artist Registration</a>
</div>

<footer>
    <p>&copy; 2026 UG-Cultural Music | UICT Final Year Project By Group 53</p>
    <p style="font-size: 0.8rem; opacity: 0.7;">Supervised by Mr. Lubanga Enock | DITB Final Year Presentation</p>
</footer>

<script>
    const allAudios = document.querySelectorAll('audio');
    allAudios.forEach(audio => {
        audio.addEventListener('play', () => {
            allAudios.forEach(other => {
                if (other !== audio) { other.pause(); }
            });
        });

        audio.addEventListener('timeupdate', () => {
            if (audio.currentTime >= 30) {
                audio.pause();
                audio.currentTime = 0;
                alert("This is a 30-second preview. Full versions available in the Archive.");
            }
        });
    });
</script>

</body>
</html>