<?php

        // Crear objeto de conexión
        @$link = new mysqli('localhost', 'root', '12345678a', 'marketzone');
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
        }

        // Consulta para obtener productos que no están eliminados
        if ($result = $link->query("SELECT * FROM productos WHERE eliminado = 0")) {
            $productos = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        }

        // Cerramos la conexión
        $link->close();
?>
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Productos disponibles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
    <h3>Productos Dispobibles</h3>

    <br />

    <?php if (isset($productos) && count($productos) > 0) : ?>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['id']) ?></td>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td><?= htmlspecialchars($producto['marca']) ?></td>
                        <td><?= htmlspecialchars($producto['modelo']) ?></td>
                        <td><?= htmlspecialchars($producto['precio']) ?></td>
                        <td><?= htmlspecialchars($producto['unidades']) ?></td>
                        <td><?= htmlspecialchars(utf8_encode($producto['detalles'])) ?></td>
                        <td>
                    <img src="../p08/img/<?= htmlspecialchars($producto['imagen']) ?>" 
                     alt="Imagen de <?= htmlspecialchars($producto['nombre']) ?>" 
                     style="width:100px;" />
            </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No se encontraron productos con unidades menores o iguales a <?= htmlspecialchars($tope) ?>.</p>
    <?php endif; ?>
</body>
</html>