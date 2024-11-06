<?php
namespace App\Backend;

require_once __DIR__ . '/../Models/Products.php';

use App\Models\Products;

// 1. Crear la instancia de la clase Products
$products = new Products('root', '12345678a', 'marketzone');

// 2. Ejecutar el método para buscar productos si se recibe un término de búsqueda
if (isset($_GET['search'])) {
    $products->search($_GET['search']);
}

// 3. Devolver la respuesta en formato JSON
echo $products->getResponse();
?>
