<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test Dao</title>
    </head>
    <body>
        <?php
        require("../includes/fonctions.inc.php");
//        require_once("../modele/dao/DaoInterface.class.php");
//        require_once("../modele/dao/DaoConnexion.class.php");
//        require_once("../modele/dao/DaoCategorie.class.php");
//        require_once("../modele/metier/Categorie.class.php");
//        require_once("../modele/dao/DaoProduit.class.php");
//        require_once("../modele/metier/Produit.class.php");

        $pdo = M_DaoConnexion::connecter();
        
        // Test de M_DaoCategorie
        echo "<h3>Test de DaoCategorie</h3>";

        // Categorie : test de sélection par code
        echo "<p>Categorie : test de sélection par code</p>";
        $uneCateg = M_DaoCategorie::getOneById($pdo,'bul');
        echo $uneCateg;

        // Categorie : test de sélection de tous les enregistrements
        echo "<p>Categorie : test de sélection de tous les enregistrements</p>";
        $lesCategs = M_DaoCategorie::getAll($pdo);
        var_dump($lesCategs);

        
        // Test de M_DaoProduit
        echo "<h3>Test de DaoProduit</h3>";

        // Produit : test de sélection par référence
        echo "<p>Produit : test de sélection par référence</p>";
        $unPdt = M_DaoProduit::getOneById($pdo,'m02');
        echo $unPdt;

        // Produit : test de sélection de tous les enregistrements
        echo "<p>Produit : test de sélection de tous les enregistrements</p>";
        $lesProds = M_DaoProduit::getAll($pdo);
        var_dump($lesProds);
        
        // Produit : tous les produits d'une catégorie
        echo "<p>Produit : tous les produits d'une catégorie</p>";
        $lesProds = M_DaoProduit::getAllByCateg($pdo, 'mas');
        var_dump($lesProds);

        M_DaoConnexion::deconnecter($pdo);               
        
        ?>
    </body>
</html>
