<?php
require 'database.php';

// Nëse forma është dërguar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    // Validimi i emailit
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email-i nuk është i vlefshëm.";
    }

    // Validimi i fjalëkalimit
    if (strlen($password) < 8) {
        $errors[] = "Fjalëkalimi duhet të ketë të paktën 8 karaktere.";
    }

    // Nëse nuk ka gabime, regjistro përdoruesin
    if (empty($errors)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $passwordHash]);

        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regjistrimi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7fa; font-family: Arial, sans-serif; }
        .container { margin-top: 80px; }
        .form-container { background: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); }
        .header { text-align: center; margin-bottom: 30px; }
        .btn { background-color: #28a745; color: white; }
        .btn:hover { background-color: #218838; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <h2 class="header">Regjistrohu</h2>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <div><?php echo htmlspecialchars($error); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="register.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Emri i përdoruesit</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Fjalëkalimi</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-block">Regjistrohu</button>
                </form>

                <div class="switch-link mt-3">
                    <a href="login.php">Keni një llogari? Hyni këtu!</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>