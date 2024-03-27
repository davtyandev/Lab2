<?php
include "users.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT users.*, passports.country, passports.by_whom, passports.series, passports.date FROM users LEFT JOIN passports ON users.PassportID = passports.id WHERE users.id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Փոփոխել բաժանորդի տվյալները</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 20px;
                }

                form {
                    margin-bottom: 20px;
                }

                input[type=text], input[type=date] {
                    width: 100%;
                    padding: 8px;
                    margin: 5px 0;
                    box-sizing: border-box;
                }

                input[type=submit] {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    cursor: pointer;
                }

                input[type=submit]:hover {
                    background-color: #45a049;
                }
            </style>
        </head>
        <body>
        <h2>Update User</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Անուն</label>
            <input type="text" name="name" value="<?php echo $row['Name']; ?>"><br><br>
            <label for="surname">Ազգանուն</label>
            <input type="text" name="surname" value="<?php echo $row['Surname']; ?>"><br><br>
            <label for="residence">Բնակավայր</label>
            <input type="text" name="residence" value="<?php echo $row['Residence']; ?>"><br><br>
            <label for="street">Փողոց</label>
            <input type="text" name="street" value="<?php echo $row['Street']; ?>"><br><br>
            <label for="house">Տուն</label>
            <input type="text" name="house" value="<?php echo $row['House']; ?>"><br><br>
            <label for="apartment">Բնակարան</label>
            <input type="text" name="apartment" value="<?php echo $row['Apartment']; ?>"><br><br>
            <label for="phone">Հեռախոսահամար</label>
            <input type="text" name="phone" value="<?php echo $row['Phone']; ?>"><br><br>
            <label for="country">Երկիր</label>
            <input type="text" name="country" value="<?php echo $row['country']; ?>"><br><br>
            <label for="by_whom">Ում կողմից</label>
            <input type="text" name="by_whom" value="<?php echo $row['by_whom']; ?>"><br><br>
            <label for="series">Սերիա, համար</label>
            <input type="text" name="series" value="<?php echo $row['series']; ?>"><br><br>
            <label for="date">Ամսաթիվ</label>
            <input type="text" name="date" value="<?php echo $row['date']; ?>"><br><br>
            <input type="submit" value="Update">
        </form>
        </body>
        </html>
        <?php
    } else {
        echo "User not found!";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
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

    $updateUserQuery = "UPDATE users SET Name='$name', Surname='$surname', Residence='$residence', Street='$street', House='$house', Apartment='$apartment', Phone='$phone' WHERE id='$id'";
    $updatePassportQuery = "UPDATE passports SET country='$country', by_whom='$by_whom', series='$series', date='$date' WHERE id=(SELECT PassportID FROM users WHERE id='$id')";

    $updateUserResult = mysqli_query($conn, $updateUserQuery);
    $updatePassportResult = mysqli_query($conn, $updatePassportQuery);

    if ($updateUserResult && $updatePassportResult) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: ". mysqli_error($conn);
    }
}
?>
