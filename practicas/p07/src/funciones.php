<?php
function esMultiploDe5Y7($numero) {
    if(isset($_GET['numero']))
        {
            $num = $numero;
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
}

function generarMatriz($filas) {
    $matriz = [];
    $iteraciones = 0;

    while (count($matriz) < $filas) {
        $num1 = rand(1, 1000); //Genera números aleatorios
        $num2 = rand(1, 1000);
        $num3 = rand(1, 1000);
        $iteraciones++;

        if (($num1 % 2 != 0) && ($num2 % 2 == 0) && ($num3 % 2 != 0)) {
            $matriz[] = [$num1, $num2, $num3];
        }
    }

    echo "Matriz generada:\n";
    echo '<br>';
    foreach ($matriz as $fila) {
        echo implode(', ', $fila) . "\n";
        echo '<br>';
    }

    echo "Total de iteraciones: $iteraciones\n";
}

// Llamamos a la función con el número de filas deseado
generarMatriz(4);
?>
