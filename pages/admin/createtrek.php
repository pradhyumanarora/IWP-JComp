<?php
if ($_SERVER["REQUEST_METHOD"] = "POST") {

    include '../../dbconnect.php';

    if (isset($_POST['trekname']) && ($_POST['trekdate']) && ($_POST['trektime']) && isset($_POST['treklocation']) && isset($_POST['trekdescription']) && isset($_POST['trekdifficulty']) && isset($_POST['trekduration']) && isset($_POST['trekprice']) && isset($_POST['trekspots']) && isset($_POST['trekorganizer'])) {
        $trekname = $_POST['trekname'];
        $trekdate = $_POST['trekdate'];
        $trektime = $_POST['trektime'];
        $treklocation = $_POST['treklocation'];
        $trekdescription = $_POST['trekdescription'];
        $trekdifficulty = $_POST['trekdifficulty'];
        $trekduration = $_POST['trekduration'];
        $trekprice = $_POST['trekprice'];
        $trekspots = $_POST['trekspots'];
        $trekorganizer = $_POST['trekorganizer'];


        $sql = "Select * from treks where name='$trekname';";
        $result = mysqli_query($conn, $sql);
        // $num = mysqli_num_rows($result);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        } else if (mysqli_num_rows($result)== 0) {
            $sql = "INSERT INTO `treks` (`name`, `date`, `time`, `location`, `description`, `difficulty`, `duration`, `price`, `spots`, `organizer`, `dt`) VALUES ('$trekname', '$trekdate', '$trektime', '$treklocation', '$trekdescription', '$trekdifficulty', '$trekduration', '$trekprice', '$trekspots', '$trekorganizer', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            echo "<script>alert('Trek Created successfully.');window.location.href='./add_admin.php'</script>";
        }
        else {
            echo "<script>alert('Trek already exists')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Nature Nomads | Trek Event Creation Form</title>
    <link rel="stylesheet" type="text/css" href="../../styles/createtrek.css">
</head>

<body>
    <!-- action="./trek_event_create.php" -->
    <nav>
        <a href="../explore.php">
            Home
        </a>
        <a href="./add_admin.php">
            Add Admin
        </a>
        <a href="./trek_updates.php">
            Updates
        </a>

        <a href='../logout.php'>Logout</a>
    </nav>

    <h1>Enter Trek Details:</h1>
    <form name="trekform" method="post">
        <label for="trekname">Trek Name:</label>
        <input type="text" id="trekname" name="trekname" required><br>

        <label for="trekdate">Trek Date:</label>
        <input type="date" id="trekdate" name="trekdate" required><br>

        <label for="trektime">Trek Time:</label>
        <input type="time" id="trektime" name="trektime" required><br>

        <label for="treklocation">Trek Location:</label>
        <input type="text" id="treklocation" name="treklocation" required><br>

        <label for="trekdescription">Trek Description:</label>
        <textarea id="trekdescription" name="trekdescription" required></textarea><br>

        <label for="trekdifficulty">Trek Difficulty:</label>
        <select id="trekdifficulty" name="trekdifficulty" required>
            <option value="">Select Difficulty</option>
            <option value="Easy">Easy</option>
            <option value="Moderate">Moderate</option>
            <option value="Difficult">Difficult</option>
        </select><br>

        <label for="trekduration">Trek Duration:</label>
        <input type="number" id="trekduration" name="trekduration" min="1" max="30" required><br>

        <label for="trekprice">Trek Price:</label>
        <input type="number" id="trekprice" name="trekprice" min="1" required><br>

        <label for="trekspots">Number of Spots:</label>
        <input type="number" id="trekspots" name="trekspots" min="1" required><br>

        <label for="trekimage">Trek Image:</label>
        <input type="file" id="trekimage" name="trekimage" accept="image/*"><br>

        <label for="trekorganizer">Trek Organizer:</label>
        <input type="text" id="trekorganizer" name="trekorganizer" required><br>

        <input type="submit" value="CreateTrek" onclick="validateForm()">
    </form>

    <script src="../../Script/trek_event_create_script.js"></script>
</body>

</html>