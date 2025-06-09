<?php
session_start();
include 'db/mysql_connection.php';

$username = $_POST['username'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];

$sql = "UPDATE users SET age = ?, dob = ?, contact = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $age, $dob, $contact, $username);

if ($stmt->execute()) {
    $_SESSION['age'] = $age;
    $_SESSION['dob'] = $dob;
    $_SESSION['contact'] = $contact;
    echo "<script>alert('Profile updated successfully'); window.location.href='../html/profile.html';</script>";
} else {
    echo "<script>alert('Update failed'); window.location.href='../html/profile.html';</script>";
}
?>
