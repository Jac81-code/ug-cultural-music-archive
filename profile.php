<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id'])) {
    $artist_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM artists WHERE id = '$artist_id'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $artist = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }
} else {
    header("Location: archive.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($artist['fullname']); ?> | UG-Archive</title>
    <style>
        :root {
            --primary: #2e7d32; 
            --gold: #f4b400; 
            --dark: #121921; 
            --card-bg: #1c2630;
            --text-light: #fdfaf0;
        }

        body { 
            font-family: 'Segoe UI', sans-serif; 
            background-color: var(--dark); 
            color: var(--text-light); 
            margin: 0; 
            padding: 0; 
        }

        /* UPDATED DYNAMIC HEADER */
        .profile-header {
            background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), 
                        url('images/<?php echo $artist['id']; ?>_header.jpg'), 
                        url('images/background.jpg'); 
            background-size: cover;
            background-position: center;
            padding: 100px 8%; 
            text-align: center;
            border-bottom: 5px solid var(--gold);
        }

        .container { max-width: 1000px; margin: -50px auto 50px auto; padding: 0 20px; }

        .profile-card {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .back-btn {
            color: var(--gold);
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
        }

        .grid-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
            background: rgba(255,255,255,0.05);
            padding: 20px;
            border-radius: 10px;
        }

        .info-item label { color: var(--gold); font-size: 0.8rem; font-weight: bold; text-transform: uppercase; }
        .info-item div { font-size: 1.2rem; margin-top: 5px; }

        .bio-section { margin-top: 40px; line-height: 1.8; color: #ccc; }

        .artist-img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 15px;
            border: 1px solid rgba(244, 180, 0, 0.3);
            margin-top: 20px;
        }

        footer { text-align: center; padding: 40px; font-size: 0.8rem; opacity: 0.6; }
    </style>
</head>
<body>

<div class="profile-header">
    <h1 style="font-size: 4rem; margin: 0; text-shadow: 2px 2px 15px rgba(0,0,0,0.9);"><?php echo htmlspecialchars($artist['fullname']); ?></h1>
    <p style="color: var(--gold); letter-spacing: 4px; font-weight: bold; text-transform: uppercase;">Cultural Heritage Representative</p>
</div>

<div class="container">
    <div class="profile-card">
        <a href="archive.php" class="back-btn">← Return to Digital Library</a>
        
        <div class="grid-info">
            <div class="info-item">
                <label>Region</label>
                <div><?php echo htmlspecialchars($artist['region']); ?></div>
            </div>
            <div class="info-item">
                <label>Tribe / Community</label>
                <div><?php echo htmlspecialchars($artist['tribe']); ?></div>
            </div>
            <div class="info-item">
                <label>Primary Instrument</label>
                <div><?php echo htmlspecialchars($artist['instrument']); ?></div>
            </div>
            <div class="info-item">
                <label>Art Form</label>
                <div><?php echo htmlspecialchars($artist['category']); ?></div>
            </div>
        </div>

        <div class="bio-section">
            <h2 style="color: white; border-left: 4px solid var(--gold); padding-left: 15px;">Historical Significance</h2>
            <p>
                <?php 
                    if (!empty($artist['History'])) {
                        echo nl2br(htmlspecialchars($artist['History'])); 
                    } else {
                        echo "Information about the historical significance of the " . htmlspecialchars($artist['fullname']) . " is currently being updated.";
                    }
                ?>
            </p>
        </div>

        <div class="media-section" style="margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 30px;">
            <h2 style="color: white; border-left: 4px solid var(--gold); padding-left: 15px; margin-bottom: 20px;">Archived Visual</h2>
            
            <?php 
                // Look for a specific detail image
                $detailPath = "images/" . $artist['id'] . "_detail.jpg";
                
                if (file_exists($detailPath)) {
                    echo '<img src="'.$detailPath.'" alt="Detailed view" class="artist-img">';
                } else {
                    // Professional Placeholder Box
                    echo '
                    <div style="background: rgba(0,0,0,0.4); height: 300px; border-radius: 15px; border: 2px dashed rgba(244,180,0,0.3); display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 20px;">
                        <div style="font-size: 3rem; margin-bottom: 15px; opacity: 0.5;">🎬</div>
                        <h3 style="margin: 0; color: var(--gold);">Media Registry Pending</h3>
                        <p style="color: #888; max-width: 450px; font-size: 0.9rem; margin-top: 10px; line-height: 1.5;">
                            Digital reconstruction or field video recordings for <strong>'.htmlspecialchars($artist['fullname']).'</strong> are currently being processed for the final project archive.
                        </p>
                    </div>';
                }
            ?>
        </div>
    </div>
</div>

<footer>
    &copy; 2026 UICT Final Year Project by Group 53 | Cultural Music Documentation System
</footer>

</body>
</html>