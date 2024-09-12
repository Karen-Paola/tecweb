<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
    include 'src/funciones.php';
    esMultiploDe5Y7($_GET['numero']);
    ?>

    <h2>Ejercicio 2</h2>
    <p>Secuencia de números aleatorios<p>
    <?php
    generarMatriz(3);
    ?>

    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, 
    pero que además sea múltiplo de un número dado.<p>
    <?php
    encontrarNum($_GET['numero']);
    encontrarDoWhile($_GET['numero']);
    ?>

    <h2>Ejercicio 4</h2>
    <p>Arreglo cuyos valores son valores de la 'a' a la 'z'<p>
    <?php
    arr(3);
    ?>

    <h2>Ejercicio 5 formulario</h2>
    <form action="resultado.php" method="post"> 
        Edad: <input type="number" name="edad"><br>
        Sexo:
        <select name="sexo" required>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select><br><br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form> 
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>

</body>
</html>