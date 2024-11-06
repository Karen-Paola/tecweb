<?php
namespace App\Backend;

require_once __DIR__ . '/../Models/Products.php';

use App\Models\Products;

// Establecer el encabezado de respuesta en formato JSON
header('Content-Type: application/json');

// 1. Crear la instancia de la clase Products
$products = new Products('root', '12345678a', 'marketzone');

// 2. Ejecutar el método productName si se recibe el parámetro `name`
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $products->productName($name, $id);
}

// 3. Devolver la respuesta en formato JSON
echo $products->getResponse();
?>
