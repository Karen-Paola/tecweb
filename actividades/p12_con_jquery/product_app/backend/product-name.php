<?php
// Conexión a la base de datos
include 'db_connection.php'; // Cambia esto según tu configuración

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $query = "SELECT COUNT(*) as count FROM productos WHERE nombre = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    echo json_encode(['exists' => $data['count'] > 0]);
} else {
    echo json_encode(['exists' => false]);
}
?>