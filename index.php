<!DOCTYPE html>
<html>
<head>
    <title>Головна сторінка</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff;
            --primary-hover-color: #0056b3;
            --background-light-gray:rgb(230, 227, 227);
            --text-dark: #343a40;
            --text-muted: #6c757d;
            --card-background: #ffffff;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --border-radius: 10px;
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: var(--background-light-gray);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .main-container {
            background-color: var(--card-background);
            padding: 40px 60px; 
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            text-align: center;
            max-width: 800px;
            width: 90%;
            margin-bottom: 30px;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 2.2em; 
        }

        p.description {
            color: var(--text-muted);
            margin-bottom: 35px; 
            font-size: 1.05em;
            text-align: justify; 
            line-height: 1.7; 
        }

        .button-group {
            display: flex;
            justify-content: space-between; 
            gap: 20px; 
            margin-top: 30px; 
            width: 100%; 
        }

        .button {
            background-color: var(--primary-color);
            color: white;
            padding: 14px 28px; 
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.05em;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
            flex-grow: 1; 
            text-align: center; 
        }

        .button:hover {
            background-color: var(--primary-hover-color);
            transform: translateY(-2px);
        }

        .info-link {
            margin-top: 25px;
            font-size: 1em;
        }

        .info-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .info-link a:hover {
            color: var(--primary-hover-color);
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="main-container">
        <h1>Система демонстрації захисту від SQL-атак</h1>
        <p class="description">
            Цей програмний комплекс призначений для демонстрації та аналізу методів захисту конфіденційної інформації 
            баз даних від SQL-атак. Він дозволяє користувачам наочно дослідити принципи безпечної та небезпечної 
            авторизації у веб-додатках, акцентуючи увагу на критичних аспектах безпеки при роботі з базами даних.
            Система демонструє дві моделі роботи з даними користувача:
            Незахищений режим — реалізує пряме виконання SQL-запитів без попередньої перевірки введення. 
            Це створює умови для SQL-ін’єкцій, дозволяючи маніпулювати запитами до бази даних і тим самим 
            ілюструючи поширені вразливості.
            Захищений режим — використовує сучасні підходи до обробки вхідних даних, 
            зокрема параметризовані запити та валідацію, що запобігає ін’єкціям і гарантує захист конфіденційної інформації.
        </p>

        <div class="button-group">
            <a href="insecure/login.php" class="button">Незахищена авторизація</a>
            <a href="secure/login.php" class="button">Захищена авторизація</a>
        </div>

        <div class="info-link">
            <p>Більше інформації про проєкт: <a href="info.php">Дізнатися більше</a></p>
        </div>
    </div>
</body>
</html>
