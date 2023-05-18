<?php
    require_once("./classes/papas.class.php");
    $url = __DIR__ . "/papas.json";
    $papasList  = [];
    if(file_exists($url)){
        $Papasjson = file_get_contents($url);
        $Papas = json_decode($Papasjson);

        foreach ($Papas as $papas) {
            $item = new Papas(
                $papas->tamaño,
                $papas->P_ingrediente,
                $papas->S_ingrediente,
                $papas->catsup,
                $papas->quesoAm,
                $papas->buffalo,
                $papas->ranch,
                $papas->chipotle,
                $papas->bbq
            );
            array_push($papasList, $item);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="papas.css">
    <title>Papas para ti</title>
</head>
<body>
    <h1 class="titulo">Bienvenido a la pagina de las Papas mas ricas de la Laguna</h1>
    <form method="post" action="confirmacionpapas.php">
        <div class="formulario">
        <legend>Tamaño</legend>
        <select name="tamaño" class="tamaño">
            <option value="chico">Chico 50$</option>
            <option value="mediano">Mediano 70$</option>
            <option value="grande">Grande 90$</option>
        </select>
        <br><br>
        <legend>Primer Ingrediente</legend>
        <select name="P_ingrediente">
            <option value="res">Fajitas</option>
            <option value="boneless">Boneless</option>
            <option value="cerdo">Carnitas</option>
            <option value="pastor">Pastor</option>
        </select>
        <br><br>
        <legend>Segundo Ingrediente</legend>
        <select name="S_ingrediente">
            <option value="res">Fajitas</option>
            <option value="boneless">Boneless</option>
            <option value="cerdo">Carnitas</option>
            <option value="pastor">Pastor</option>
        </select>
        <br><br>
        <legend>Salsas</legend>
        <input type="checkbox" name="catsup" id="catsup">
        <label for="salsas">Catsup</label>
        <br>
        <input type="checkbox" name="quesoAm" id="quesoAm">
        <label for="salsas">Queso Amarillo</label>
        <br>
        <input type="checkbox" name="buffalo" id="buffalo">
        <label for="salsas">Buffalo</label>
        <br>
        <input type="checkbox" name="ranch" id="ranch">
        <label for="salsas">Ranch</label>
        <br>
        <input type="checkbox" name="chipotle" id="chipotle">
        <label for="salsas">Chipotle</label>
        <br>
        <input type="checkbox" name="bbq" id="bbq">
        <label for="salsas">Barbeque</label>
        <br><br>
        <input class="botones" type="reset" name="rst" value="Reset">
        <input class="botones" type="submit" name="ok" value="Enviar">
    </div>
    </form>
    <br><br>
    <h1>Pedidos</h1>
    <table border="1" callspacing="0" callpadding="5">
        <tr>
            <th>Tamaño</th>
            <th>Primer Ingrediente</th>
            <th>Segundo Ingrediente</th>
            <th>Catsup</th>
            <th>Queso Amarillo</th>
            <th>Buffalo</th>
            <th>Ranch</th>
            <th>Chipotle</th>
            <th>Barbeque</th>
        </tr>
        <?php
        foreach($papasList as $Papas){
            $Papas->getPapas();
        }
        ?>
    </table>
    
</body>
</html>
