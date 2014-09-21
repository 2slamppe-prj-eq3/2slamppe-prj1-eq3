<?php
    include_once("./modele/modele.inc.php");
    if (!isset($connection) || $connection != null) {
        $connexion = connecter();
    }
    if ($connexion ) {
        $listeCateg= getListeCategoriesProduits($connexion);
    }

    $titre="La fleur and co";
    $entete= "./vue/vueEntete.inc.php";
    $gauche= "./vue/vueGauche.inc.php";
    $centre= "./vue/vueCentreAccueil.inc.php";
    $pied= "./vue/vuePied.inc.php";
    include("./vue/template.inc.php");
?>
