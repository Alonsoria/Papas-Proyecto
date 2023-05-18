<?php
    if(isset($_POST['ok'])){
        require_once('./classes/papas.class.php');

        $tamaño = $_POST['tamaño'];
        $P_ingrediente = $_POST['P_ingrediente'];
        $S_ingrediente = $_POST['S_ingrediente'];
        $catsup = $_POST['catsup'];
        $quesoAm = $_POST['quesoAm'];
        $buffalo = $_POST['buffalo'];
        $ranch = $_POST['ranch'];
        $chipotle = $_POST['chipotle'];
        $bbq = $_POST['bbq'];

        $Papas1 = new Papas($tamaño, $P_ingrediente, $S_ingrediente, $catsup, $quesoAm, $buffalo, $ranch, $chipotle, $bbq);
        $Papasjson = json_encode($Papas1, JSON_PRETTY_PRINT);
    
    $archivo = __DIR__ . "/papas.json";
    if(!file_exists($archivo)){
        $file = fopen ($archivo , "w");
        fwrite($file, "[\n");
    }
    else{
        $file = fopen($archivo, "c");
        fseek($file, -2, SEEK_END);
        fwrite($file, ",\n");
    }    
    fwrite($file, $Papasjson);
    fwrite($file, "\n]");
    fclose($file);
    echo("Su pedido se ha registrado exitosamente");
    header("refresh:5; url='papas.php'");

    }
    else{
        echo("Ocurrio un error");
        header("refresh:5; url='papas.php'");
    }
?>