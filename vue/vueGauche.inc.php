<ul class="menugauche">
    <p><b>Menu</b></p>
    <li><a href="./index.php" >Accueil</a></li>
    <hr/>
    <b>Nos produits</b>
    <li><a href="./index.php?action=afficherTous" >Tous</a></li>
<?php
    foreach ($listeCateg as $categ) {
        echo "<li><a href=\"./index.php?action=afficherUneCateg&id=".$categ['cat_code']."\" >".$categ['cat_libelle']."</a></li>";
    }
?>
</ul>
