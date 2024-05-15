<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve doctors from database
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1><a href="index.php"><i>Hospital Management System</i></a></h1>
        <nav>
            <ul>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="doctors.php">Doctors</a></li>
                <li><a href="appointments.php">Appointments</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Doctors</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row["specialization"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["phone"]."</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No doctors found</td></tr>";
            }
            ?>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Hospital Management System</p>
    </footer>

<?php
// Close database connection
$conn->close();
?>
</body>
</html>
