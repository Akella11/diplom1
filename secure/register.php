<?php
require '../config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Валідація вхідних даних
    if (empty($username) || empty($password)) {
        $error = 'Будь ласка, заповніть всі поля.';
    } elseif (strlen($username) < 3 || strlen($username) > 50) {
        $error = 'Ім\'я користувача повинно бути від 3 до 50 символів.';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $error = 'Ім\'я користувача може містити лише літери, цифри та підкреслення.';
    } elseif (strlen($password) < 6) {
        $error = 'Пароль повинен містити щонайменше 6 символів.';
    } else {
        // Хешування пароля перед збереженням
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Захищений код з використанням підготовлених виразів
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            $stmt->execute();
            header('../insecure/login.php?registration=success');
            exit();
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $error = 'Користувач з таким ім\'ям вже існує.';
            } else {
                $error = 'Помилка реєстрації: ' . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Захищена реєстрація</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Захищена реєстрація</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="username">Ім'я користувача:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Зареєструватися</button>
        </form>
        <div class="links">
            <a href="../secure/login.php">Вже зареєстровані? Увійти</a>
        </div>
    </div>
</body>
</html>
