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

$query = "SELECT * FROM trek_updates JOIN users_treks ON trek_updates.trekname = users_treks.trekname WHERE username='$_SESSION[username]';";
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
    <link rel="stylesheet" href="../styles/updates.css">
    <title>Updates</title>
</head>

<body>
    <h1>Trek Updates</h1>
    <?php
    while ($row = mysqli_fetch_array($result)) {

        echo "<div class='trek-updates'>
                <div class='trek-update'>
                    <h3 class='trek-name'>" . $row['trekname'] . "</h3>
                    <p class='message'>" . $row['message'] . "</p>
                    <p class='post-time'>" . $row['post_time'] . "</p>
                </div>
            </div>";
    }
    ?>
</body>

</html>