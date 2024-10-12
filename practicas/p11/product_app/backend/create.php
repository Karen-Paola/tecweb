<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        $nombre = utf8_decode($jsonOBJ->nombre);
        $precio = (float)$jsonOBJ->precio; // Asegúrate de que sea un float
        $unidades = (int)$jsonOBJ->unidades; // Asegúrate de que sea un int
        $modelo = utf8_decode($jsonOBJ->modelo);
        $marca = utf8_decode($jsonOBJ->marca);
        $detalles = utf8_decode($jsonOBJ->detalles);
        $imagen = $jsonOBJ->imagen;
    
        // SE PREPARA LA CONSULTA
        $sql = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    
        if ($stmt = $conexion->prepare($sql)) {
            // BIND PARAMS
            $stmt->bind_param('sdissss', $nombre, $precio, $unidades, $modelo, $marca, $detalles, $imagen);
    
            // SE EJECUTA LA CONSULTA
            if ($stmt->execute()) {
                echo json_encode(["mensaje" => "Producto agregado exitosamente."]);
            } else {
                echo json_encode(["error" => "Error al agregar el producto: " . $stmt->error]);
            }
    
            $stmt->close();
        } else {
            echo json_encode(["error" => "Error en la preparación de la consulta: " . $conexion->error]);
        }
    
        $conexion->close();
    } else {
        echo json_encode(["error" => "No se recibieron datos."]);
    }
?>