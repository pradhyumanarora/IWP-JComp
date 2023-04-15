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

if($username==null){
  echo "<script>alert('Please Login First');document.location='/IWP/index.php'</script>";
}

$query = "SELECT * FROM treks;";
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
  <title>Explore</title>
  <link rel="stylesheet" href="../styles/explore.css">
  <!-- <script src="../Script/index.js" defer></script> -->
  <style>
    body {
      background: linear-gradient(to right, #014945, #00a762);
    }
  </style>
</head>

<body>
  <?php
  if($_SESSION['admin']==false){
  echo '<nav>
    <a href="./mytrek.php" id="mytreks">
      My Treks
    </a>
    <a href="./updates.php" id="mytreks">
      Updates
    </a>
  </nav>';}
  else{
    echo '<nav>
    <a href="./admin/createtrek.php" id="mytreks">
      Create Trek
    </a>
    <a href="./admin/add_admin.php" id="mytreks">
      Add Admin
    </a>
    <a href="./admin/trek_updates.php" id="mytreks">
      Updates 
    </a>
    <a href="./admin/delete_trek.php" id="mytreks">
      Delete Trek 
    </a>
        <a href="./logout.php">Logout</a>
    </nav>';
  }
  ?>
  <div id="table">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      if($_SESSION['admin']==false){
      echo '<a href="./trekdetails.php?name=' . $row["name"] . '">
        <div class="card">
            <div class="content">
                <div class="front">
                    <div class="head">' . $row["name"] . '</div>
                    <div class="date">' . $row["date"] . '</div>
                    <div class="time">' . $row["time"] . '</div>
                </div>
                <div class="back">' . $row["location"] . '</div>
            </div>
        </div>
        </a>';
      }
      else{
        echo '<a href="./admin/registered_users.php?name=' . $row["name"] . '">
        <div class="card">
            <div class="content">
                <div class="front">
                    <div class="head">' . $row["name"] . '</div>
                    <div class="date">' . $row["date"] . '</div>
                    <div class="time">' . $row["time"] . '</div>
                </div>
                <div class="back">' . $row["location"] . '</div>
            </div>
        </div>
        </a>';
      }
    } ?>
  </div>
</body>

</html>