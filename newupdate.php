<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profile";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $coun = mysqli_real_escape_string($conn, $_POST['coun']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $twit = mysqli_real_escape_string($conn, $_POST['twit']);
    $face = mysqli_real_escape_string($conn, $_POST['face']);
    $google = mysqli_real_escape_string($conn, $_POST['google']);
    $link1 = mysqli_real_escape_string($conn, $_POST['link1']);
    $insta = mysqli_real_escape_string($conn, $_POST['insta']);

    // Insert data into database
    $sql = "INSERT INTO info (uname, name, email, phone, bio, dob, coun, website, twit, face, google, link1, insta)
            VALUES ('$uname', '$name', '$email', '$phone', '$bio', '$dob', '$coun', '$website', '$twit', '$face', '$google', '$link1', '$insta')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        die();
    }
}

// Close connection
$conn->close();
?>
