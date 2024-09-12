<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta vehicular</title>
</head>
<body>
    <?php
        $parque_vehicular = array(
            'ABC1234' => array(
                'Auto' => array(
                    'marca' => 'HONDA',
                    'modelo' => 2020,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Alfonzo Esparza',
                    'ciudad' => 'Puebla, Pue.',
                    'direccion' => 'C.U., Jardines de San Manuel'
                )
            ),
            'XYZ5678' => array(
                'Auto' => array(
                    'marca' => 'MAZDA',
                    'modelo' => 2019,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Ma. del Consuelo Molina',
                    'ciudad' => 'Puebla, Pue.',
                    'direccion' => '97 oriente'
                )
            ),
            'JHG2345' => array(
                'Auto' => array(
                    'marca' => 'TOYOTA',
                    'modelo' => 2021,
                    'tipo' => 'hatchback'
                ),
                'Propietario' => array(
                    'nombre' => 'Carlos Pérez',
                    'ciudad' => 'Guadalajara, Jal.',
                    'direccion' => 'Av. Patria 234'
                )
            ),
            'KLM8765' => array(
                'Auto' => array(
                    'marca' => 'FORD',
                    'modelo' => 2018,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Ana Torres',
                    'ciudad' => 'Monterrey, NL.',
                    'direccion' => 'Col. Tecnológico'
                )
            ),
            'RTY9876' => array(
                'Auto' => array(
                    'marca' => 'NISSAN',
                    'modelo' => 2022,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Luis Gómez',
                    'ciudad' => 'Puebla, Pue.',
                    'direccion' => 'Blvd. 5 de Mayo'
                )
            ),
            'MNO7654' => array(
                'Auto' => array(
                    'marca' => 'CHEVROLET',
                    'modelo' => 2017,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Karen Paredes',
                    'ciudad' => 'León, Gto.',
                    'direccion' => 'Col. Centro'
                )
            ),
            'QWE0987' => array(
                'Auto' => array(
                    'marca' => 'VOLKSWAGEN',
                    'modelo' => 2021,
                    'tipo' => 'hatchback'
                ),
                'Propietario' => array(
                    'nombre' => 'Eldaa Martínez',
                    'ciudad' => 'Querétaro, Qro.',
                    'direccion' => 'Calle Zaragoza'
                )
            ),
            'ZXC5432' => array(
                'Auto' => array(
                    'marca' => 'HYUNDAI',
                    'modelo' => 2020,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Francisco Paredes',
                    'ciudad' => 'Ciudad de México, CDMX',
                    'direccion' => 'Col. Roma Norte'
                )
            ),
            'BVC6789' => array(
                'Auto' => array(
                    'marca' => 'TESLA',
                    'modelo' => 2022,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Jorge Sánchez',
                    'ciudad' => 'Puebla, Pue.',
                    'direccion' => 'Col. La Paz'
                )
            ),
            'NMB7654' => array(
                'Auto' => array(
                    'marca' => 'FORD',
                    'modelo' => 2015,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Diana López',
                    'ciudad' => 'Monterrey, NL.',
                    'direccion' => 'Col. Cumbres'
                )
            ),
            'POI3456' => array(
                'Auto' => array(
                    'marca' => 'BMW',
                    'modelo' => 2023,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Rodrigo Alarcón',
                    'ciudad' => 'Toluca, Edo. de México',
                    'direccion' => 'Av. Morelos'
                )
            ),
            'LKJ9876' => array(
                'Auto' => array(
                    'marca' => 'KIA',
                    'modelo' => 2019,
                    'tipo' => 'hatchback'
                ),
                'Propietario' => array(
                    'nombre' => 'Paola Ruiz',
                    'ciudad' => 'Cancún, Q. Roo',
                    'direccion' => 'Blvd. Kukulkán'
                )
            ),
            'UYV5432' => array(
                'Auto' => array(
                    'marca' => 'MITSUBISHI',
                    'modelo' => 2022,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Sofía Hernández',
                    'ciudad' => 'Mérida, Yuc.',
                    'direccion' => 'Col. Montejo'
                )
            ),
            'RTE8901' => array(
                'Auto' => array(
                    'marca' => 'AUDI',
                    'modelo' => 2020,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'David Romero',
                    'ciudad' => 'San Luis Potosí, SLP',
                    'direccion' => 'Col. Polanco'
                )
            ),
            'VBN5678' => array(
                'Auto' => array(
                    'marca' => 'TOYOTA',
                    'modelo' => 2018,
                    'tipo' => 'hatchback'
                ),
                'Propietario' => array(
                    'nombre' => 'Lucía Ortega',
                    'ciudad' => 'Guadalajara, Jal.',
                    'direccion' => 'Av. Vallarta'
                )
            )           
        );

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Consultar por matrícula
            if (isset($_POST['matricula']) && !empty($_POST['matricula'])) {
                $matricula = $_POST['matricula'];
                
                // Verificar si la matrícula existe en el parque vehicular
                if (array_key_exists($matricula, $parque_vehicular)) {
                    echo "<h2>Información del vehículo con matrícula: $matricula</h2>";
                    echo "<pre>";
                    print_r($parque_vehicular[$matricula]);
                    echo "</pre>";
                } else {
                    echo "<p>No se encontró ningún vehículo con la matrícula $matricula.</p>";
                }
            }
            
            // Consultar todos los vehículos
            if (isset($_POST['todos']) && $_POST['todos'] == '1') {
                echo "<h2>Todos los vehículos registrados</h2>";
                echo "<pre>";
                print_r($parque_vehicular);
                echo "</pre>";
            }
        }

    ?>

</body>
</html>