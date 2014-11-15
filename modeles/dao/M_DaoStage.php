<?php

class M_DaoStage extends M_DaoGenerique {
    
    function __construct() {
        $this->nomTable = "STAGE";
        $this->nomClefPrimaire = "IDSTAGE";
    }
    
    public function enregistrementVersObjet($unEnregistrement) {
        // on instancie l'objet organisation s'il y a lieu
        $l_Orga = null;
        if (isset($unEnregistrement['IDORGANISATION'])) {
            $daoOrganisation = new M_DaoOrganisation();
            $daoOrganisation->setPdo($this->pdo);
            $l_Orga = $daoOrganisation->getOneById($enreg['ID_ORGANISATION']);
        }
        
        // on instancie l'objet anneescol
        $anneeScol = null;
        if (isset($unEnregistrement['ANNEESCOL'])) {
            $daoAnneeScol = new M_DaoAnneeScol();
            $daoAnneeScol->setPdo($this->pdo);
            $anneeScol = $daoAnneeScol->getOneById($enreg['ANNEESCOL']);
        }
        
        // on construit l'objet Personne 
    $retour = new M_Stage($unEnregistrement['NOM'], $unEnregistrement['PRENOM'], $anneeScol, $nomMdT, $prenomMdT, $professeur, $organisation, $dateDeb, $dateFin, $ville, $divers);
        return $retour;
    }

    public function insert($objetMetier) {
        
    }

    public function objetVersEnregistrement($objetMetier) {
        
    }

    public function update($idMetier, $objetMetier) {
        
    }

}



