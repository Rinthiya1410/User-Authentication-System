<?php
session_start();
include 'db/mysql_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['age'] = $user['age'];
        $_SESSION['dob'] = $user['dob'];
        $_SESSION['contact'] = $user['contact'];
        header("Location: ../html/profile.html");
        exit();
    } else {
        echo "<script>alert('Incorrect password'); window.location.href='../html/index.html';</script>";
    }
} else {
    echo "<script>alert('User not found'); window.location.href='../html/index.html';</script>";
}
?>
