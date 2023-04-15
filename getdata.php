<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "trekwebsite";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM treks";
  $result = $conn->query($sql);
  // Convert the results to JSON
  $rows = array();
  while ($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }
  echo json_encode($rows);
  ?>