<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/style_login_page.css">
    <title>Login / Registrazione</title>
    <style>
        .back-arrow {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }
    </style>
</head>

<body>
    <a href="../../index.php" class="back-arrow"><i class="fa fa-arrow-left"></i></a>
    <div class="container" id="container">
        <div class="form-container sign-up" id="signup">
            <form id="registrationForm" class="registration" method="POST">
                <h1>Crea un Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>o usa la tua email per la registrazione</span>
                <input type="text" name="nome" placeholder="Nome e cognome">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="tel" name="telefono" placeholder="Telefono" pattern="[0-9]*" inputmode="numeric">
                <button type="submit">Registrati</button>
                <div id="registrationMessage" class="message"></div>
            </form>
        </div>
        <div class="form-container sign-in" id="signin">
            <form id="loginForm" class="login" method="POST">
                <h1>Accedi</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>o usa la tua email</span>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <a href="recupero_password.php">Password dimenticata?</a>
                <button type="submit">Accedi</button>
                <div id="loginMessage" class="message"></div>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bentornato!</h1>
                    <p>Se hai già un account ti basterà fare l'accesso premendo il pulsante qui sotto</p>
                    <button class="hidden" id="login">Accedi</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Benvenuto!</h1>
                    <p>Registrati con i tuoi dati personali per sbloccare tutte le funzionalità del sito</p>
                    <button class="hidden" id="register">Registrati</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        // Funzione per mostrare la sezione di registrazione
        function showSignup() {
            container.classList.add("active");
            window.location.hash = 'signup';
        }

        // Funzione per mostrare la sezione di login
        function showSignin() {
            container.classList.remove("active");
            window.location.hash = 'signin';
        }

        // Event listeners per i pulsanti di toggle
        registerBtn.addEventListener('click', showSignup);
        loginBtn.addEventListener('click', showSignin);

        // Verifica l'ancora nell'URL quando la pagina viene caricata
        window.addEventListener('load', function() {
            if (window.location.hash === '#signup') {
                showSignup();
            } else {
                showSignin();
            }
        });

        const telefonoInput = document.querySelector('input[name="telefono"]');

        telefonoInput.addEventListener('input', function(event) {
            const value = telefonoInput.value;
            if (/[^0-9]/.test(value)) {
                telefonoInput.value = value.replace(/[^0-9]/g, '');
            }
        });

        // Form submit handlers
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            fetch('registration_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('registrationMessage');
                messageDiv.innerText = data.message;
                messageDiv.style.color = data.success ? 'green' : 'red';
                messageDiv.classList.add('show');
                if (data.success) {
                    this.reset();
                }
            });
        });

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch('login_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('loginMessage');
                if (data.success) {
                    window.location.href = '../../index.php?user_id=' + data.user_id;
                } else {
                    messageDiv.innerText = data.message;
                    messageDiv.style.color = 'red';
                    messageDiv.classList.add('show');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const messageDiv = document.getElementById('loginMessage');
                messageDiv.innerText = 'Si è verificato un errore durante il login. Riprova più tardi.';
                messageDiv.style.color = 'red';
                messageDiv.classList.add('show');
            });
        });
    </script>
</body>

</html>
