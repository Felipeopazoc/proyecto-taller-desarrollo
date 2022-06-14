<?php

if(!empty($_POST)){
    $inicio = $_POST["inicio"];

    $inicio = (int)$inicio;

    $fin = $_POST["fin"];
    $fin  = (int)$fin;

    if($inicio>=10 && $fin <=3 || $inicio >=1 && $fin<=3){
        echo 1;
        exit;
    }
    echo 0;
    exit;
}

exit;
?>
