<?php
require_once "includes/Auth.php";

$auth = new Auth();

if (!$auth->isAuthenticated()) {
    header("Location: login.php");
    exit;
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
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/pages/mainpage.css">
    <link rel="stylesheet" href="assets/fonts/fontello/css/fontello.css">
    <script src="assets/js/header.js"></script>
</head>
<body>
    <header class="top-bar">
        <nav class="main-nav" aria-label="Główna nawigacja serwisu">
            <a href="#" title="Strona główna Social">Strona główna</a>
            <a href="#" title="Tablica postów">Posty</a>
            <a href="#" title="Wydarzenia">Eventy</a>
        </nav>
        <section class="controls">
            <input type="search" placeholder="Szukaj..." class="search-box">
            <button id="dark-mode-toggle" class="dark-mode-toggle"><i class="icon-moon"></i></button>
            <a href="#" title="Wiadomości" class="link-icon"><i class="icon-mail-alt"></i></a>
            <a href="#" title="Powiadomienia" class="link-icon"><i class="icon-bell-alt"></i></a>
        </section>
        <button id="controls-toggle" class="controls-toggle">
            <i class="icon-menu"></i>
        </button>
        <nav class="user-nav" aria-label="Nawigacja konta użytkownika">
            <a href="#" title="Profil użytkownika" class="link-btn">Profil <i class="icon-user"></i></a>
            <a href="logout.php" title="Wyloguj się" class="link-btn logout-btn">
                Wyloguj się
                <i class="icon-lock-open-alt"></i>
                <!--<i class="icon-lock"></i>-->
            </a>
        </nav>
        <div id="controls-menu" class="controls-menu">
            <input type="search" placeholder="Szukaj..." class="search-box">
            <a href="#" title="Uruchom tryb ciemny" class="link-icon" id="dark-mode-toggle"><i class="icon-moon"></i> Tryb ciemny</button>
            <a href="#" class="link-icon"><i class="icon-mail-alt"></i> Wiadomości</a>
            <a href="#" class="link-icon"><i class="icon-bell-alt"></i> Powiadomienia</a>
        </div>
        <div id="controls-user-menu" class="controls-user-menu">
            <input type="search" placeholder="Szukaj..." class="search-box">
            <a href="#" title="Uruchom tryb ciemny" class="link-icon" id="dark-mode-toggle"><i class="icon-moon"></i> Tryb ciemny</button>
            <a href="#" class="link-icon"><i class="icon-mail-alt"></i> Wiadomości</a>
            <a href="#" class="link-icon"><i class="icon-bell-alt"></i> Powiadomienia</a>
            <a href="#" title="Profil użytkownika" class="link-btn">Profil <i class="icon-user"></i></a>
            <a href="logout.php" title="Wyloguj się" class="link-btn logout-btn">Wyloguj się <i class="icon-lock-open-alt"></i>
            </a>
        </div>
    </header>
    <main>

    </main>
    <footer>

    </footer>
</body>