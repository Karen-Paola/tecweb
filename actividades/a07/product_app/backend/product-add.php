<?php
namespace App\Backend;

require_once __DIR__ . '/../Models/Products.php';

use App\Models\Products;

// 1. Crear la instancia de la clase Products
$products = new Products('root', '12345678a', 'marketzone');

// 2. Obtener los datos del producto enviados por el cliente
$producto = file_get_contents('php://input');
$jsonOBJ = json_decode($producto);

// 3. Usar el método de Products para agregar el producto
$products->add($jsonOBJ);

// 4. Devolver la respuesta en formato JSON
echo $products->getResponse();
?>
