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
$username = $_SESSION['username'];

if ($username == null) {
    echo "<script>alert('Please Login First');document.location='/IWP/index.php'</script>";
}

$query = "SELECT * FROM users_treks JOIN treks ON users_treks.trekname = treks.name WHERE username='$username';";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "error in query";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/mytrek.css">
    <style>
        body {
            background: linear-gradient(to right, #014945, #00a762);
        }
    </style>
</head>

<body>

    <nav>
        <a href="./explore.php">
            Home
        </a>
        <a href="./updates.php">
            Trek Updates
        </a>
        <a href='./logout.php'>Logout</a>
    </nav>
    <div id="table">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <a href="./reg_trekdetails.php?name=' . $row["name"] . '">
            <div class="card">
            <div class="content">
                <div class="front">
                    <div class="head">' . $row["trekname"] . '</div>
                    <div class="date">' . $row["date"] . '</div>
                    <div class="time">' . $row["time"] . '</div>
                </div>
                <div class="back">' . $row["location"] . '</div>
            </div>
        </div></a>';
        } ?>
    </div>
    <!-- <a href='./logout.php'>logout</a> -->
</body>

</html>