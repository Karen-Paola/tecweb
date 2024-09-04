<?php

if (isset($_GET['valor1'])) {
    echo htmlspecialchars($_GET['valor1']);
} else {
    echo 'No se recibió ningún valor.';
}

?>
