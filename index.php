<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="accessBg">
        <main class="accessPanel">
            <img src="assets/images/user_login.png" id="userImg">
            <h1>
                Logowanie
            </h1>
            <form>
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" name="email" placeholder="E-mail" required>
                <label for="pass" class="sr-only">Hasło</label>
                <input type="password" id="pass" name="pass" placeholder="Hasło" required>
                <button type="submit">Zaloguj się</button>
            </form>
            <p id="resetLink">
                <a href="#">Zapomniałeś hasła?</a>
            </p>
        </main>
        <nav>

        </nav>
    </div>
</body>
</html>