<?php

$titre = "DailyBreaks";
$link = "./css/style.css";
require "./include/header.inc.php";

require_once "./function/code_verif.php";

// On vérifie que la méthode POST est utilisée
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // On vérifie si le champ "recaptcha-response" contient une valeur
    if(empty($_POST['recaptcha-response'])){
        header('Location: register.php');
    }else{
        // On prépare l'URL
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=6LeXkBwjAAAAAAowqUnhh0wzFa03KpWyEyFdgnVH&response={$_POST['recaptcha-response']}";

        // On vérifie si curl est installé
        if(function_exists('curl_version')){
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
        }else{
            // On utilisera file_get_contents
            $response = file_get_contents($url);
        }

        // On vérifie qu'on a une réponse
        if(empty($response) || is_null($response)){
            header('Location: register.php');
        }else{
            $data = json_decode($response);
            if($data->success){
                if(
                    isset($_POST['pass']) && !empty($_POST['pass']) &&
                    isset($_POST['email']) && !empty($_POST['email']) 
                ){
                    // On nettoie le contenu
                    $pass = strip_tags($_POST['pass']);
                    $email = strip_tags($_POST['email']);
      
                    // Ici vous traitez vos données
                    code_verif($_POST["email"]);
                    
                }
            }else{
                header('Location: register.php');
            }
        }
    }
}else{
    http_response_code(405);
    echo 'Méthode non autorisée';
}?>

<main>
    <section>
    
        <form class="contact_form" method="post">
            <div class="box">
                <div class="input-box">
                    <div class="content">
                        <span></span>
                        <p>Tapez le numero de verification envoyé par mail</p>
                        <input type="text" id="pwd_verif" name="pwd_verif">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <br></br>
                    <div class="mid">
                        <input style="display:none;" type="text" id="pass" name="pass" value="<?php echo $_POST['pass'] ?>">
                        <input style="display:none;" type="text" id="email" name="email" value="<?php echo $_POST['email'] ?>">
                        <button name="codesubmit" type="submit" value="submit">Vérifier mon Identité</button>
                    </div>
                    <br></br>
                </div>
            </div>
        </form>

        <?php


global $db;
$stmt = $db->prepare('SELECT EXISTS(SELECT mail FROM client WHERE mail=?);');
$stmt->execute([$email]);
$mailExist = $stmt->fetch();


if(!empty($_POST["codesubmit"]) && (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) && ($mailExist==false)){
    if(strcmp($pwd_verif, $randomStr) == 0){
        require "./config/bd_connect.php";
        
            
          if(!empty($_POST['pass']) && !empty($_POST['email'])){
              $options = [
                  'cost' => 12,
              ];
      
              $hashpass=password_hash($_POST['pass'], PASSWORD_BCRYPT, $options);
      
             
              global $db;
      
              $sql = "INSERT INTO compte (mail, pwd_hash) VALUES (:email, :pass)";
              $req = $db->prepare($sql);
              $req->execute([
                  'email'=>$_POST['email'],
                  'pass'=>$hashpass
              ]);
              
            $_SESSION['email'] = $_POST['email'];
		    $_SESSION['pass'] = $_POST['pass'];
            
            header('Location: index.php');
              
          }
      }
}
else{echo "<p style='color:white;'>Un mail vous a été envoyé</p>";}

?>


    </section>
</main>

<?php
require "./include/footer.inc.php";
?>