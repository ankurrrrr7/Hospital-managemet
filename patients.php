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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    // Insert data into database
    $sql = "INSERT INTO patients (name, email, dob, phone) VALUES ('$name', '$email', '$dob', '$phone')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
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

    <center><h2>Patient Registration</h2></center>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" required><br><br>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" required><br><br>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Hospital Management System</p>
    </footer>

    <?php
    // Close database connection
    $conn->close();
    ?>
</body>
</html>
