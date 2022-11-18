<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbserverprogrammering";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM users";
$result = $conn->query($sql);


$login_success = false;
$full_name = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (
            $row["username"] == $_POST["username"] &&
            $row["password"] == $_POST["password"]
        ) {
            $login_success = true;
            echo "Hejsan ", $_POST["username"];
        } else {
            echo "Användare existerar inte";
        }
    }
} else {
    echo "Databas inkomplett";
}
$conn->close();

if ($login_success) {
    session_start();
    $_SESSION["username"] = $_POST["username"];
}
