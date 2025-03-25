# Social
Prosty serwis społecznościowy z możliwością logowania i rejestracji.

## Funkcjonalności
- Logowanie i rejestracja użytkowników

## Struktura projektu
    📁 social/
    ├── 📁 assets/          # Pliki statyczne (obrazy, czcionki, CSS, JS)
    │   ├── 📁 css/         # Style CSS
    │   ├── 📁 js/          # Skrypty JavaScript
    │   ├── 📁 images/      # Obrazy
    │   ├── 📁 fonts/       # Czcionki, ikony
    │
    ├── 📁 includes/        # Pliki PHP do obsługi backendu
    ├── 📁 templates/       # Szablony HTML/PHP
    ├── index.php           # Strona główna
    ├── login.php           # Strona logowania
    ├── logout.php          # Skrypt wylogowania
    ├── register.php        # Strona rejestracji
    ├── social.sql          # Baza danych 
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
    - zaimportuj plik `social.sql`

5. Skonfiguruj bazę w `Database.php` (w razie potrzeby)
    ```bash
    $host = "localhost";
    $db = "social";
    $user = "root";  // XAMPP oraz WAMP domyślnie używają "root"
    $pass = "";      // domyślnie puste
6. Uruchom stronę w przeglądarce
    ```bash
    http://localhost/social/
## Autor
Stworzony przez [AdvancedDummy](https://github.com/advancedDummy) © 2025.

## Licencja
Ten projekt jest objęty licencją Custom MIT Non-Commercial License. Można go używać, modyfikować i udostępniać, ale nie wolno wykorzystywać go komercyjnie. Pełna treść licencji znajduje się w pliku LICENSE.txt.
