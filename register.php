<?php
require_once "includes/Auth.php";

$auth = new Auth();

if ($auth->isAuthenticated()) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['new-password'];

    if ($user->register($username, $email, $password)) {
        header("Location: login.php"); //obsługa pomyślnej rejestracji
    } else {
        echo "Nieudana"; //obsługa nieudanej rejestracji
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="accessBg">
        <main class="accessPanel">
            <h1>
                Rejestracja
            </h1>
            <form method="POST">
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" class="nunito" autocomplete="username" inputmode="text" required>
                <p class="error-message hidden" id="username-error">Nazwa użytkownika musi zawierać 3-18 znaków alfanumerycznych.</p>
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" name="email" placeholder="E-mail" class="nunito" autocomplete="email" required>
                <p class="error-message hidden" id="email-error">Podaj poprawny adres e-mail.</p>
                <label for="pass" class="sr-only">Hasło</label>
                <input type="password" id="pass" name="new-password" placeholder="Hasło" class="nunito" autocomplete="new-password" required>
                <p class="error-message hidden" id="pass-error">Hasło musi zawierać co najmniej 8 znaków.</p>
                <div class="password-strength hidden">
                    <div class="strength-bar">
                        <div class="strength-fill"></div>
                    </div>
                </div>
                <label for="passConfirm" class="sr-only">Powtórz hasło</label>
                <input type="password" id="passConfirm" name="confirm-password" placeholder="Powtórz hasło" class="nunito password-hidden" autocomplete="new-password">
                <p class="error-message hidden" id="passConfirm-error">Podane hasła różnią się.</p>
                <!--<div class="g-recaptcha" data-sitekey="6LeQtfgqAAAAAPe_D8jzbyZ_FQvB9R-_b-A8B53B"></div>-->
                <button type="submit" class="nunito submit-access" id="register-btn">Zarejestruj się</button>
            </form>
            <p class="bottomLink">
                <a href="login.php" title="Zaloguj się">Masz już konto? Zaloguj się</a>
            </p>
        </main>
        <nav class="switch">
            <a href="login.php" title="Zaloguj się" class="circular-link">
                <img src="assets/images/user_login.png" alt="User icon">
            </a>
        </nav>
    </div>

<script>
    function hide(e) {
        e.classList.remove("show");
        setTimeout(() => {
            e.classList.add("hidden");
            updateSubmitButtonState();
        }, 300);
    }

    function show(e) {
        e.classList.add("show");
        setTimeout(() => {
            e.classList.remove("hidden");
            updateSubmitButtonState();
        }, 10); 
    }

    function setDelay(callback, delay = 500) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => callback.apply(this, args), delay);
        };
    }

    function checkPasswordStrength(password) {
        let strength;
        if (password.length >= 8) strength = 0;
        if (/[a-z]/.test(password) && /[A-Z]/.test(password) && /\d/.test(password)) strength++;
        if (password.length >= 12 && /[a-z]/.test(password) && /[A-Z]/.test(password) && /\d/.test(password) && /[^A-Za-z0-9]/.test(password)) strength++;

        return strength;
    }

    function updateSubmitButtonState() {
        const errors = document.querySelectorAll(".error-message.show");
        submitButton.disabled = errors.length > 0;
    }

    const submitButton = document.getElementById("register-btn");

    const validateUsername = setDelay(function() {
        const userInput = this.value;
        const errorMsg = document.getElementById("username-error");

        /^[a-zA-Z0-9]{3,18}$/.test(userInput) || userInput === "" ? hide(errorMsg) : show(errorMsg);
    });

    const validateEmail = setDelay(function() {
        const emailInput = this.value;
        const errorMsg = document.getElementById("email-error");

        /^[a-zA-Z0-9][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(emailInput) || emailInput === "" ? hide(errorMsg) : show(errorMsg);
    });

    const validatePass = setDelay(function() {
        const passInput = this.value;
        const errorMsg = document.getElementById("pass-error");
        const strengthBar = document.querySelector(".password-strength");
        const strengthFill = document.querySelector(".strength-fill");
        const passConfirm = document.getElementById("passConfirm");
        const passConfirmError = document.getElementById("passConfirm-error");

        if (passInput === "") {
            strengthBar.classList.remove("show");
            setTimeout(() => {
                strengthBar.classList.add("hidden");
                strengthBar.style.display = "none";
                errorMsg.style.display = "block";
            }, 300);
            strengthFill.style.width = "0";
            hide(errorMsg);
            hide(passConfirmError);
            passConfirm.classList.remove("password-visible");
            passConfirm.classList.add("password-hidden");
            passConfirm.removeAttribute("required");
            return;
        }

        if (passInput.length < 8) {
            strengthBar.classList.remove("show");
            setTimeout(() => {
                strengthBar.classList.add("hidden");
                strengthBar.style.display = "none";
            }, 300);
            strengthFill.style.width = "0";
            setTimeout(() => {
                errorMsg.style.display = "block";
                setTimeout(() => {
                    errorMsg.classList.remove("hidden");
                    errorMsg.classList.add("show");
                    updateSubmitButtonState();
                }, 10); 
            }, 300);
            hide(passConfirmError);
            passConfirm.classList.remove("password-visible");
            passConfirm.classList.add("password-hidden");
            passConfirm.removeAttribute("required");
        } else {
            passConfirm.setAttribute("required", "");
            passConfirm.classList.add("password-visible");
            passConfirm.classList.remove("password-hidden");
            if (passInput != passConfirm.value && passConfirm.value != "") {
                show(passConfirmError);
            } else if (passInput === passConfirm.value) {
                hide(passConfirmError);
            }

            errorMsg.classList.remove("show");
            errorMsg.classList.add("hidden");
            setTimeout(() => {
                errorMsg.style.display = "none";
            }, 300);
            setTimeout(() => {
                strengthBar.style.display = "block";
                setTimeout(() => {
                    strengthBar.classList.remove("hidden");
                    strengthBar.classList.add("show");
                }, 10); 
            }, 300);

            let strength = checkPasswordStrength(passInput);

            strengthFill.style.width = ["33%", "66%", "100%"][strength];
            strengthFill.className = `strength-fill ${["weak", "medium", "strong"][strength]}`;
        }
        updateSubmitButtonState();
    });

    const validatePassConfirm = setDelay(function() {
        const passConfirmInput = this.value;
        const passInput = document.getElementById("pass").value;
        const errorMsg = document.getElementById("passConfirm-error");

        const isValid = (passInput === passConfirmInput);

        (this.classList.contains("password-visible") && !isValid) ? show(errorMsg) : hide(errorMsg);
    });

    document.getElementById("username").addEventListener("input", validateUsername);
    document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("pass").addEventListener("input", validatePass);
    document.getElementById("passConfirm").addEventListener("input", validatePassConfirm);

    updateSubmitButtonState();
</script>
</body>
</html>