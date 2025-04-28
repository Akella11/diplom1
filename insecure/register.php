<?php
require '../config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = 'Будь ласка, заповніть всі поля.';
    } else {
        // Цей код вразливий до SQL-ін'єкцій
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        try {
            $pdo->exec($sql);
            header('Location: login.php?registration=success');
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
    <title>Незахищена реєстрація</title>
    <link rel="stylesheet" type="text/css" href="../secure/style.css">
</head>
<body>
    <div class="container">
        <h2>Незахищена реєстрація</h2>
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
            <a href="../insecure/login.php">Вже зареєстровані? Увійти</a>
        </div>
    </div>
</body>
</html>
