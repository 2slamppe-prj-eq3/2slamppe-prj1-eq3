<script language="JavaScript" type="text/javascript" src="../vues/javascript/fonctionsJavascript.inc.js"></script>
<script language="JavaScript" type="text/javascript" src="../bibliotheques/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src=".../vues/javascript/ajax.inc.js"></script>


<!--<form method="post" action=".?controleur=AdminPersonnes&action=validationCreerPersonne" name="CreateUser">
-->    <h1>Ajout d'un stage</h1>
<form method="post" action=".?controleur=utilisateur&action=validerAjoutStage">
    <!-- Choix du type de compte pour afficher les différentes informations pour créer un compte spécifique -->
    <fieldset>

        <?php
        $unUtilisateur = $this->lireDonnee('utilisateur');
        if (MaSession::get('role') == 4) {
            ?>  
            <label for="nom">NOM DE L'ETUDIANT : </label>
            <input type="text" name="nom" id="nom" readonly="readonly" value="<?php echo $unUtilisateur->getNom(); ?>"></input><br/>
            <label for="prenom">PRENOM DE L'ETUDIANT : </label>
            <input type="text" name="prenom" id="prenom" readonly="readonly" value="<?php echo $unUtilisateur->getPrenom(); ?>"></input><br/>
            <?php
        } else {
            ?>
            <label for="nom">NOM DE L'ETUDIANT : </label>
            <label>Nom :</label>
            <input type="text" name="eleveNom" value="<?php echo $unUtilisateur->getNom(); ?>" readonly>
            <label for="prenom">PRENOM DE L'ETUDIANT : </label>
            <input type="text" name="elevePrenom" value="<?php echo $unUtilisateur->getPrenom();?>" readonly>
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
        <!--maitre de stage-->
        <select type="select" name="maitresestage" id="maitredestage">
            <option value=""></option>
        </select>
        <?php
        $nouveau = false;
        ?>
        <input type="button" value="enregistrer un maitre de stage" onclick="<?php $nouveau = true; ?>">
        <?php
        //ca c'est a modifier parce que ca marche pas (undefined index)
        if ($nouveau == true) {
            ?>
            <form method="post" action=".?controleur=AdminPersonnes&action=validationCreerPersonne">
                <fieldset>
                    <legend>Creation maitre de stage</legend>
                    <label for="role">R&ocirc;le :</label>  
                    <input type="text" name="role" id="nom" readonly="readonly" value="5"></input><br/>
                    <label for="civilite">Civilit&eacute; :</label>        
                    <select type="select" name="civilite" id="civilite">
                        <option>Madame</option>
                        <option>Monsieur</option>
                    </select>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom"></input><br/>
                    <label for="prenom">Pr&eacute;nom :</label>
                    <input type="prenom" name="prenom" id="prenom"></input><br/>
                    <label for="mail">E-Mail :</label>
                    <input type="text" name="mail" id="mail"></input><br/>
                    <label for="tel">Tel :</label>
                    <input type="text" name="tel" id="tel"></input><br/>

                </fieldset>
            </form>
            <?php
        }
        ?>
        <!--entreprise
        <label for="entreprise">ENTREPRISE : </label>
        <select type="select" name="entreprise" id="entreprise">
            <option value=""></option>
        </select>
        -->
        <div id="Formulaire_MaitreStage" height="0">
            <fieldset>
                <legend>Choisir l'entreprise :</legend>

                <label for="login">Entreprise :</label>
                <select type ="select" name="entreprise1" id="entreprise1"><!--selecte de choix d'entreprise-->
                    <option value=""></option>

                    <?php
                    //boucle qui marche pas
                    //dommage
                    //foreach ($this->lesEntreprise as $LesEntreprise) { // boucle d'affichage de toute les entreprise
                    // création d'une ligne du selecte 
                    //echo'<option value="' . $LesEntreprise->IDORGANISATION . '">' . $LesEntreprise->NOM_ORGANISATION . '</option>';
                    //echo'<option value="' . $LesEntreprise->getId() . '">' . $LesEntreprise->getNom() . '</option>';
                    //}
                    ?>    
                </select> 

            </fieldset>

        </div>
        <br />

        <input type="button" value="RECAPITULATIF" onclick="gotoUrl('.?controleur=stage&action=recapAjouterStage')">


    </fieldset>

    <?php
    if (!is_null($this->lireDonnee('message'))) {
        echo "<strong>" . $this->lireDonnee('message') . "</strong>";
    }
// message de validation de création ou non 
    if (isset($this->message)) {
        echo "<strong>" . $this->message . "</strong>";
    }
    ?>