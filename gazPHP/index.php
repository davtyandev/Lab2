<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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

        .edit-btn, .delete-btn {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
        }

        .edit-btn:hover, .delete-btn:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Ավելացնել բաժանորդ</h2>
<form action="users.php" method="POST">
    <label for="name">Անուն</label>
    <input type="text" name="name" required>
    <label for="name">Ազգանուն</label>
    <input type="text" name="surname" required>
    <label for="name">Բնակավայր</label>
    <input type="text" name="residence" required>
    <label for="name">Փողոց</label>
    <input type="text" name="street" required>
    <label for="name">Տուն</label>
    <input type="text" name="house" required>
    <label for="name">Բնակարան</label>
    <input type="text" name="apartment" required>
    <label for="name">Հեռախոսահամար</label>
    <input type="text" name="phone" required>
    <h2>Անձնագրի տվյալներ</h2>
    <label for="name">Երկիր</label>
    <input type="text" name="country" required>
    <label for="name">Ում կողմից</label>
    <input type="text" name="by_who" required>
    <label for="name">Սերիա, համար</label>
    <input type="text" name="series" required>
    <label for="name">Ամսաթիվ</label>
    <input type="text" name="date" required>
    <input type="submit" value="Գրանցել">
</form>
<h2>Բաժանորդներ</h2>
<table>
    <tr>
        <th>Անուն</th>
        <th>Ազգանուն</th>
        <th>Բնակավայր</th>
        <th>Փողոց</th>
        <th>Տուն</th>
        <th>Բնակարան</th>
        <th>Հեռախոսահամար</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "gaz");

    $query = "SELECT users.*, passports.country, passports.by_whom, passports.series, passports.date FROM users LEFT JOIN passports ON users.PassportID = passports.id";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Surname']."</td>";
        echo "<td>".$row['Residence']."</td>";
        echo "<td>".$row['Street']."</td>";
        echo "<td>".$row['House']."</td>";
        echo "<td>".$row['Apartment']."</td>";
        echo "<td>".$row['Phone']."</td>";
        echo "<td><a class='edit-btn' href='update.php?id=".$row['id']."'>Փոփոխել</a> | <a class='delete-btn' href='delete.php?id=".$row['id']."'>Ջնջել</a></td>";
        echo "</tr>";
    }

    ?>
</table>

</body>
</html>
