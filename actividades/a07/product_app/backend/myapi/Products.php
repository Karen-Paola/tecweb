<?php
namespace App\Models;

use App\Database\DataBase;

class Products extends DataBase {
    protected $response = [];

    public function __construct($user = 'root', $pass = '', $db = 'marketzone') {
        // Inicializar el atributo response y llamar al constructor de la SuperClase
        $this->response = [];
        parent::__construct($user, $pass, $db);
    }

    public function add($jsonOBJ) {
        $nombre = $jsonOBJ->nombre;
        $marca = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;

        // Verificar si el producto ya existe
        $checkQuery = "SELECT * FROM productos WHERE nombre = ? AND eliminado = 0";
        $stmt = mysqli_prepare($this->conexion, $checkQuery);
        mysqli_stmt_bind_param($stmt, 's', $nombre);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows == 0) {
            // Insertar el nuevo producto
            $insertQuery = "INSERT INTO productos VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, 0)";
            $stmt = mysqli_prepare($this->conexion, $insertQuery);
            mysqli_stmt_bind_param($stmt, 'ssssdisi', $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen);
            
            if (mysqli_stmt_execute($stmt)) {
                $this->response = ['status' => 'success', 'message' => 'Producto agregado'];
            } else {
                $this->response = ['status' => 'error', 'message' => 'Error al agregar el producto'];
            }
        } else {
            $this->response = ['status' => 'error', 'message' => 'Ya existe un producto con ese nombre'];
        }
    }

    public function delete($id) {
        if (!empty($id)) {
            $deleteQuery = "UPDATE productos SET eliminado = 1 WHERE id = ?";
            $stmt = mysqli_prepare($this->conexion, $deleteQuery);
            mysqli_stmt_bind_param($stmt, 'i', $id);

            if (mysqli_stmt_execute($stmt)) {
                $this->response = ['status' => 'success', 'message' => 'Producto eliminado'];
            } else {
                $this->response = ['status' => 'error', 'message' => 'Error al eliminar el producto'];
            }
        } else {
            $this->response = ['status' => 'error', 'message' => 'ID de producto no especificado'];
        }
    }

    public function edit($productData) {
        if (!empty($productData)) {
            $jsonOBJ = json_decode($productData);

            // Validar que los datos necesarios existan
            if (isset($jsonOBJ->id, $jsonOBJ->nombre, $jsonOBJ->marca, $jsonOBJ->modelo, $jsonOBJ->precio, $jsonOBJ->unidades)) {
                $this->conexion->set_charset("utf8");

                $updateQuery = "UPDATE productos SET nombre = ?, marca = ?, modelo = ?, precio = ?, detalles = ?, unidades = ?, imagen = ? WHERE id = ? AND eliminado = 0";
                $stmt = mysqli_prepare($this->conexion, $updateQuery);
                mysqli_stmt_bind_param($stmt, 'sssdsisi', $jsonOBJ->nombre, $jsonOBJ->marca, $jsonOBJ->modelo, $jsonOBJ->precio, $jsonOBJ->detalles, $jsonOBJ->unidades, $jsonOBJ->imagen, $jsonOBJ->id);

                // Ejecutar la consulta
                if (mysqli_stmt_execute($stmt)) {
                    $this->response = ['status' => 'success', 'message' => 'Producto actualizado correctamente'];
                } else {
                    $this->response = ['status' => 'error', 'message' => 'Error en la actualización del producto'];
                }
            } else {
                $this->response = ['status' => 'error', 'message' => 'Datos incompletos para la actualización'];
            }
        } else {
            $this->response = ['status' => 'error', 'message' => 'No se recibió información para actualizar'];
        }
    }

    public function list() {
        $query = "SELECT * FROM productos WHERE eliminado = 0";
        if ($result = $this->conexion->query($query)) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if ($rows) {
                // Codificar los datos en UTF-8
                foreach ($rows as &$row) {
                    foreach ($row as $key => $value) {
                        $row[$key] = utf8_encode($value);
                    }
                }
                $this->response = $rows;
            } else {
                $this->response = ['status' => 'error', 'message' => 'No se encontraron productos'];
            }

            $result->free();
        } else {
            $this->response = ['status' => 'error', 'message' => 'Error en la consulta'];
        }
    }

    public function search($searchTerm) {
        $searchTerm = $this->conexion->real_escape_string($searchTerm);
        $query = "SELECT * FROM productos WHERE (id = '{$searchTerm}' OR nombre LIKE '%{$searchTerm}%' OR marca LIKE '%{$searchTerm}%' OR detalles LIKE '%{$searchTerm}%') AND eliminado = 0";
        
        if ($result = $this->conexion->query($query)) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if ($rows) {
                // Codificar los datos en UTF-8
                foreach ($rows as &$row) {
                    foreach ($row as $key => $value) {
                        $row[$key] = utf8_encode($value);
                    }
                }
                $this->response = $rows;
            } else {
                $this->response = ['status' => 'error', 'message' => 'No se encontraron productos'];
            }

            $result->free();
        } else {
            $this->response = ['status' => 'error', 'message' => 'Error en la consulta'];
        }
    }

    public function productSingle($id) {
        // Asegurarse de que el ID sea un entero para evitar inyecciones SQL
        $id = intval($id);
        $query = "SELECT * FROM productos WHERE id = {$id} AND eliminado = 0";
        
        if ($result = $this->conexion->query($query)) {
            if ($result->num_rows > 0) {
                $producto = $result->fetch_assoc();

                // Codificar los valores en UTF-8 y guardar el producto en la respuesta
                foreach ($producto as $key => $value) {
                    $this->response['producto'][$key] = utf8_encode($value);
                }
                $this->response['status'] = 'success';
                $this->response['message'] = 'Producto encontrado';
            } else {
                $this->response['message'] = 'Producto no encontrado o eliminado';
            }

            $result->free();
        } else {
            $this->response['message'] = 'Error en la consulta';
        }
    }

    public function productName($name, $id = null) {
        // Escapamos el nombre para evitar inyecciones SQL
        $name = $this->conexion->real_escape_string($name);
        
        // Preparamos la consulta SQL según si se incluye un ID o no
        $query = $id 
            ? "SELECT COUNT(*) as count FROM productos WHERE nombre = '$name' AND id != '$id'"
            : "SELECT COUNT(*) as count FROM productos WHERE nombre = '$name'";

        if ($result = $this->conexion->query($query)) {
            $data = $result->fetch_assoc();
            // Comprobamos si el nombre ya existe en la base de datos
            $this->response['exists'] = $data['count'] > 0;
            $this->response['message'] = $this->response['exists'] ? 'El nombre ya existe' : 'Nombre disponible';
            $result->free();
        } else {
            $this->response['message'] = 'Error en la consulta';
        }
    }

    // Método nuevo para buscar producto por nombre
    public function singleByName($name) {
        $name = $this->conexion->real_escape_string($name);
        $query = "SELECT * FROM productos WHERE nombre = '{$name}' AND eliminado = 0";
        
        if ($result = $this->conexion->query($query)) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if ($rows) {
                // Codificar los datos en UTF-8
                foreach ($rows as &$row) {
                    foreach ($row as $key => $value) {
                        $row[$key] = utf8_encode($value);
                    }
                }
                $this->response = $rows;
            } else {
                $this->response = ['status' => 'error', 'message' => 'Producto no encontrado'];
            }

            $result->free();
        } else {
            $this->response = ['status' => 'error', 'message' => 'Error en la consulta'];
        }
    }

    public function getResponse() {
        return json_encode($this->response);
    }
}
?>
