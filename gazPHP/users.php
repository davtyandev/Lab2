<?php
$conn = mysqli_connect("localhost", "root", "", "gaz");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $residence = $_POST['residence'];
    $street = $_POST['street'];
    $house = $_POST['house'];
    $apartment = $_POST['apartment'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $by_whom = $_POST['by_whom'];
    $series = $_POST['series'];
    $date = $_POST['date'];

    // Insert passport info first
    $query = "INSERT INTO passports (country, by_whom, series, date) VALUES ('$country', '$by_whom', '$series', '$date')";
    mysqli_query($conn, $query);

    $passport_id = mysqli_insert_id($conn);

    // Insert user info
    $query = "INSERT INTO users (Name, Surname, Residence, Street, House, Apartment, Phone, PassportID) VALUES ('$name', '$surname', '$residence', '$street', '$house', '$apartment', '$phone', '$passport_id')";
    mysqli_query($conn, $query);

    header("Location: index.php"); // Redirect after insertion
}
?>
