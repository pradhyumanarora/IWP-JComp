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
$query = "SELECT * FROM treks;";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "error in query";
    die();
}

if (isset($_POST['submit'])) {
    $trek = $_POST['treks'];
    $updates = $_POST['updates'];
    $query = "INSERT INTO `trek_updates` (`trekname`,`message`,`post_time`) VALUES ('$trek','$updates',CURRENT_TIMESTAMP);";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "error in query";
        die();
    }
    echo "<script>alert('Updates added successfully.');window.location.href='./trek_updates.php'</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Send Trek Updates</title>
    <link rel="stylesheet" type="text/css" href="../../styles/trek_updates.css">
</head>

<body>
<nav>
    <a href="../explore.php" id="mytreks">
      Home
    </a>
    <a href="./createtrek.php" id="mytreks">
      Create Trek
    </a>
    <a href="./add_admin.php" id="mytreks">
      Add Admin
    </a>
        <a href="../logout.php">Logout</a>
    </nav>
    <div class="container">
        <h1>Send Trek Updates</h1>
        <form method="post">
            <label for="subject">Trek:</label>
            <select name="treks" id="treks">
                <option disabled selected value> -- Select Trek -- </option>
                <?php

                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>
            <label for="message">Message:</label>
            <textarea id="message" name="updates" required></textarea>

            <input type="submit" name="submit" id="submit" value="Submit">
        </form>
    </div>

    <!-- <script type="text/javascript" src="../../Script/trek_updates_script.js"></script> -->
</body>

</html>