<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
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
        <p>Welcome to the Hospital Management System. Use the navigation above to manage patients, doctors, and appointments.</p>
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
