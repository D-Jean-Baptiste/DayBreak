<?php
$titre = "DayBreak";
$link = "./css/style.css";
require "./include/header.inc.php";
?>

<?php

    $api_url = 'https://api.quotable.io/random';
    $quote = json_decode(file_get_contents($api_url));
?>

        <main>

            <section>
                <h2>Citations du jour par Daybreak (en anglais)</h2>
                <div class="box">
                    <h3 style="margin-top: 0;margin-bottom: 45px;text-align: center;color: #ffb300;font-weight: 500;font-size: 18px;">
                        <?php echo $quote->content;?>
                    </h3>
                    <h5 style="color:green;font-size:15px;">- Par <?php echo $quote->author;?></h5>
                    <div class="tag-wrapper">
                        <?php
                            foreach($quote->tags as $tag){
                                echo '<span class="tag">';
                                echo '<?php echo $tag;?>';
                                echo '</span>';
                            }
                        ?>
                    </div>
                </div>

            
                <?php
            if(isset($_SESSION['email'])&&(!empty($_SESSION['email']))){
                echo '<a href="morpion.php" style="margin-top:30px;"><button type="button" class="but">Pourquoi ne pas jouer au Morpion ?</button></a>';
                }
                else{
                    echo '<h2>Jouez au morpion de DayBreak !!!</h2>';
                    echo '<a href="connect.php" style="margin-top:30px;"><button type="button" class="but">Pourquoi ne pas jouer au Morpion ?</button></a>';
                }
                ?>
            </section>

        </main>

<?php
    require "./include/footer.inc.php";
?>