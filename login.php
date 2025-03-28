<?php
require_once "includes/Auth.php";

$auth = new Auth();

if ($auth->isAuthenticated()) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    if ($auth->login($email, $password)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Niepoprawne dane"; //obsługa niepoprawnego logowania
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social</title>
    <link rel="icon" type="image/x-icon" href="assets/images/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/pages/access.css">
</head>
<body>
    <div class="accessBg">
        <main class="accessPanel">
            <img src="assets/images/icon.png" alt="User icon" id="icon">
            <h1>
                Logowanie
            </h1>
            <form method="POST">
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" name="email" placeholder="E-mail" class="nunito" style="margin-bottom: 3.33vh;" autocomplete="email" required>
                <label for="pass" class="sr-only">Hasło</label>
                <input type="password" id="pass" name="pass" placeholder="Hasło" class="nunito" autocomplete="current-password" required>
                <button type="submit" class="nunito submit-access">Zaloguj się</button>
            </form>
            <p class="bottomLink">
                <a href="#" title="Przypomnij hasło">Zapomniałeś hasła?</a>
            </p>
        </main>
        <nav class="switch">
            <a href="register.php" title="Zarejestruj się" class="circular-link">
                <img src="assets/images/user_add.png" alt="Register user icon">
            </a>
        </nav>
    </div>
</body>
</html>