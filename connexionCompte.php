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
        <div class="form">
            <form action="php/connexion" method="post">
                <label for="email_compte">Entrez votre e-mail</label></br>
                <input type="text" id="email_compte" name="email_compte" placeholder="Entrez votre "></br></br>
                <!-- champ pour le ou les prénoms-->
                <label for="mot_de_passe">Entrez votre mot de passe</label></br>
                <input type="text" id="mot_de_passe" name="mot_de_passe" placeholder="Entrez votre mot de passe"></br></br>
                <button name="connexion">Connexion</button>
            </form>
            <a href="inscriptionCompte.php">S'inscrire</a>
        </div>
    </main>
</body>
</html>