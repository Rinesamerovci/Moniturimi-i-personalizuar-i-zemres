<?php
require 'database.php';
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['bpm'])) {
  $stmt = $pdo->prepare("INSERT INTO bpm_readings (user_id, bpm) VALUES (?, ?)");
  $stmt->execute([$_SESSION['user_id'], $_POST['bpm']]);
}
?>