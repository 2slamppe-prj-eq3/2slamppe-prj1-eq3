<?php

/*
 * Création de la classe Stage
 */

class M_Stage {
    
    private $nomE; // nom de l'étudiant
    private $prenomE;                       // prenom de l'etudiant
    private $anneeScol;                     // objet année scolaire
    private $nomMdT;                        // nom maitre de stage
    private $prenomMdT;                     // prenom maitre de stage
    private $professeur;                    // professeur référent
    private $organisation;                  // objet organisation
    private $dateDeb;
    private $dateFin;
    private $ville;
    private $divers;
    
    function __construct($nomE, $prenomE, $anneeScol, $nomMdT, $prenomMdT, $professeur, $organisation, $dateDeb, $dateFin, $ville, $divers) {
        $this->nomE = $nomE;
        $this->prenomE = $prenomE;
        $this->anneeScol = $anneeScol;
        $this->nomMdT = $nomMdT;
        $this->prenomMdT = $prenomMdT;
        $this->professeur = $professeur;
        $this->organisation = $organisation;
        $this->dateDeb = $dateDeb;
        $this->dateFin = $dateFin;
        $this->ville = $ville;
        $this->divers = $divers;
        }
        
        public function getNomE() {
            return $this->nomE;
        }

        public function getPrenomE() {
            return $this->prenomE;
        }

        public function getAnneeScol() {
            return $this->anneeScol;
        }

        public function getNomMdT() {
            return $this->nomMdT;
        }

        public function getPrenomMdT() {
            return $this->prenomMdT;
        }

        public function getProfesseur() {
            return $this->professeur;
        }

        public function getOrganisation() {
            return $this->organisation;
        }

        public function getDateDeb() {
            return $this->dateDeb;
        }

        public function getDateFin() {
            return $this->dateFin;
        }

        public function getVille() {
            return $this->ville;
        }

        public function getDivers() {
            return $this->divers;
        }

        public function setNomE($nomE) {
            $this->nomE = $nomE;
        }

        public function setPrenomE($prenomE) {
            $this->prenomE = $prenomE;
        }

        public function setAnneeScol($anneeScol) {
            $this->date = $anneeScol;
        }

        public function setNomMdT($nomMdT) {
            $this->nomMdT = $nomMdT;
        }

        public function setPrenomMdT($prenomMdT) {
            $this->prenomMdT = $prenomMdT;
        }

        public function setProfesseur($professeur) {
            $this->professeur = $professeur;
        }

        public function setOrganisation($organisation) {
            $this->organisation = $organisation;
        }

        public function setDateDeb($dateDeb) {
            $this->dateDeb = $dateDeb;
        }

        public function setDateFin($dateFin) {
            $this->dateFin = $dateFin;
        }

        public function setVille($ville) {
            $this->ville = $ville;
        }

        public function setDivers($divers) {
            $this->divers = $divers;
        }



}

