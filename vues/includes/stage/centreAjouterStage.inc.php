<script language="JavaScript" type="text/javascript" src="../vues/javascript/fonctionsJavascript.inc.js"></script>
<script language="JavaScript" type="text/javascript" src="../bibliotheques/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src=".../vues/javascript/ajax.inc.js"></script>


<!--<form method="post" action=".?controleur=AdminPersonnes&action=validationCreerPersonne" name="CreateUser">
-->    <h1>Ajout d'un stage</h1>
    <!-- Choix du type de compte pour afficher les différentes informations pour créer un compte spécifique -->
    <fieldset>
        
        <?php
//            require_once("../../includes/parametres.inc.php");
//            require_once("../../includes/fonctions.inc.php");
//            require_once("../../../modeles/dao/M_DaoPersonne.class.php");
//            require_once("../../../modeles/dao/M_DaoGenerique.class.php");
            $dao = new M_DaoPersonne();
            $dao->connecter();
            //recupere le nom 
            //$nom=(MaSession::get('nom'));
            //récupère l'id du role
            //$idRole=(MaSession::get('role'));
            //var_dump($idRole);
            //$idRole=4;
            //$nom="robert";
            //faire la fonction qui chope les profs dans la base de données
            if(MaSession::get('role') == 4){
         ?>  
         <label for="nom">NOM DE L'ETUDIANT : </label>
         <input type="text" name="nom" id="nom" disabled="true" value="<?php MaSession::get('nom') ?>"></input><br/>
         <label for="prenom">PRENOM DE L'ETUDIANT : </label>
         <input type="text" name="prenom" id="prenom" disabled="true" value="<?php MaSession::get('prenom') ?>"></input><br/>
         <?php
            }else{
         ?>
         <label for="nom">NOM DE L'ETUDIANT : </label>
         <input type="text" name="nom" id="nom"></input><br/>
         <label for="prenom">PRENOM DE L'ETUDIANT : </label>
         <input type="text" name="prenom" id="prenom"></input><br/>
        <?php
            }
         ?>
        <label for="datedebut">SAISISSEZ LA DATE DE DEBUT (au format yyyy-mm-dd): </label>
        <input type="text" name="datedebut"></input><br/>
        <label for="datedebut">SAISISSEZ LA DATE DE FIN (au format yyyy-mm-dd): </label>
        <input type="text" name="datefin"></input><br/>
        <label for="annee">Année scolaire : </label>
        <input type="text" name="anneescolaire" id="date"></input><br/>
        <!--jusque la -->
        <label for="maitredestage">Maitre de stage : </label>

        <select type="select" name="maitresestage" id="maitredestage">
            <option value=""></option>
            <?php
            foreach ($this->lireDonnee('lesRoles') as $role) {
            echo'<option value="' . $role->getId() . '">' . $role->getLibelle() . '</option>';
            }
            ?>
        </select>
        

    </fieldset>

