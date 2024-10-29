<?php
include_once __DIR__.'/database.php';

// Obtener la información del producto enviada en el cuerpo de la solicitud
$producto = file_get_contents('php://input');

// Iniciar una respuesta por defecto
$data = [
    'status' => 'error',
    'message' => 'Error en la actualización del producto'
];

// Asegurarse de que el producto contiene datos antes de continuar
if (!empty($producto)) {
    // Convertir el JSON recibido a un objeto PHP
    $jsonOBJ = json_decode($producto);

    // Verificar que todos los campos necesarios existen y no están vacíos
    if (isset($jsonOBJ->id, $jsonOBJ->nombre, $jsonOBJ->marca, $jsonOBJ->modelo, $jsonOBJ->precio, $jsonOBJ->unidades)) {
        
        // Establecer el conjunto de caracteres a UTF-8
        $conexion->set_charset("utf8");

        // Sanitizar y asignar las variables para la consulta
        $id = $conexion->real_escape_string($jsonOBJ->id);
        $nombre = $conexion->real_escape_string($jsonOBJ->nombre);
        $marca = $conexion->real_escape_string($jsonOBJ->marca);
        $modelo = $conexion->real_escape_string($jsonOBJ->modelo);
        $precio = floatval($jsonOBJ->precio);
        $detalles = $conexion->real_escape_string($jsonOBJ->detalles);
        $unidades = intval($jsonOBJ->unidades);
        $imagen = $conexion->real_escape_string($jsonOBJ->imagen);

        // Construir la consulta de actualización del producto
        $sql = "UPDATE productos 
                SET nombre = '$nombre', 
                    marca = '$marca', 
                    modelo = '$modelo', 
                    precio = $precio, 
                    detalles = '$detalles', 
                    unidades = $unidades, 
                    imagen = '$imagen' 
                WHERE id = '$id' AND eliminado = 0";

        // Ejecutar la consulta y verificar el resultado
        if ($conexion->query($sql)) {
            $data['status'] = 'success';
            $data['message'] = 'Producto actualizado correctamente';
        } else {
            // Respuesta en caso de error en la consulta
            $data['message'] = 'Error al ejecutar la consulta: ' . $conexion->error;
        }

    } else {
        $data['message'] = 'Faltan datos necesarios para la actualización del producto';
    }

    // Cerrar la conexión
    $conexion->close();

} else {
    $data['message'] = 'No se recibieron datos para actualizar el producto';
}

// Convertir la respuesta a JSON y enviarla al cliente
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>
