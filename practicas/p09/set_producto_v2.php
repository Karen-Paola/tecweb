<?php
// Conectar a la base de datos
$link = new mysqli('localhost', 'root', '12345678a', 'marketzone');

// Comprobar la conexión
if ($link->connect_errno) {
    die('<p>Falló la conexión a la base de datos: ' . $link->connect_error . '</p>');
}

// Obtener los datos enviados por POST desde el formulario
$nombre  = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$marca   = isset($_POST['marca']) ? trim($_POST['marca']) : '';
$modelo  = isset($_POST['modelo']) ? trim($_POST['modelo']) : '';
$precio  = isset($_POST['precio']) ? (float)$_POST['precio'] : 0.0;
$detalles = isset($_POST['detalles']) ? trim($_POST['detalles']) : '';
$unidades = isset($_POST['unidades']) ? (int)$_POST['unidades'] : 0;
$imagen  = isset($_POST['imagen']) ? trim($_POST['imagen']) : '';


// Manejo de la imagen
// Si no se proporciona una ruta de imagen, asignar una predeterminada
if (empty($imagen)) {
    $imagen = './img/img.png'; // Ruta de la imagen predeterminada
}


// Validar que los campos obligatorios no estén vacíos
/*if (empty($nombre) || empty($marca) || empty($modelo)) {
    die('<p>Error: Todos los campos (nombre, marca, modelo) son obligatorios.</p>');
}*/

// Preparar la consulta para verificar si ya existe el producto
$sql_check = "SELECT * FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?";

// Preparar la sentencia
$stmt_check = $link->prepare($sql_check);
$stmt_check->bind_param('sss', $nombre, $marca, $modelo);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

// Comprobar si ya existe el producto
if ($result_check->num_rows > 0) {
    die('<p>Error: El producto con el mismo nombre, marca y modelo ya existe en la base de datos.</p>');
}

// Si no existe, proceder a insertar los datos
/*$sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
               VALUES (?, ?, ?, ?, ?, ?, ?, 0)";*/

$sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
               VALUES (?, ?, ?, ?, ?, ?, ?)";

// Preparar la sentencia
$stmt_insert = $link->prepare($sql_insert);
$stmt_insert->bind_param('sssdsis', $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen);

// Ejecutar la consulta de inserción
if ($stmt_insert->execute()) {
    // Obtener el ID del producto insertado
    $id_producto = $stmt_insert->insert_id;

    // Mostrar el resumen de los datos insertados
    echo "<h1>Producto registrado con éxito</h1>";
    echo "<p><strong>ID del producto:</strong> {$id_producto}</p>";
    echo "<p><strong>Nombre:</strong> {$nombre}</p>";
    echo "<p><strong>Marca:</strong> {$marca}</p>";
    echo "<p><strong>Modelo:</strong> {$modelo}</p>";
    echo "<p><strong>Precio:</strong> {$precio}</p>";
    echo "<p><strong>Detalles:</strong> {$detalles}</p>";
    echo "<p><strong>Unidades:</strong> {$unidades}</p>";
    echo "<p><strong>Imagen:</strong> {$imagen}</p>";
    echo "<p><strong>Eliminado:</strong> 0 (No eliminado)</p>";
} else {
    // Mostrar mensaje de error si la inserción falla
    echo "<p>Error: No se pudo insertar el producto. Por favor, inténtelo de nuevo.</p>";
}



// Cerrar la conexión y liberar recursos
$stmt_check->close();
$stmt_insert->close();
$link->close();
?>
