<?php
      echo   $codiProject."</br>";
      echo   $codiUser;
      //print_r( $codigosU);
     // print_r( $usuaris);

  
       foreach($codigosU as $codi){
              foreach($usuaris as $usuari){ 
               if($codi["codiusuari"] == $usuari["codi"]){
                   echo $usuari['email']."</br>";
                  
               }
              
           }
       }
       echo "</table>";
