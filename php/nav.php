<header>
    <nav>
        <div class="logo">
            <div class="logo-title">
                <div class="logo-first-title">AgroPlace Iutea</div>
                <div class="subtitle"> Produits agricoles frais</div>
            </div>
            <div class="logo-img">
                <img src="..." alt="...">
            </div>
        </div>
        <div class="links">
            <?php
                session_start();
                if(isset($_SESSION['compte'])){
                    echo "<div class='info_compte'><div>".$_SESSION['compte']['type_compte']."</div><span>".$_SESSION['compte']['nom_compte']."</span></div>";
                    switch ($_SESSION['compte']['type_compte']) {
                        case 'gestionnaire de stock':
                            echo'<a href="stock.php">Stock</a>';
                            echo'<a href="commandesStock.php">commandes</a>';
                            echo'<a href="historiquesCommandeGestionnaireStock.php">historique</a>';
                            echo "<form action='php/connexion.php' method='post'>";
                            echo "<button name='deconnexion'>Déconnexion</button>";
                            echo "</form>";
                            break;

                        case 'administrateur':
                            echo'<a href="index.php">Produits</a>';
                            echo'<a href="panier.php">Panier</a>';
                            echo'<a href="commandesAdmin.php">Mes commandes</a>';
                            echo'<a href="admin.php">admin</a>';
                            echo "<form action='php/connexion.php' method='post'>";
                            echo "<button name='deconnexion'>Déconnexion</button>";
                            echo "</form>";
                            break;
                        
                        default:
                            echo'<a href="index.php">Produits</a>';
                            echo'<a href="panier.php">Panier</a>';
                            echo'<a href="commandesClient.php">Mes commandes</a>';
                            echo "<form action='php/connexion.php' method='post'>";
                            echo "<button name='deconnexion'>Déconnexion</button>";
                            echo "</form>";
                            break;
                    }
                    
                }else{
                echo'<a href="index.php">Produits</a>';
                echo'<a href="panier.php">Panier</a>';
                echo'<a href="connexionCompte.php">Connexion / S\'inscrire</a>';
                }
            ?>

        </div>
    </nav>
</header>