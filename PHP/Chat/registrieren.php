<?php
    $Namen = array("Robin", "Michel", "Till E.","Fabian","Nick","Nils","Jannis B.","Jannis K.","Janis U.","Fynn","Max A.","Max So.","Max Sa.","Kai","Jonathan","Anton","David","Tim","Mika","Jarne","Angelika","Svea","Max W.","Till K.","Joren"."Antonia","Lea","Herr Bierhaus");
    if(in_array($_POST["Name"],$Namen)){
        $Benutzer = fopen("Benutzer.txt","a");
        fwrite($Benutzer,$_POST["Name"]."|".$_POST["Passwort"] . "\n");
        fclose($Benutzer);
    }
    else{
        echo "Du hast einen nicht in der Liste enthaltenen Namen genommen";
    }
?>