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
    $sql1 = "DELETE FROM `users_treks` WHERE `trekname` = '$trek'";
    $res1 = mysqli_query($conn, $sql1);
    if (!$res1) {
        echo "<script>alert('error in query')</script>";
        die();
    }
    $sql2 = "DELETE FROM `treks` WHERE `name` = '$trek'";
    $res2 = mysqli_query($conn, $sql2);
    if (!$res2) {
        echo "<script>alert('error in query');window.location.reload();</script>";
        die();
    }
    echo "<script>alert('Trek Deleted Successfully.');window.location.href='./delete_trek.php'</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Delete Treks</title>
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
        <h1>Delete Treks</h1>
        <form method="post">
            <label for="subject">Select trek to delete:</label>
            <select name="treks" id="treks">
                <option disabled selected value> -- Select Trek -- </option>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="submit" id="submit" value="Delete">
        </form>
    </div>
    <!-- 
    <script type="text/javascript" src="../../Script/trek_updates_script.js"></script> -->
</body>

</html>