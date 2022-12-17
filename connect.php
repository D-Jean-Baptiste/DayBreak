<?php
session_start();
$titre = "DailyBreaks";
$link = "./css/style.css";
require "./include/header.inc.php";
?>

<main>
    <section class="sectContact">

        <h2>Connectez-vous</h2>
        
        <form class="contact_form" method="POST">
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
                <div class="mid">
                    
                    <br></br>
                    <button type="submit" name="connexion" value="Connexion">Se connecter</button>
                    <br></br>
                    <a href="register.php" style="color:cyan">Pas de compte? Inscrivez-vous</a>
                </div>
                <br></br>
            </div>
        </form>

    </section>
</main>


<?php
    if(isset($_POST['connexion'])){
        require "./config/bd_connect.php";
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        global $db;
        
        $query = $db->prepare("SELECT * FROM compte WHERE mail = ?");
        $query->execute([$_POST['email']]);
        $user = $query->fetch();
     
        if ($user && password_verify($_POST['pass'], $user['pwd_hash'])){
            echo "Identifiant valide !";
            echo '<body onLoad="alert(\'Connexion reussi !!!)">';
            
            $_SESSION['email'] = $_POST['email'];
		    $_SESSION['pass'] = $_POST['pass'];
            
            header('Location: index.php');
        } 
        else {
            echo '<body onLoad="alert(\'Un probleme est survenu a propos de la connexion !!!)">';
        }
    }
?>

<?php
        require "./include/footer.inc.php";
?>