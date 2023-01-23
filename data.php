<?php
$serverName = "localhost";
$userName = "root";
$pass = "";
$dbName = "pcs_creations";


$name = $_POST['name'];
$email = $_POST['email'];
$service = $_POST['service'];
$message = $_POST['message'];

$conn = new mysqli($serverName, $userName, $pass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO details (name, email, service, message)
VALUES ('$name', '$email', '$service','$message')";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($name) || empty($email) || $service === "What Service Do You Want?" || empty($message)) {
        // echo '<script>alert("All Fields Are Required.")</script>';
        header("Location: index.html?message=All+Fields+Are+Required.");
    } else {
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
            header("Location: index.html?message=Data+inserted+successfully");
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            header("Location: index.html?message=There+is+a+trouble+to+insert+Data");
        }

        // mysqli_query($conn, $sql);
    }
}

mysqli_close($conn);

// header("Location: index.html?message=Data+inserted+successfully");
