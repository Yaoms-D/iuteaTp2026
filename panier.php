<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        include('php/nav.php') ;
    ?>
    <main>
        <div class="title-commande">
            <div class="sout-titre">
                <h2>pannier</h2>
                <div id="nombre-articles"></div>
            </div>
            <a href="index.php">Continuer mes achats</a>
        </div>

        <div id="commande-et-formulaire">
            <div id="commande">

            </div>
            <div id="formulaire">
                <h3 id="titre-formulaire"></h3>
                <div id="resume-commande">
                    
                </div>
                <div id= "total-formulaire">
                    <div id="label">Total</div> <div id="total-commande"></div>
                </div>
                <a href="connexionCompte.php" class="se-connecter">Se connecter pour commander</a>
                <p>La connexion est requise pour valider votre commande</p>
            </div>
        </div>
        
    </main>
    <script src="js/panier.js" type="module"></script>
</body>
</html>