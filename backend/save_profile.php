<?php
session_start();
require_once '../frontend/db.php'; // Adjusted to load db.php from frontend

$db = new MySqlDB();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_email'])) {
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $email = $_SESSION['user_email'];

    $success = $db->updateUserProfileByEmail($email, $full_name, $phone, $location);

    if ($success) {
        // Update session data
        $_SESSION['user_name'] = $full_name;
        $_SESSION['user_phone'] = $phone;
        $_SESSION['user_location'] = $location;

        header("Location: http://localhost/AI_project/frontend/profile.php?status=success");
        exit();
    } else {
        echo "Error updating profile.";
    }
} else {
    header("Location: http://localhost/AI_project/frontend/profile.php");
    exit();
}
