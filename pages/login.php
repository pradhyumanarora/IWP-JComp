<?php

session_start();

if (isset($_SESSION['username'])&& $_SESSION['admin']==true) {
  header("Location: admin/createtrek.php");
  exit;
}
else if (isset($_SESSION['username']) && $_SESSION['admin']==false) {
  header("Location: explore.php");
  exit;
}

if (isset($_POST['login'])) {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "trekwebsite";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $status = $_POST['status'];
  if($status == 'admin'){
    $query = "SELECT * FROM admins WHERE username='$username'";
  }
  else{
    $query = "SELECT * FROM users WHERE username='$username'";
  }
  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

  if (mysqli_num_rows($result) == 1) {
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $username;
      if ($status == 'admin') {
        $_SESSION['admin'] = true;
        header("Location: explore.php");
      }
      else {
        $_SESSION['admin'] = false;
        header("Location: explore.php");
      }
      exit;
    } else {
      echo "Invalid username or password.";
    }
    mysqli_close($conn);
  }else{
    echo "<script>alert('Invalid username or password.')</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Log In</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
  <link rel="stylesheet" href="../styles/login_form_style.css">

</head>

<body>

  <section class='login' id='login'>
    <div class='head'>
      <h1 class='company'>Nature Nomads</h1>
    </div>
    <p class='msg'>Welcome back</p>
    <div class='form'>
      <form action="login.php" method="post">
        <input type="text" placeholder='Username' class='text' id='username' name='username' required><br>
        <input type="password" placeholder='••••••••••••••' class='password' name='password'><br>
        <div class ="radio-buttons">
          <input type="radio" name='status' value='admin' id="admin">
          <label for="admin">Admin</label>
          <input type="radio" name='status' value='user' id="user">
          <label for="user">User</label><br>
        </div>
        
        <input type="submit" name='login' value='Login' class="btn-login" id="do-login">
        <a href="#" class='forgot'>Forgot?</a>
      </form>
      <p class='signup'>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
  </section>

</body>

</html>