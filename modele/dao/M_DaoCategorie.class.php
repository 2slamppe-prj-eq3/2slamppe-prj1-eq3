<?php

class M_DaoCategorie implements M_DaoInterface {
        
    public static function enregistrementVersObjet($unEnregistrement) {
        $retour = new M_Categorie($unEnregistrement['cat_code'], $unEnregistrement['cat_libelle']);
        return $retour;        
    }

    public static function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':code' => $objetMetier->getCode(),
            ':libelle' => $objetMetier->getLibelle()
        );
        return $retour;
    }
    
    public static function getAll($pdo) {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM categorie";
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
            $sql = "SELECT * FROM categorie WHERE cat_code = ?";
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
        return FALSE;
    }

    public static function delete($pdo, $idMetier) {
        
    }

}
