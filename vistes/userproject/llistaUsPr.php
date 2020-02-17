<?php
        echo "<a href='index.php?control=controlprojectes&operacio=showformnew'>Nou</a>";
        echo $codiUser;
      // print_r($codisP);
       // print_r($projectes);

       echo "<table border=0>";
       echo "<tr>"; 
       echo "<td>codig</td>";
       echo "<td>nom</td>";
       echo "<td>descripcio</td>";
       echo "<td>dataInici</td>";
       echo "<td>dataFi</td>";
       echo "<td>estat</td>";
       echo "<td>equip</td>";
       echo "</tr>";




        foreach($codisP as $codi){
           	foreach($projectes as $projecte){ 
                if($codi["codiprojecte"] == $projecte["codi"]){
                   // echo $projecte["nom"]."</br>";
                   // echo($users["nom"]."   ".$users["cognoms"]."  (".$users["username"].")  <a href='index.php?control=controluserproject&operacio=delete&codi=".$id."&codiuser=".$users["codi"]."'>Borrar</a><br>");
                    echo "<tr>"; 
                    echo "<td>".$projecte['codi']."</td>";
                    echo "<td>".$projecte['nom']."</td>";
                    echo "<td>".$projecte['descripcio']."</td>";
                    echo "<td>".$projecte['dataInici']."</td>";
                    echo "<td>".$projecte['dataFi']."</td>";
                    echo "<td>".$projecte['estat']."</td>";
                    echo "<td><a href='index.php?control=controluserproject&operacio=usuarisPro&codiProject=".$projecte['codi']."&codiUser=".$codiUser."'>
                     Equip</td>";
		            echo "</tr>";
                }
               
            }
        }
        echo "</table>";
        


	/*echo "<table border=1>";
    	foreach($res2 as $projecte) {
		echo "<tr>"; 
		echo "<td>".$projecte['codi']."</td>";
		echo "<td>".$projecte['nom']."</td>";
		echo "<td>".$projecte['descripcio']."</td>";
		echo "<td>".$projecte['dataInici']."</td>";
		echo "<td>".$projecte['dataFi']."</td>";
		echo "<td>".$projecte['estat']."</td>";
		
		echo "<td><a href='index.php?control=controlprojectes&operacio=delete&codi=".$projecte['codi']."'>
                     Esborrar</td>";
		echo "<td><a href='index.php?control=controlprojectes&operacio=showformupdate&codi=".$projecte['codi']."'>
                     Actualitzar</td>";
		echo "<td><a href='index.php?control=controluserproject&codi=".$projecte['codi']."'>
                     Equip</td>";
		echo "</tr>";
        }
        echo "</table>";

        if(isset($_SESSION['missatge'])) {
			echo $_SESSION['missatge'];
			unset($_SESSION['missatge']);
		}*/
?>
