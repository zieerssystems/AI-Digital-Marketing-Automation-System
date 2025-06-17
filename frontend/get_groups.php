<?php
require_once 'db.php';
header('Content-Type: application/json');

$db = new MySqlDB();
$conn = $db->getConnection();

$result = $conn->query("SELECT id, group_name FROM email_groups ORDER BY group_name");
$groups = [];

while ($row = $result->fetch_assoc()) {
    $groups[] = ['id' => $row['id'], 'name' => $row['group_name']];
}

echo json_encode(['groups' => $groups]);
?>
