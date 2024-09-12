    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $edad = isset($_POST['edad']) ? intval($_POST['edad']) : 0;
            $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';

            // Verificar el rango de edad y el sexo
            if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) {
                echo '<p>Bienvenida, usted está en el rango de edad permitido.</p>';
            } else {
                echo '<p>Lo sentimos, usted no cumple con los requisitos de edad o sexo.</p>';
            }
        } else {
            echo '<p>Error: Solicitud no válida.</p>';
        }
    ?>
    </body>
    </html>