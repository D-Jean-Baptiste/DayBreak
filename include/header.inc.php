<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        
        <link rel="shortcut icon" href="/images/sitelogo.png" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
        <meta charset="UTF-8">
        <meta name="author" content="DAMODARANE Jean-Baptiste & ELUMALAI Sriguru & ZHANG Victor & GUNDUZ Maxime" /> 
        <meta name="date" content="2022-12-01" />
        <meta name="keywords" content="Projet de Developpement web avancee" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">

        <title><?php echo $titre;?></title>

        <!-- style lien cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <!-- style avec css -->
        <link rel="stylesheet" href="<?php echo $link ?>"/>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    </head>

    <body>

        <?php
            require "./config/bd_connect.php";
        ?>

        <header class="header">

            <a href="index.php" class = "logo">
                <img src="images/logo3.png" alt="">
            </a>

            <nav class="navigbar">
                <a href="index.php" class="active">Acceuil</a>
                <a href="techno.php" class="active">Technologie</a>
                <a href="sports.php" class="active">Sports</a>
                <a href="politics.php" class="active">Politiques</a>
                <a href="meteo.php" class="active">Météo</a>
                <a href="divertissement.php" class="active">Divertissement</a>
            </nav>

            <div class="mesicones">
                <div class="fas fa-search" id="search-btn"></div>
                <?php
                    if(isset($_SESSION['email'])&&(!empty($_SESSION['email']))){
                        echo  '<a href="logout.php"><div class="fa fa-sign-out"></div></a>';
                    } else{
                        echo '<a href="connect.php"><div class="fa fa-user"></div></a>';
                    }
                ?>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>

            <div class="search-form">
                <input class="form-control" type="text" id="live_search" placeholder="rechercher">
                <label for="search-box" class="fas fa-search"></label>
                <div id="display"></div>
            </div>  

        </header>

     