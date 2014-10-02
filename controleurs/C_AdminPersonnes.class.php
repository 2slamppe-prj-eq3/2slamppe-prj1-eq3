<?php


/**
 * Description of C_AdminPersonnes
 * CRUD Personnes
 * @author btssio
 */
class C_AdminPersonnes extends C_ControleurGenerique {
    // Fonction d'affichage du formulaire de création d'une personne
    function creerPersonne(){
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Cr&eacute;ation d\'une personne');
        // ... depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
       
        // Mémoriser la liste des spécialités disponibles
        $daoSpecialite = new M_DaoSpecialite();
        $daoSpecialite->setPdo($pdo);
        $this->vue->ecrireDonnee('lesSpecialites', $daoSpecialite->getAll());
               
        // Mémoriser la liste des rôles disponibles
        $daoRole = new M_DaoRole();
        $daoRole->setPdo($pdo);
        $this->vue->ecrireDonnee('lesRoles', $daoRole->getAll());
        
        $this->vue->ecrireDonnee('loginAuthentification',MaSession::get('login'));       
        $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreCreerPersonne.inc.php");
               
        $this->vue->afficher();
    }
    
    //validation de création d'utilisateur 
    function validationcreerPersonne(){
        
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "'Validation cr&eacute;ation de l'utilisateur'");
        // connection à la BDD
        
        //récupération données utilisateur
//        $id;
//        $utilisateur->setId($_POST["id"]);
        /*$utilisateur->setSpecialite($_POST["option"]);  
        $utilisateur->setRole($role);
        $utilisateur->setCivilite($_POST["civilite"]);
        $utilisateur->setNom($_POST["nom"]);
        $utilisateur->setPrenom($_POST["prenom"]);
        $utilisateur->setNumTel($_POST["tel"]);
        $utilisateur->setMail($_POST["mail"]);
        $utilisateur->setMobile($_POST["telP"]);
        $utilisateur->setEtudes($_POST["etudes"]);
        $utilisateur->setFormation($_POST["formation"]);
        $utilisateur->setLogin($_POST["login"]);
        $utilisateur->setMdp($_POST["mdp"]);
        $nomTable = "PERSONNE";
        $ok = $daoPers->insert($nomTable, $utilisateur);*/
        
        $idRole = $_POST["role"];
        $role = new M_Role(null, null, null);
        
        $daoRole = new M_DaoRole();
        $daoRole->connecter();
        $pdo = $daoRole->getPdo();
        $role= $daoRole->selectOne($idRole);
        
        $specialite = $_POST["option"];
        $civilite = $_POST["civilite"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $numTel = $_POST["tel"];
        $mail = $_POST["mail"];
        $mobile = $_POST["telP"];
        $etudes = $_POST["etudes"];
        $formation = $_POST["formation"];
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        
        $unePersonne = new M_Personne(null, $specialite, $role, $civilite, $nom, $prenom, $numTel, $mail, $mobile, $etudes, $formation, $login, $mdp);
        
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
        $daoPers ->insert($unePersonne);
        
    
    }
}
