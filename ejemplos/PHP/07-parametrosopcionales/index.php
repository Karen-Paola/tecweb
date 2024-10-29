<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 7</title>
</head>
<body>
    <?php

    //use EJEMPLO\POO\Cabecera as Cabecera;
    require_once __DIR__ . '/Cabecera.php';

    /*$cab = new Cabecera('El rincon del programador');
    $cab->graficar();  */

    //echo '<br>';

    $cab1 = new Cabecera('El rincon del programador', 'left');
    $cab1->graficar(); 

    echo '<br>';

    $cab2 = new Cabecera('El rincon del programador', 'right', '#FF0000');
    $cab2->graficar(); 
     
    echo '<br>';

    $cab3 = new Cabecera('El rincon del programador', 'right', '#FF0000', '#FFFF00');
    $cab3->graficar(); 
     
    echo '<br>';


    /*use EJEMPLO\POO\Cabecera2 as Cabecera;
    require_once __DIR__ . '/Cabecera.php';

    $cab = new Cabecera('El rincon del programador', 'center', 'https://cs.buap.mx/');
    $cab->graficar(); */  
    ?>
</body>
</html>