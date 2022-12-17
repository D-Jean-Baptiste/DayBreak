$(document).ready(function() {

    console.log("Début du programme");

    round=0;
    egal=0;
    

    /* Fonction Jouer */
    $('th').click(function(){

        if($(this).hasClass('X')==false && $(this).hasClass('O')==false){

            if(round%2 == 0){
                console.log("Clique sur X");
                $(this).text('X');
                $(this).css('color','blue');
                $(this).addClass('X');
                round+=1;
                $('p').text("Le tour numéro : "+round);
                
                if(round => 6){
                    verif();
                }
                
                $('h1').text('Joueur O Jouer !');
                $('h1').css('color','blue');
                
                
            }
            
            else{
                console.log("Clique sur O");
                $(this).text('O');
                $(this).css('color','red');
                $(this).addClass('O');
                round+=1;
                $('p').text("Le tour numéro : "+round);
               
                if(round => 6){
                    verif();
                }
                
                $('h1').text('Joueur X Jouer !');
                $('h1').css('color','red');
                
                
            }
        }
        else{
            alert("Veuillez Selectionner une Case Vide")
        }
    })

    

    /* Fonction Vérifier */

    
    function verif(){
        // verif victoire Joueur X
        console.log("verification du Tour");
        
        if( //verif 1eme ligne X
            $(document.getElementById("1")).hasClass("X") &&
        $(document.getElementById("2")).hasClass("X") && 
        $(document.getElementById("3")).hasClass("X"))
        {
            alert("Joueur X a gagner");
            egal+=1;
            restard();
        }

        if( //verif 2eme ligne X
            $(document.getElementById("4")).hasClass("X") &&
        $(document.getElementById("5")).hasClass("X") && 
        $(document.getElementById("6")).hasClass("X"))
        {
            alert("Joueur X a gagner");
            egal+=1;
            restard();
        }

        if( //verif 3eme ligne X
            $(document.getElementById("7")).hasClass("X") &&
        $(document.getElementById("8")).hasClass("X") && 
        $(document.getElementById("9")).hasClass("X"))
        {
            alert("Joueur X a gagner");
            egal+=1;
            restard();
        }

        if( //verif 1er colonne X
            $(document.getElementById("1")).hasClass("X") &&
        $(document.getElementById("4")).hasClass("X") && 
        $(document.getElementById("7")).hasClass("X"))
        {
            alert("Joueur X a gagner");
            egal+=1;
            restard();
        }

        if( //verif 2eme colonne X
            $(document.getElementById("2")).hasClass("X") &&
        $(document.getElementById("5")).hasClass("X") && 
        $(document.getElementById("8")).hasClass("X"))
        {
            alert("Joueur X a gagner");
            egal+=1;
            restard();
        }

        if( //verif 3eme colonne X
            $(document.getElementById("3")).hasClass("X") &&
        $(document.getElementById("6")).hasClass("X") && 
        $(document.getElementById("9")).hasClass("X"))
        {
            alert("Joueur X a gagner");
            egal+=1;
            restard();
        }

        if( //verif diagonal / X
            $(document.getElementById("3")).hasClass("X") &&
        $(document.getElementById("5")).hasClass("X") && 
        $(document.getElementById("7")).hasClass("X"))
        {
            alert("Joueur X a gagner");
            egal+=1;
            restard();
        }

        if( //verif diagonal \ X
            $(document.getElementById("1")).hasClass("X") &&
        $(document.getElementById("5")).hasClass("X") && 
        $(document.getElementById("9")).hasClass("X"))
        {
            alert("Joueur X a gagner");
            egal+=1;
            restard();    
        }

        //Verif Joueur O

        if( //verif 1eme ligne O
            $(document.getElementById("1")).hasClass("O") &&
        $(document.getElementById("2")).hasClass("O") && 
        $(document.getElementById("3")).hasClass("O"))
        {
            alert("Joueur O a gagner");
            egal+=1;
            restard();
        }

        if( //verif 2eme ligne O
            $(document.getElementById("4")).hasClass("O") &&
        $(document.getElementById("5")).hasClass("O") && 
        $(document.getElementById("6")).hasClass("O"))
        {
            alert("Joueur O a gagner");
            egal+=1;
            restard();
        }

        if( //verif 3eme ligne O
            $(document.getElementById("7")).hasClass("O") &&
        $(document.getElementById("8")).hasClass("O") && 
        $(document.getElementById("9")).hasClass("O"))
        {
            alert("Joueur O a gagner");
            egal+=1;
            restard();
        }

        if( //verif 1er colonne O
            $(document.getElementById("1")).hasClass("O") &&
        $(document.getElementById("4")).hasClass("O") && 
        $(document.getElementById("7")).hasClass("O"))
        {
            alert("Joueur O a gagner");
            egal+=1;
            restard();
        }

        if( //verif 2eme colonne O
            $(document.getElementById("2")).hasClass("O") &&
        $(document.getElementById("5")).hasClass("O") && 
        $(document.getElementById("8")).hasClass("O"))
        {
            alert("Joueur O a gagner");
            egal+=1;
            restard();
        }

        if( //verif 3eme colonne O
            $(document.getElementById("3")).hasClass("O") &&
        $(document.getElementById("6")).hasClass("O") && 
        $(document.getElementById("9")).hasClass("O"))
        {
            alert("Joueur O a gagner");
            egal+=1;
            restard();
        }

        if( //verif diagonal / O
            $(document.getElementById("3")).hasClass("O") &&
        $(document.getElementById("5")).hasClass("O") && 
        $(document.getElementById("7")).hasClass("O"))
        {
            alert("Joueur O a gagner");
            egal+=1;
            restard();
        }

        if( //verif diagonal \ O
            $(document.getElementById("1")).hasClass("O") &&
        $(document.getElementById("5")).hasClass("O") && 
        $(document.getElementById("9")).hasClass("O"))
        {
            alert("Joueur O a gagner"); 
            egal+=1;   
            restard();
        }

        // Verif EGALITE

        else{
            if(round==9 && egal==0){
                alert("Egalité !")
                restard();
            }
        }
    }

    function restard(){
        console.log("Recommence, recharge page");
        location.reload();
        setTimeout(location.reload(), 3000);
}
        
    
// theme sombre
$("#sombre").click(function(){
    if ($("body").hasClass("dark")){
        $("body").removeClass("dark");
        $('p').css('color','black');
        $('h2').css('color','black');
        
    }
    else{
        $("body").addClass("dark");
        $('p').css('color','white');
        $('h2').css('color','white');
    }
});

    
        
})