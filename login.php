<?php
require 'database.php';
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$_POST['username']]);
  $user = $stmt->fetch();

  if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: monitorimi.php");
    exit;
  } else {
    $error = "Kredencialet janë të pasakta.";
  }
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>Kyçu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7fa;
      padding: 50px;
    }
    .form-container {
      width: 432px;
    margin: 21px auto;
    background: #FFF;
    padding: 65px;
    border-radius: 33px;
    box-shadow: 0 0 73px rgba(0, 0, 0, 0.1);
}

    .form-container form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .form-container h2 {
      text-align: center;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #218838;
    }
    .error {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Kyçu</h2>
    <?php if ($error): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Emri i përdoruesit" required>
      <input type="password" name="password" placeholder="Fjalëkalimi" required>
      <button type="submit">Kyçu</button>
    </form>
  </div>
</body>
</html>
