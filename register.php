<?php
include 'db/mysql_connection.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure hash
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];

// Insert user
$sql = "INSERT INTO users (username, password, age, dob, contact) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiss", $username, $password, $age, $dob, $contact);

if ($stmt->execute()) {
    echo "<script>alert('Registration successful'); window.location.href='../html/index.html';</script>";
} else {
    echo "<script>alert('Username already exists!'); window.location.href='../html/register.html';</script>";
}

$conn->close();
?>
