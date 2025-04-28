<?php
require '../config.php';

$error = '';
$login_successful = false;
$sql_query = '';
$user_data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $pdo->query($sql_query);

    if ($result && $result->rowCount() > 0) {
        $login_successful = true;
        $user_data = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        $error = 'Неправильне ім\'я користувача або пароль.';
    }
}

$registration_success = isset($_GET['registration']) && $_GET['registration'] === 'success';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Незахищений вхід</title>
    <link rel="stylesheet" type="text/css" href="../secure/style.css">
</head>
<body>
    <div class="container">
        <h2>Незахищений вхід</h2>
        <?php if ($registration_success): ?>
            <p class="success">Реєстрація успішна! Тепер ви можете увійти.</p>
        <?php endif; ?>
        <form method="post">
            <label for="username">Ім'я користувача:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Увійти</button>
        </form>

        <?php if ($sql_query): ?>
            <p>Запит: <code><?php echo htmlspecialchars($sql_query); ?></code></p>
        <?php endif; ?>

        <?php if ($login_successful): ?>
            <p class="success">Авторизація успішна!</p>
            <p>Ім'я користувача: <?php echo htmlspecialchars($user_data['username'] ?? ''); ?></p>
            <p>Пароль: <?php echo htmlspecialchars($user_data['password'] ?? ''); ?></p>
            <?php if (count($user_data) > 2): ?>
                <pre><?php print_r($user_data); ?></pre>
            <?php endif; ?>
        <?php elseif ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <div class="links">
            <a href="../insecure/register.php">Зареєструватися</a>
        </div>
    </div>
</body>
</html>
