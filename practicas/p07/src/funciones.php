<?php
function esMultiploDe5Y7($numero) {
    if(isset($numero)) {
        if ($numero % 5 == 0 && $numero % 7 == 0) {
            echo '<h3>R= El número '.$numero.' SÍ es múltiplo de 5 y 7.</h3>';
        } else {
            echo '<h3>R= El número '.$numero.' NO es múltiplo de 5 y 7.</h3>';
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
    $totalNumeros = $iteraciones*3;
    echo "$totalNumeros\n números obtenidos en $iteraciones\n iteraciones";

}

function encontrarNum($num){
    if (isset($num)){
        $encontrado = false;

    while(!$encontrado){
        $numeroAleatorio = rand(1, 1000);
        if($numeroAleatorio % $num == 0){
            echo "El número aleatorio $numeroAleatorio es múltiplo de $num".'<br>';
            $encontrado = true;
        }
    }
    }
}

function encontrarDoWhile($num){
    if (isset($num)){
        $encontrado = false;
        do {
            $numeroAleatorio = rand(1, 1000);
            if($numeroAleatorio % $num == 0){
                echo 'Usando do-while <br>';
                echo "El número aleatorio $numeroAleatorio es múltiplo de $num";
                $encontrado = true;
            }
        } while (!$encontrado);
    }
}

function arr(){
    $arrNum = array();
    for ($i = 97; $i <=122; $i++){
        $arreglo[$i] = chr($i);
    }
    echo "<table border='1'>"; // Abre la tabla

    foreach ($arreglo as $key => $value) {
        echo "<tr>"; // Se hace una fila
        echo "<td>$key</td>"; // Imprime el índice
        echo "<td>$value</td>"; // Imprime la letra
        echo "</tr>"; // Cierra la fila
    }

    echo "</table>";
}

?>

