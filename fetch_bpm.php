<?php
require 'database.php';
session_start();

if (isset($_SESSION['user_id'])) {
  $stmt = $pdo->prepare("SELECT bpm, created_at FROM bpm_readings WHERE user_id = ? ORDER BY created_at DESC LIMIT 30");
  $stmt->execute([$_SESSION['user_id']]);
  echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
?>