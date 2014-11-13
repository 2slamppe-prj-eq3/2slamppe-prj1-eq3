<?php

class M_DaoOrganisation extends M_DaoGenerique {
    
    function __construct() {
        $this->nomTable = "ORGANISATION";
        $this->nomClefPrimaire = "IDORGANISATION";
    }
    
    public function enregistrementVersObjet($unEnregistrement) {
        $retour = new M_Organisation($unEnregistrement['idorganisation'],
                $unEnregistrement['nom_organisation'],
                $unEnregistrement['ville_organisation'],
                $unEnregistrement['adresse_organisation'],
                $unEnregistrement['cp_organisation'],
                $unEnregistrement['tel_organisation'], 
                $unEnregistrement['fax_organisation'], 
                $unEnregistrement['formejuridique'], 
                $unEnregistrement['activite']);
        return $retour;
    }

    public function insert($objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "INSERT INTO $this->nomTable (";
            $sql .= "IDORGANISATION, NOM_ORGANISATION, VILLE_ORGANISATION, ADRESSE_ORGANISATION,";
            $sql .= " CP_ORGANISATION, TEL_ORGANISATION, FAX_ORGANISATION, FORMEJURIDIQUE, ACTIVITE)";
            $sql .= "VALUES (";
            $sql .= ":idorganisation, :nom_organisation, :ville_organisation, :adresse_organisation, :cp_organisation, :tel_organisation, :fax_organisation, :formejuridique, :activite)";
//            var_dump($sql);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // préparer la  liste des paramètres, avec l'identifiant en dernier
            $parametres = $this->objetVersEnregistrement($objetMetier);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public function objetVersEnregistrement($objetMetier) {
        
        // construire un tableau des paramètres d'insertion ou de modification
        // l'ordre des valeurs est important : il correspond à celui des paramètres de la requête SQL
        $retour = array(
            ':idorganisation' => $objetMetier->getIdOrganisation(),
            ':nom_organisation' => $objetMetier->getNom_organisation(),
            ':ville_organisation' => $objetMetier->getVille_organisation(),
            ':adresse_organisation' => $objetMetier->getAdresse_organisation(),
            ':cp_organisation' => $objetMetier->getCp_organisation(),
            ':tel_organisation' => $objetMetier->getTel_organisation(),
            ':fax_organisation' => $objetMetier->getFax_organisation(),
            ':formejuridique' => $objetMetier->getFormejuridique(),
            ':activite' => $objetMetier->getactivite(),
        );
        return $retour;
    }

    function update($idMetier, $objetMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée (paramètres nommés)
            $sql = "UPDATE $this->nomTable SET ";
            $sql .= "IDORGANISATION = :idorganisation, ";
            $sql .= "NOM_ORGANISATION = :nom_organisation, ";
            $sql .= "VILLE_ORGANISATION = :ville_organisation , ";
            $sql .= "ADRESSE_ORGANISATION = :ville_organisation , ";
            $sql .= "CP_ORGANISATION = :cp_organisation , ";
            $sql .= "TEL_ORGANISATION = :tel_organisation , ";
            $sql .= "FAX_ORGANISATION = :fax_organisation , ";
            $sql .= "FORMEJURIDIQUE = :formejuridique , ";
            $sql .= "ACTIVITE = :activite , ";
//            var_dump($sql);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // préparer la  liste des paramètres la valeur de l'identifiant
            //  à prendre en compte est celle qui a été passée en paramètre à la méthode
            $parametres = $this->objetVersEnregistrement($objetMetier);
            $parametres[':id'] = $idMetier;
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $retour = $queryPrepare->execute($parametres);
//            debug_query($sql, $parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

}