<?php

class DaoProduit implements DaoInterface {

    public static function enregistrementVersObjet($enreg) {
        // récupération de l'objet Categorie d'après son code
        $codeCateg=   $enreg['pdt_categorie'];
        $pdo = DaoConnexion::connecter();
        $uneCateg = DaoCategorie::getOneById($pdo, $codeCateg);
        DaoConnexion::deconnecter($pdo);
        $retour = new Produit($enreg['pdt_ref'], $enreg['pdt_designation'], $enreg['pdt_prix'], $enreg['pdt_image'], $uneCateg );
        return $retour;        
    }

    public static function objetVersEnregistrement($objetMetier) {
        // récupération du code de la catégorie
        $codeCat = NULL;
        $laCateg = $objetMetier->getCategorie();
        if (!is_null($laCateg)){
            $codeCat = $laCateg->getCode();
        }
        $retour = array(
            ':ref' => $objetMetier->getRef(),
            ':designation' => $objetMetier->getDesignation(),
            ':prix' => $objetMetier->getPrix(),
            ':image' => $objetMetier->getImage(),
            ':categorie' => $codeCat
        );
        return $retour;
    }

    public static function getAll($pdo) {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM produit";
        try {
            // préparer la requête PDO
            $queryPrepare = $pdo->prepare($sql);
            // exécuter la requête PDO
            if ($queryPrepare->execute()) {
                // si la requête réussit :
                // initialiser le tableau d'objets à retourner
                $retour = array();
                // pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    // construir un objet métier correspondant
                    $unObjetMetier = self::enregistrementVersObjet($enregistrement);
                    // ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class() . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public static function getOneById($pdo, $valeurClePrimaire) {
        $retour = null;
        try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "SELECT * FROM produit WHERE pdt_ref = ?";
            // préparer la requête PDO
            $queryPrepare = $pdo->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            if ($queryPrepare->execute(array($valeurClePrimaire))) {
                // si la requête réussit :
                // extraire l'enregistrement retourné par la requête
                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                // construire l'objet métier correspondant
                $retour = self::enregistrementVersObjet($enregistrement);
            }
        } catch (PDOException $e) {
            echo get_class() . ' - '.__METHOD__ . ' : '. $e->getMessage();
        }
        return $retour;
    }

    public static function insert($pdo, $objetMetier) {
        return FALSE;
    }

    public static function update($pdo, $idMetier, $objetMetier) {
        
    }

    public static function delete($pdo, $idMetier) {
        return FALSE;
    }

    /**
     * retourne les produits d'une catégorie donnée
     * @param PDO $pdo : connexion
     * @param string $codeCat
     * @return Array de Produit(s)
     */
    public static function getAllByCateg($pdo, $codeCat) {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM produit WHERE pdt_categorie=?";
        try {
            // préparer la requête PDO
            $queryPrepare = $pdo->prepare($sql);
            // exécuter la requête PDO
            if ($queryPrepare->execute(array($codeCat))) {
                // si la requête réussit :
                // initialiser le tableau d'objets à retourner
                $retour = array();
                // pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    // construir un objet métier correspondant
                    $unObjetMetier = self::enregistrementVersObjet($enregistrement);
                    // ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - '.__METHOD__ . ' : '. $e->getMessage();
        }
        return $retour;
    }
    
    
}
