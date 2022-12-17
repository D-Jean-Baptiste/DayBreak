<?php
$titre = "DailyBreaks";
$link = "./css/style.css";
require "./include/header.inc.php";
?>

<main>
    <section class="sectContact">

        <h2>Enregistrer-vous Gratuitement</h2>
        
        <form class="contact_form" method="POST" action="validatemail.php">
            <div class="box">
                <div class="input-box">
                    <div class="content">
                        <span></span>
                        <input type="text" name="email" placeholder="Tapez votre mail">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <br></br>
                    <div class="content">
                        <span></span>
                        <input type="password" name="pass" placeholder="Tapez votre mot de passe">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
                <input type="hidden" id="recaptchaResponse" name="recaptcha-response">
                <div class="mid">
                    <button name="submit">S'inscrire</button>
                    <br></br>
                    <a href="connect.php" style="color:cyan">Vous avez un compte ? Connectez-vous</a>
                </div>
                <br></br>
            </div>
        </form>

        <script src="https://www.google.com/recaptcha/api.js?render=6LeXkBwjAAAAAGyPZzI9bvkNLEl6AZXYFf4c1RrG"></script>
        <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeXkBwjAAAAAGyPZzI9bvkNLEl6AZXYFf4c1RrG', {
                action: 'homepage'
            }).then(function(token) {
                document.getElementById('recaptchaResponse').value = token
            });
        });
        </script>

    </section>
</main>

<?php
        require "./include/footer.inc.php";
?>