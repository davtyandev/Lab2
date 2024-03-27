<?php
$conn = mysqli_connect("localhost", "root", "", "gaz");

$query = "SELECT users.*, passports.country, passports.by_whom, passports.series, passports.date FROM users LEFT JOIN passports ON users.PassportID = passports.id";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    // Display user and passport information
}
?>
