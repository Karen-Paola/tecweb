<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 2</title>
</head>
<body>
    <?php
    require_once __DIR__.'/menu.php';

    $menu1 = new menu;
    $menu1->cargar_opcion('http://facebook.com',"Facebook");
    $menu1->cargar_opcion('http://instagram.com',"Instagram");
    $menu1->cargar_opcion('http://x.com',"X");
    $menu1->mostrar();  

    ?>
</body>
</html>