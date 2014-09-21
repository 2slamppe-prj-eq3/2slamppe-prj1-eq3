<?php
/**
 * Description of M_Categorie
 *
 * @author btssio
 */
class M_Categorie {
    private $code;
    private $libelle;
    
    function __construct($code, $libelle) {
        $this->code = $code;
        $this->libelle = $libelle;
    }
    
    public function getCode() {
        return $this->code;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function __toString() {
        $etat = "objet de type : ".get_class($this);
        $etat .= " - code : ".$this->getCode();
        $etat .= " - libelle : ".$this->getLibelle();
        return $etat;
    }
    
}
