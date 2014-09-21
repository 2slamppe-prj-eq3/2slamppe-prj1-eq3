<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Liste des cat&eacute;gories</h2>
        <div id="conteneur" >
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo "<a href=\"categ" . $i . ".php\">cat&eacute;gorie num. " . $i . "</a><br/>\n";
            }
            ?>
        </div>
    </body>
</html>
