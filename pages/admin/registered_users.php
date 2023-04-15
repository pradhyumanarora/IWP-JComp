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

$query = "SELECT * FROM users_treks JOIN users ON users_treks.username = users.username WHERE trekname='$_GET[name]';";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "error in query";
    die();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>User Registration List</title>
    <link rel="stylesheet" type="text/css" href="../../styles/registered_users.css">
</head>

<body>
<nav>
            <a href="../explore.php" id="mytreks">
                Home
            </a>
            <a href="./admin/createtrek.php" id="mytreks">
                Create Trek
            </a>
            <a href="../logout.php">Logout</a>
        </nav>
    <div class="container">
        
        <h1>User Registration List - <?php echo $_GET['name']?></h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                </tr>

            </thead>
            <tbody id="user-list">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                ?>
                <!-- User details will be added by JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- <script type="text/javascript" src="../../Script/registered_users_script.js"></script> -->
</body>

</html>