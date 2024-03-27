<?php
$conn = mysqli_connect("localhost", "root", "", "gaz");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, delete the user record
    $query = "DELETE FROM users WHERE id='$id'";
    mysqli_query($conn, $query);

    // Now, delete the passport record
    // Since the passport is a 1:1 relationship, we can delete directly
    // If passport was related to multiple users, additional checks would be needed
    $query = "DELETE FROM passports WHERE id='$id'";
    mysqli_query($conn, $query);

    header("Location: index.php"); // Redirect after deletion
}
?>
