<?php
session_start();
require 'database.php'; // lidhja me PDO te konfiguruar

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['bpm']) && is_numeric($data['bpm'])) {
        $bpm = (int)$data['bpm'];
        $user_id = $_SESSION['user_id'];

        $stmt = $pdo->prepare("INSERT INTO bpm_readings (user_id, bpm) VALUES (?, ?)");
        $stmt->execute([$user_id, $bpm]);

        echo json_encode(['success' => true, 'message' => 'BPM u ruajt me sukses']);
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Vlera e BPM nuk është e vlefshme']);
        exit;
    }
}

http_response_code(400);
echo json_encode(['success' => false, 'message' => 'Kërkesë e pavlefshme']);
