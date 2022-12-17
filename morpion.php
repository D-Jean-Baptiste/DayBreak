<?php
$titre = "DayBreak";
$link = "./css/style.css";
require "./include/header.inc.php";
?>

<?php
if(!isset($_SESSION['email'])&&(empty($_SESSION['email']))){
  header("location:/connect.php");
}

?>
<style>

  
center .game_tab, th, tr {
    border: 1px solid;
    height: 165px;
    width: 600px;
    font-size: 60px;
    transition:2s;
  }
  center .game_tab tr th:hover{
    background-color: gray;
    transition:1s;
  }


  </style>
<main>
    <section>
    <center>
        <h2>Jeu du Morpion</h2>
        <p>Joueur X Jouer !</p>
        <p></p>
        <table class="game_tab">
           <tr>
             <th id="1"></th>
             <th id="2"></th>
             <th id="3"></th>
           </tr>
           <tr>
             <th id="4"></th>
             <th id="5"></th>
             <th id="6"></th>
           </tr>
           <tr>
              <th id="7"></th>
              <th id="8"></th>
             <th id="9"></th>
            </tr>
      </table>
      <button onclick="location.reload()" class="but" style="margin-bottom:40px;">Recommencer</button>
      <a href="index.php" style="margin-top:30px;"><button type="button" class="but">Quitter </button></a>
    </center>
    

    </section>
</main>



<?php
    require "./include/footer.inc.php";
?>