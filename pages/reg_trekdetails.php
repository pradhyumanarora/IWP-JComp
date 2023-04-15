<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trekwebsite";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `treks` WHERE `name` = '$_GET[name]'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Nature Nomads Trek Details</title>
    <link rel="stylesheet" href="../styles/trek_details.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="./explore.php">Nature Nomads</a>
        </div>
        <nav>
            <ul>
                <li><a href="./explore.php">Home</a></li>
                <li><a href="./mytrek.php">Registered Treks</a></li>
                <li><a href="./profile.php">Profile</a></li>
            </ul>
        </nav>
    </header>

    <?php
        echo'<main>
        
        <section class="banner">
            <h1>' . $row["name"] . '</h1>
        </section>

        <section class="details">
            <h2>Trek Details</h2>
            <div class="grid">
                <div class="grid-item">
                    <h3>Location</h3>
                    <p>' . $row["location"] . '</p>
                </div>
                <div class="grid-item">
                    <h3>Reporting Time</h3>
                    <p>' . $row["time"] . '</p>
                </div>
                <div class="grid-item">
                    <h3>Number of Days</h3>
                    <p>' . $row["duration"] . ' days</p>
                </div>
                <div class="grid-item">
                    <h3>Date</h3>
                    <p>' . $row["date"] . '</p>
                </div>
                <div class="grid-item">
                    <h3>Date</h3>
                    <p>' . $row["difficulty"] . '</p>
                </div>
                <div class="grid-item">
                    <h3>Cost</h3>
                    <p>' . $row["price"] . '</p>
                </div>
                <div class="grid-item">
                    <h3>Number of Spots</h3>
                    <p>' . $row["spots"] . '</p>
                </div>
                <div class="grid-item">
                    <h3>Organizer</h3>
                    <p>' . $row["organizer"] . '</p>
                </div>
            </div>
            
            <div class="description">
                <h3>Description</h3>
                <p>' . $row["description"] . '</p>
            </div>
        </section>
    </main>
    '?>
    <footer>
        <p>&copy; 2023 Nature Nomads. All rights reserved.</p>
    </footer>

</body>

</html>