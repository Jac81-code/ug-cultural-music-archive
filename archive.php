<?php
session_start();
include 'db_connect.php'; // Ensure this file has your correct XAMPP database name

// 1. GET SEARCH INPUTS
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$region_filter = isset($_GET['region']) ? mysqli_real_escape_string($conn, $_GET['region']) : '';

// 2. BUILD THE FILTERED QUERY
$sql = "SELECT * FROM artists WHERE (fullname LIKE '%$search%' OR instrument LIKE '%$search%')";
if ($region_filter != '') {
    $sql .= " AND region = '$region_filter'";
}
$sql .= " ORDER BY id DESC";
$result = $conn->query($sql);

// 3. STATS LOGIC
$total_musicians = 0;
$regions_count = 0;
if ($conn) {
    $total_res = $conn->query("SELECT COUNT(*) as total FROM artists");
    $total_musicians = ($total_res) ? $total_res->fetch_assoc()['total'] : 0;
    $reg_res = $conn->query("SELECT COUNT(DISTINCT region) as total FROM artists");
    $regions_count = ($reg_res) ? $reg_res->fetch_assoc()['total'] : 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library | UG-Cultural Music Archive</title>
    <style>
        :root { --primary: #2e7d32; --accent: #e67e22; --gold: #f4b400; --dark: #1a1a1a; --parchment: #f4f1ea; }
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: #f4f1ea; background-image: url("https://www.transparenttextures.com/patterns/cream-paper.png"); color: #333; }
        nav { background: var(--dark); color: white; padding: 15px 5%; display: flex; justify-content: space-between; align-items: center; border-bottom: 4px solid var(--gold); position: sticky; top: 0; z-index: 1000; }
        nav a { color: white; text-decoration: none; margin-left: 20px; font-weight: bold; }
        .container { max-width: 1200px; margin: 0 auto; padding: 40px 20px; display: grid; grid-template-columns: 3fr 1fr; gap: 30px; }
        .archive-intro { text-align: center; grid-column: 1 / -1; margin-bottom: 40px; }
        .stats-dashboard { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; grid-column: 1 / -1; margin-bottom: 40px; }
        .stat-card { background: white; padding: 20px; border-radius: 12px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-top: 4px solid var(--primary); }
        .library-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; }
        .library-card { background: #fff; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); overflow: hidden; position: relative; border: 1px solid #eee; }
        .region-tag { position: absolute; top: 12px; left: 12px; background: var(--gold); color: black; padding: 5px 12px; border-radius: 6px; font-size: 0.75rem; font-weight: 900; z-index: 5; }
        .card-img { height: 220px; width: 100%; object-fit: cover; background: #ddd; }
        .card-content { padding: 20px; }
        .btn-view { width: 100%; padding: 10px; background: var(--primary); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .sidebar { background: white; padding: 25px; border-radius: 15px; height: fit-content; position: sticky; top: 100px; }
        footer { background: var(--dark); color: white; text-align: center; padding: 40px; margin-top: 60px; }
    </style>
</head>
<body>

<nav>
    <strong>UG-CULTURAL MUSIC ARCHIVE</strong>
    <div>
        <a href="index.php">Home</a>
        <a href="archive.php" style="color:var(--gold);">Archive</a>
        <a href="login.php">Portal Login</a>
    </div>
</nav>

<div class="container">
    <div class="archive-intro">
        <h1>Digital Cultural Library</h1>
        <p>A systematic registry for tracking and preserving Uganda's musical heritage.</p>
    </div>

    <div class="search-box" style="background: white; padding: 25px; border-radius: 12px; margin-bottom: 30px; grid-column: 1 / -1; border-left: 5px solid var(--primary);">
        <form method="GET" action="archive.php" style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 15px;">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search by Artist or Instrument..." style="padding: 12px; border: 1px solid #ddd; border-radius: 6px;">
            <select name="region" style="padding: 12px; border: 1px solid #ddd; border-radius: 6px;">
                <option value="">All Regions</option>
                <option value="Central" <?php if($region_filter == 'Central') echo 'selected'; ?>>Central</option>
                <option value="Northern" <?php if($region_filter == 'Northern') echo 'selected'; ?>>Northern</option>
                <option value="Western" <?php if($region_filter == 'Western') echo 'selected'; ?>>Western</option>
                <option value="Eastern" <?php if($region_filter == 'Eastern') echo 'selected'; ?>>Eastern</option>
            </select>
            <button type="submit" style="background: var(--primary); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">🔍 Search Archive</button>
        </form>
    </div>

    <div class="stats-dashboard">
        <div class="stat-card"><h2><?php echo $total_musicians; ?></h2><p>Artists Registered</p></div>
        <div class="stat-card" style="border-top-color: var(--accent);"><h2><?php echo $regions_count; ?></h2><p>Regions Covered</p></div>
        <div class="stat-card" style="border-top-color: var(--gold);"><h2>56</h2><p>Tribes Targeted</p></div>
    </div>

    <div class="main-content">
        <div class="library-grid">
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="library-card">
                        <div class="region-tag"><?php echo strtoupper($row['region']); ?></div>
                        
                        <?php 
                            $img_name = "images/" . $row['id'] . ".jpg"; 
                            // If the image doesn't exist, it uses background.jpg as fallback
                            if (!file_exists($img_name)) { $img_name = "images/background.jpg"; }
                        ?>
                        <img src="<?php echo $img_name; ?>" class="card-img" alt="<?php echo $row['fullname']; ?>">
                        
                        <div class="card-content">
                            <h3 style="margin: 0; color: var(--dark);"><?php echo $row['fullname']; ?></h3>
                            <p style="font-size: 0.85rem; color: #666; margin: 8px 0;">
                                Tribe: <strong><?php echo $row['tribe']; ?></strong> | 
                                Category: <strong><?php echo $row['category']; ?></strong>
                            </p>
                            <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">
                            <p style="font-size: 0.9rem; margin-bottom: 20px;">
                                <span style="color: #888;">Main Instrument:</span><br>
                                <strong><?php echo $row['instrument']; ?></strong>
                            </p>
                            <a href="profile.php?id=<?php echo $row['id']; ?>"><button class="btn-view">View Full Profile</button></a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div style='grid-column: 1/-1; text-align: center; padding: 50px; background: white; border-radius: 12px; border: 2px dashed #ccc;'>
                        <h2>🔍 No Results Found</h2>
                        <p>No matches for '<strong>" . htmlspecialchars($search) . "</strong>'.</p>
                        <a href='archive.php' style='color: var(--primary); font-weight: bold;'>Refresh Archive</a>
                      </div>";
            }
            ?>
        </div>
    </div>

    <aside class="sidebar">
        <h3 style="color: var(--primary); margin-top: 0;">Archive Insights</h3>
        <div class="instrument-spotlight">
            <h4 style="margin-bottom: 8px;">Latest Update</h4>
            <p style="font-size: 0.85rem; color: #555;">Real-time data from the <strong>UG-Cultural Music Archive</strong> database.</p>
        </div>
        <button onclick="window.print()" style="width: 100%; padding: 12px; background: var(--dark); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">📄 Export PDF Report</button>
    </aside>
</div>

<footer>
    <p>&copy; 2026 UICT DITB Final Project | Supervised by Mr. Lubanga Enock</p>
</footer>

</body>
</html>