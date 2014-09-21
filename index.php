<?php
    if (isset($_GET['action']) && $_GET['action'] != null) {
        $action = $_GET['action'];
        switch ($action) {
        case 'afficherUn' :
            $page = 'ctrlAfficherUn.inc.php';
            break;
        case 'afficherTous' :
            $page = 'ctrlAfficherTous.inc.php';
            break;
        case 'afficherUneCateg' :
            $page = 'ctrlAfficherUneCateg.inc.php';
            break;
        }
    } else {
        $page = 'ctrlAccueil.inc.php';
    }
    include("./controleur/" . $page);
?>
