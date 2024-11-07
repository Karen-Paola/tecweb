<?php
namespace App\Backend;

require_once __DIR__ . '/../Models/Products.php';

use App\Models\Products;

// 1. Crear la instancia de la clase Products
$products = new Products('root', '12345678a', 'marketzone');

// 2. Ejecutar el método para actualizar el producto
$products->edit(file_get_contents('php://input'));

// 3. Devolver la respuesta en formato JSON
echo $products->getResponse();
?>
