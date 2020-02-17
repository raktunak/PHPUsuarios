<?php

echo "<h1>Membres del projecte ".$codi."</h1>";
echo("<table border=0>");
echo("<tr>");
echo("<td>nom</td>");
echo("<td>username</td>");
echo("<td>operacions</td>");
echo("</tr>");


foreach($res as $row) {
      //$user=$this->userproject->getProject($usuaris);
    echo "<tr>"; 

    echo "<td>".$row['nom']."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td><a href='index.php?control=controluserproject&operacio=deleteUserProject&codigoUsuario=".$row['codi']."&codi=".$codi."'>
                 treure</td>";
    echo "</tr>";
    }
    echo("</table>");

    echo('<h1>Usuaris</h1>');
    echo('<form  method="form" action="index.php">');
    foreach($res2 as $row) {
        echo(' <input type="checkbox" id="codigoUsuario" name="codigoUsuarios[]" value="'.$row['codi'].'">
            <label for="codigoUsuario">'.$row['nom'].' ('.$row["username"].')</label><br>');
    }
    echo('<input id="control" name="control" type="hidden" value="controluserproject">');
    echo('<input id="operacio" name="operacio" type="hidden" value="inserUserProject">');
    echo('<input id="codi" name="codi" type="hidden" value="'.$codi.'">');
    echo('<input type="submit" value="Nous membres">');
    echo('</form>');
?>
