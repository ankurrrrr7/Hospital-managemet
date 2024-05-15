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

// Retrieve appointments from database
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
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
        <h2>Appointments</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Patient ID</th>
                <th>Doctor ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["patient_id"]."</td>
                            <td>".$row["doctor_id"]."</td>
                            <td>".$row["appointment_date"]."</td>
                            <td>".$row["appointment_time"]."</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No appointments found</td></tr>";
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
