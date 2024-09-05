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
        echo '<br>';


        /**2. Proporcionar los valores de $a, $b, $c como sigue:
            $a = “ManejadorSQL”;
            $b = 'MySQL’;
            $c = &$a; */
        echo "<h2>Ejercicio 2: Valores de las variales </h2>";
        $a = 'ManejadorSQL';
        $b = 'MySQL';
        $c = &$a;
        
        //a. Ahora muestra el contenido de cada variable
        echo "<h4>Contenido inicial de las variables:</h4>";
        echo 'Valor de $a: ' . $a . '<br>';
        echo 'Valor de $b: ' . $b . '<br>';
        echo 'Valor de $c (referencia a $a): ' . $c . '<br>';
        
        //b. Agrega al código actual las siguientes asignaciones:
        $a ='PHP server';
        $b = &$a;
            
        //c. Vuelve a mostrar el contenido de cada uno
        echo "<h4>Contenido de las variables (editado):</h4>";
        echo 'Valor de $a: ' . $a . '<br>';
        echo 'Valor de $b: ' . $b . '<br>';
        echo 'Valor de $c (referencia a $a): ' . $c . '<br>';

        //d. Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones
        echo "<h3>Explicación:</h3>";
        echo 'En la segunda asignación el valor de $a cambió a PHP server, $b se convierte en una referencia de $a, 
              por lo que su salida cambió, $a afecta también a $b.<br>';
        echo 'Dado que $c ya era una referencia a $a desde el principio, $c también refleja los cambios en $a.<br>';


        
        /**3. Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo): */
        echo "<h2>Ejercicio 3: Contenido de las variables</h2>";

        $a = 'PHP5';
        echo 'El valor de $a es:'.$a.'<br>';

        $z[] = &$a;
        print_r($z).'<br>'; //para mandar todos los valores del arreglo

        $b = '5a version de PHP';
        echo '<br>';
        echo 'El valor de $b es:'.$b.'<br>';

        $c = $b*10;
        echo 'El valor de $c es:'.$c.'<br>';

        $a .= $b;
        echo 'El valor de $a es:'.$a.'<br>';

        $b *= $c;
        echo 'El valor de $b es:'.$b.'<br>';

        $z[0] = 'MySQL';
        print_r($z).'<br>';

        //4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
        //la matriz $GLOBALS o del modificador global de PHP.
        echo "<h2>Ejercicio 4: Lectura de valores utilizando \$GLOBALS</h2>";
        echo 'El valor de $GLOBALS["a"] es: ' . $GLOBALS['a'] . '<br>';
        echo 'El valor de $GLOBALS["b"] es: ' . $GLOBALS['b'] . '<br>';
        echo 'El valor de $GLOBALS["c"] es: ' . $GLOBALS['c'] . '<br>';
        echo 'Contenido de $GLOBALS["z"]: ';
        print_r($GLOBALS['z']);
        echo '<br>';

        //5. Dar el valor de las variables $a, $b, $c al final del siguiente script:
        echo "<h2>Ejercicio 5: Dar el valor de las variables</h2>";
        $a = '7 personas';
        echo 'La variable $a contiene: '.$a.'<br>';

        $b = (integer) $a; //Toma el 7 porque es el primer número de string
        echo 'La variable $b contiene: '.$b.'<br>';

        $a = '9E3'; 
        echo 'La variable $a contiene: '.$a.'<br>';

        $c = (double) $a; //La cadena "9E3" es notación científica en PHP y se convierte a 9000.0 (9 * 10^3) cuando se convierte a double
        echo 'La variable $c contiene: '.$c.'<br>';
            
            
            
    ?>
</body>
</html>