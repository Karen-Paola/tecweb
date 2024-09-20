<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Manejo de variables</title>
</head>
<body>
    <?php
        echo "<h2>Ejercicio 1: Variables válidas</h2>";
        $_myvar = 'a';
        $_7var = 'b';
        $myvar = 'd';
        $var7 = 'e';
        $_element1 = 'f';

        echo '<ul>';
        echo '<li>La variable $_myvar es valida. Empieza con un guion bajo (_), seguido de un nombre que puede incluir letras y guiones bajos. Su salida es: '.$_myvar.'</li>';
        echo '<li>La variable $_7var es valida. Empieza con un guion bajo (_). Su salida es: '.$_7var.'</li>';
        echo '<li>La variable myvar no es valida. No empieza con $.</li>';
        echo '<li>La variable $myvar es valida. Empieza con una letra a-z, A-Z. Su salida es: '.$myvar.'</li>';
        echo '<li>La variable $var7 es valida. Empieza con una letra a-z, A-Z. Su salida es: '.$var7.'</li>';
        echo '<li>La variable $_element1 es valida. Empieza con un guion bajo (_). Su salida es: '.$_element1.'</li>';
        echo '<li>La variable $house*5 no es valida. Contiene un * que es un carácter especial y no está 
              permitido en los nombres de variables en PHP.</li>';
        echo '</ul>';

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
        echo '<p>Valor de $a: ' . $a . '</p>';
        echo '<p>Valor de $b: ' . $b . '</p>';
        echo '<p>Valor de $c (referencia a $a): ' . $c . '</p>';
        
        //b. Agrega al código actual las siguientes asignaciones:
        $a ='PHP server';
        $b = &$a;
            
        //c. Vuelve a mostrar el contenido de cada uno
        echo "<h4>Contenido de las variables (editado):</h4>";
        echo '<p>Valor de $a: ' . $a . '</p>';
        echo '<p>Valor de $b: ' . $b . '</p>';
        echo '<p>Valor de $c (referencia a $a): ' . $c . '</p>';

        //d. Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones
        echo "<h3>Explicación:</h3>";
        echo '<p>En la segunda asignación el valor de $a cambió a PHP server, $b se convierte en una referencia de $a, 
              por lo que su salida cambió, $a afecta también a $b.</p>';
        echo '<p>Dado que $c ya era una referencia a $a desde el principio, $c también refleja los cambios en $a.</p>';

        /**3. Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo): */
        echo "<h2>Ejercicio 3: Contenido de las variables</h2>";

        $a = 'PHP5';
        echo '<p>El valor de $a es:'.$a.'</p>';

        $z[] = &$a;
        echo '<p>';
        print_r($z); // Para mostrar todos los valores del arreglo
        echo '</p>';

        $b = '5a version de PHP';

        echo '<p>El valor de $b es: '.$b.'</p>';

        $c = (integer)$b*10;
        echo '<p>El valor de $c es:'.$c.'</p>';

        $a .= $b;
        echo '<p>El valor de $a es:'.$a.'</p>';

        $b_numeric = (int)$b;
        $b_numeric *c;

        //$b *= $c;
        echo '<p>El valor de $b es:'.$b.'</p>';

        $z[0] = 'MySQL';
        echo '<p>';
        print_r($z);
        echo '</p>';



        //4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
        //la matriz $GLOBALS o del modificador global de PHP.
        echo "<h2>Ejercicio 4: Lectura de valores utilizando GLOBALS</h2>";
        echo '<p>El valor de $GLOBALS["a"] es: ' . $GLOBALS['a'] . '</p>';
        echo '<p>El valor de $GLOBALS["b"] es: ' . $GLOBALS['b'] . '</p>';
        echo '<p>El valor de $GLOBALS["c"] es: ' . $GLOBALS['c'] . '</p>';
        echo '<p>Contenido de $GLOBALS["z"]: ';
        print_r($GLOBALS['z']);


        //5. Dar el valor de las variables $a, $b, $c al final del siguiente script:
        echo '<h3>Ejercicio 5: Dar el valor de las variables</h3>';
        $a = '7 personas';
        echo 'La variable $a contiene: '.$a;
        echo '<br />';

        $b = (integer) $a; //Toma el 7 porque es el primer número de string
        echo 'La variable $b contiene: '.$b;
        echo '<br />';

        $a = '9E3'; 
        echo 'La variable $a contiene: '.$a;
        echo '<br />';

        $c = (double) $a; //La cadena "9E3" es notación científica en PHP y se convierte a 9000.0 (9 * 10^3) cuando se convierte a double
        echo 'La variable $c contiene: '.$c;
            
        /**6. Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
            usando la función var_dump(<datos>).
            Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
            en uno que se pueda mostrar con un echo: */
        echo '<h2>Ejercicio 6: Dar y comprobar el valor booleano</h2>';
        $a = '0';
        $b = 'TRUE';
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b); 

        echo 'Valor de $a: ';
        var_dump((bool)$a); 
        echo '<br />';
        
        echo 'Valor de $b: ';
        var_dump((bool)$b);
        echo '<br />';

        echo 'Valor de $c: ';
        var_dump($c); 
        echo '<br />';
        
        echo 'Valor de $d: ';
        var_dump($d);
        echo '<br />';

        echo 'Valor de $e: ';
        var_dump($e); 
        echo '<br />';
        
        echo 'Valor de $f: ';
        var_dump($f);

        //7. Usando la variable predefinida $_SERVER, determina lo siguiente:
        //a. La versión de Apache y PHP
        echo '<h2>Ejercicio 7: Usando $_SERVER</h2>';
        //Versión de apache
        $apache_version = $_SERVER['SERVER_SOFTWARE'];
        echo 'Versión de Apache: ' . $apache_version;
        echo '<br />';
        // Obtener la versión de PHP
        $php_version = phpversion();
        echo 'Versión de PHP: ' . $php_version;
        echo '<br />';
        //b. El nombre del sistema operativo (servidor)
        $server_sistema = php_uname();
        echo 'Sistema operativo del servidor: ' . $server_sistema;
        echo '<br />';
        
        //c. El idioma del navegador (cliente).
        $idioma_navegador = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        echo 'Idioma del navegador: '.$idioma_navegador;
        echo '<br />';
    ?>
</body>
</html>
