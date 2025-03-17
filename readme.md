# Social
Prosty serwis społecznościowy z możliwością logowania, rejestracji i odzyskiwania hasła.

## Funkcjonalności
- Logowanie i rejestracja użytkowników
- Resetowanie hasła

## Struktura projektu
    📁 social/
    ├── 📁 assets/          # Pliki statyczne (obrazy, CSS, JS)
    │   ├── 📁 css/         # Style CSS
    │   ├── 📁 js/          # Skrypty JavaScript
    │   ├── 📁 images/      # Obrazy
    │
    ├── 📁 includes/        # Pliki PHP do obsługi backendu
    ├── 📁 templates/       # Szablony HTML/PHP
    ├── index.html          # Strona główna
    ├── login.html          # Strona logowania
    ├── register.html       # Strona rejestracji
    ├── LICENSE.txt         # Pełna treść licencji
    ├── README.md           # Dokumentacja projektu

## Technologie
- HTML5, CSS3, JavaScript
- PHP 8.3.0 + MySQL

## Wymagania techniczne
- Lokalny serwer PHP (np. XAMMP lub WAMP)
- PHP 8.3.0 lub nowszy
- MySQL/MariaDB (do obsługi bazy danych)
- Przeglądarka internetowa (Chrome, Firefox, Edge, itp.)

## Instalacja i uruchomienie
1. Pobierz repozytorium:
    ```bash
    git clone https://github.com/advancedDummy/social.git
- lub pobierz i rozpakuj pliki ręcznie.

2. Skopiuj pliki na lokalny serwer
- (XAMPP) Umieść folder projektu w katalogu `htdocs`:
    ```bash
    C:\xampp\htdocs\social\
- (WAMP) Umieść folder projektu w katalogu `www`:
    ```bash
    C:\xampp\htdocs\social\
3. Uruchom serwer lokalny
- W XAMPP uruchom:
    - Apache (dla PHP)
    - MySQL (dla bazy danych)
- W WAMP:
    - kilknij **WAMP Sever** i uruchom go
    - ikona na pasku zadań powinna zmienić kolor na zielony, co oznacza, że Apache i MySQL działają poprawnie
4. Utwórz bazę danych
    - otwórz `phpMyAdmin` (`http://localhost/phpmyadmin/`)
    - utwórz nową bazę danych o nazwie **social**
    - zaimportuj plik `database.sql`

5. Skonfiguruj bazę w `config.php`
    ```bash
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');  // XAMPP oraz WAMP domyślnie używają "root"
    define('DB_PASS', '');      // domyślnie puste
    define('DB_NAME', 'social');
6. Uruchom stronę w przeglądarce
    ```bash
    http://localhost/social/
## Autor
Stworzony przez [AdvancedDummy](https://github.com/advancedDummy) © 2025.

## Licencja
Ten projekt jest objęty licencją Custom MIT Non-Commercial License. Można go używać, modyfikować i udostępniać, ale nie wolno wykorzystywać go komercyjnie. Pełna treść licencji znajduje się w pliku LICENSE.txt.
