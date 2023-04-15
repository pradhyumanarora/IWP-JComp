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
    echo "<script>alert('Updates added successfully.')</script>";
    header("Location: /IWP/pages/admin/updates.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trek Updates</title>
</head>

<body>
    <form method="post">
    <select name="treks" id="treks">
        <?php

        while ($row = mysqli_fetch_array($result)) {
            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        }
        ?>
    </select>
    <textarea name="updates" id="updates" cols="30" rows="10"></textarea>
    <input type="submit" name="submit" id="submit" value="Submit">
    </form> 
</body>

</html>