<!--permet d'afficher une page récapitulative sur les informations rentrées-->

<form method="post" action=".?controleur=AdminPersonnes&action=validationCreerPersonne">
    <h1>Informations personnelles</h1>
    <fieldset>
        <legend>Mes informations</legend>
        <label for="civilite">Civilit&eacute; :</label>
        <input type="text" readonly="readonly" name="civilite" id="civilite" value="<?php echo $_POST["civilite"]; ?>"></input><br/>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" readonly="readonly" value="<?php echo $_POST["nom"]; ?>"></input><br/>
        <label for="prenom">Pr&eacute;nom :</label>
        <input type="prenom" name="prenom" id="prenom" readonly="readonly" value="<?php echo $_POST["prenom"]; ?>"></input><br/>
        <label for="mail">E-Mail :</label>
        <input type="text" name="mail" id="mail" readonly="readonly" value="<?php echo  $_POST["mail"]; ?>"></input><br/>
        <label for="tel">Tel :</label>
        <input type="text" name="tel" id="tel" readonly="readonly" value="<?php echo $_POST["tel"]; ?>"></input><br/>
        <?php
        //contenu à afficher en fonction de l'utilisateur
        $role = $_POST["role"];
            if ($role == 4){
                //contenu si c'est un étudiant 
        ?>
                <label for="etudes">Etudes :</label>
                <input type="text" name="etudes" id="etudes" readonly="readonly" value="<?php echo $_POST["etudes"]; ?>"></input><br/>
                <label for="formation">Formation :</label>
                <input type="text" name="formation" id="formation" readonly="readonly" value="<?php echo $_POST["formation"]; ?>"></input><br/>       
                 
        <?php
            }
        ?>
        
        <label for="login">login :</label>
        <input type="text" name="login" id="login" readonly="readonly" value="<?php echo $_POST["login"]; ?>"></input><br/>
        <label for="login">mot de passe :</label>
        <input type="password" name="mdp" id="mdp" readonly="readonly" value="<?php echo $_POST["mdp"]; ?>"></input><br/>
                
    </fieldset>
   
</form>
<?php
if (!is_null($this->lireDonnee('message'))) {
    echo "<strong>".$this->lireDonnee('message')."</strong>";
}
?>