<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manejo de variables</title>
</head>
<body>
    <?php
        //1. Determina cuál de las siguientes variables son válidas y explica por qué:
        //$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5
        echo "<h2>Ejercicio 1: Variables válidas</h2>";
        $_myvar = 'a';
        $_7var = 'b';
        // myvar = 'c';
        $myvar = 'd';
        $var7 = 'e';
        $_element1 = 'f';
        // $house*5 = 'g';

        echo '<ul>';
        echo '<li>La variable $_myvar es válida. Empieza con un guion bajo (_), seguido de un 
              nombre que puede incluir letras y guiones bajos. Su salida es: '.$_myvar.'</li>';
        echo '<li>La variable $_7var es válida. Empieza con un guion bajo (_). Su salida es: '.$_7var.'</li>';
        echo '<li>La variable myvar no es válida. No empieza con $.</li>';
        echo '<li>La variable $myvar es válida. Empieza con una letra a-z, A-Z. Su salida es: '.$myvar.'</li>';
        echo '<li>La variable $var7 es válida. Empieza con una letra a-z, A-Z. Su salida es: '.$var7.'</li>';
        echo '<li>La variable $_element1 es válida. Empieza con un guion bajo (_). Su salida es: '.$_element1.'</li>';
        echo '<li>La variable $house*5 no es válida. Contiene un * que es un carácter especial y no está 
              permitido en los nombres de variables en PHP.</li>';
        echo '</ul>';

    ?>
</body>
</html>