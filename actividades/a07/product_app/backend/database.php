<?php
namespace App\Backend;

require_once __DIR__ . '/../Models/Products.php';

use App\Models\Products;

$products = new Products('root', '12345678a', 'marketzone');


echo $products->getResponse();
?>
