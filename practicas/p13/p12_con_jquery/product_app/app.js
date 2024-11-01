// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "http://localhost/tecweb/practicas/p09/img/img.png"
  };

function init() {
    
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    /*var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;*/
    //document.getElementById("description").value = JSON.stringify(baseJSON, null, 2);

    // SE LISTAN TODOS LOS PRODUCTOS
    //listarProductos();

    //cd
}

$(document).ready(function() {

    let edit = false; 

    init();

    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
    console.log('jQuery is working!');

    $('#product-result').hide();
  
    // Evento de búsqueda al teclear
    $('#search').keyup(function(e) {
        let search = $('#search').val(); // Obtener el valor de búsqueda

        console.log("Buscando:", search); // Imprimir en consola para depuración

        if (search) {
            $.ajax({
                url: 'backend/product-search.php',
                type: 'GET',
                data: { search },
                success: function(response) {
                    console.log("Respuesta del servidor:", response); // Mostrar respuesta
                    try {
                        let products = JSON.parse(response); // Parsear respuesta JSON
                        let template = '';

                        // Verificar si hay productos y crear la plantilla
                        if (products.length > 0) {
                            products.forEach(product => {
                                template += `
                                    <li>
                                        <strong>${product.nombre}</strong><br>
                                        Precio: ${product.precio}<br>
                                        Unidades: ${product.unidades}<br>
                                        Modelo: ${product.modelo}<br>
                                        Marca: ${product.marca}<br>
                                        Detalles: ${product.detalles}<br>
                                        <hr>
                                    </li>
                                `;
                            });
                            $('#product-result').show(); // Mostrar resultados
                            $('#container').html(template); // Mostrar productos en el contenedor // Ocultar tabla de productos
                        } else {
                            $('#product-result').hide(); // Ocultar si no hay productos
                            $('#products').show(); // Mostrar tabla de productos
                        }
                    } catch (error) {
                        console.error('Error al parsear JSON:', error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error en la búsqueda:', error);
                }
            });
        } else {
            $('#product-result').hide(); // Ocultar resultados si no hay búsqueda
            $('#products').show(); // Mostrar la tabla de productos
        }
    });

    $('#name').blur(validateName);
    $('#marca').blur(validateMarca);
    $('#modelo').blur(validateModelo);
    $('#precio').blur(validatePrecio);
    $('#unidades').blur(validateUnidades);
    
    function validateName() {
        let name = $('#name').val();
        if (name === '' || name.length > 100) {
            $('#container').text('Nombre es requerido y debe tener 100 caracteres o menos.');
            $('#product-result').show();
            return Promise.reject(); // Retornar una promesa rechazada
        }
    
        return $.get('backend/product-name.php', { name })
            .then(response => {
                const data = JSON.parse(response);
                if (data.exists) {
                    $('#container').text('Nombre ya existe. Elige otro nombre.');
                    $('#product-result').show();
                    return Promise.reject(); // Retornar una promesa rechazada
                }
                return Promise.resolve(); // Retornar una promesa resuelta
            })
            .catch(() => {
                $('#container').text('Error al verificar el nombre del producto.');
                $('#product-result').show();
                return Promise.reject(); // Retornar una promesa rechazada en caso de error
            });
    }
    
    
    
    function validateMarca() {
        if ($('#marca').val() === '') {
            $('#container').text('Marca es requerida.');
            $('#product-result').show();
            return false;
        }
        return true;
    }
    
    function validateModelo() {
        let modelo = $('#modelo').val();
        if (modelo === '' || modelo.length > 25) {
            $('#container').text('Modelo es requerido y debe tener 25 caracteres o menos.');
            $('#product-result').show();
            return false;
        }
        return true;
    }
    
    function validatePrecio() {
        let precio = parseFloat($('#precio').val());
        if (isNaN(precio) || precio <= 99.99) {
            $('#container').text('Precio es requerido y debe ser mayor a 99.99.');
            $('#product-result').show();
            return false;
        }
        return true;
    }
    
    function validateUnidades() {
        let unidades = parseInt($('#unidades').val());
        if (isNaN(unidades) || unidades < 0) {
            $('#container').text('Unidades son requeridas y deben ser mayores o iguales a 0.');
            $('#product-result').show();
            return false;
        }
        return true;
    }
    // * AGREGAR PRODUCTO (envío de formulario) *
    $('#product-form').submit(function (e) {
        e.preventDefault();
        
        // Ejecuta todas las validaciones y maneja las promesas
        Promise.all([
            validateName(),
            validateMarca(),
            validateModelo(),
            validatePrecio(),
            validateUnidades()
        ]).then(() => {
            const postData = {
                nombre: $('#name').val(),
                marca: $('#marca').val(),
                modelo: $('#modelo').val(),
                precio: parseFloat($('#precio').val()),
                detalles: $('#detalles').val(),
                unidades: parseInt($('#unidades').val()),
                imagen: $('#imagen').val(),
                id: $('#product-id').val()
            };
    
            // Envío de los datos al backend
            $.ajax({
                url: edit ? 'backend/product-edit.php' : 'backend/product-add.php',
                type: 'POST',
                data: JSON.stringify(postData),
                contentType: 'application/json',
                success: function (response) {
                    const res = JSON.parse(response);
                    $('#container').text(res.message);
                    $('#product-result').show();
                    if (res.status === "success") {
                        listarProductos();
                        $('#product-form').trigger('reset');
                    }
                },
                error: function () {
                    $('#container').text('Error al agregar o editar el producto.');
                    $('#product-result').show();
                }
            });
        }).catch(() => {
            $('#container').text('Por favor, corrige los errores antes de enviar.');
            $('#product-result').show();
        });
    });    
    




    
    // Obtener todos los productos
    function listarProductos() {
        $.ajax({
            url: 'backend/product-list.php',
            type: 'GET',
            success: function(response) {
                try {
                    let products = JSON.parse(response);
                    let template = '';
                    products.forEach(product => {
                        let descripcion = '';
                        descripcion += '<li>precio: ' + product.precio + '</li>';
                        descripcion += '<li>unidades: ' + product.unidades + '</li>';
                        descripcion += '<li>modelo: ' + product.modelo + '</li>';
                        descripcion += '<li>marca: ' + product.marca + '</li>';
                        descripcion += '<li>detalles: ' + product.detalles + '</li>';
                        template += `

                                <tr productId="${product.id}">
                                    <td>${product.id}</td>
                                    <td><a href="javascript:void(0);" class="product-item">${product.nombre}</a></td>
                                    <td>${descripcion}</td>
                                    <td>
                                        <button class="product-delete btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                        

                        `;
                    });
                    $('#products').html(template);
                } catch (error) {
                    console.error('Error al parsear JSON:', error);
                    console.log('Respuesta recibida:', response);
                }
            }
        });
    }


// Obtener un Producto por ID
$(document).on('click', '.product-item', function() { 
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('productId');
    
    // Hacemos la petición GET para obtener el producto por su ID
    $.get('backend/product-single.php', {id}, function(response) {   
        const product = JSON.parse(response);

        // Verificamos si el estado de la respuesta es "success"
        if (product.status === 'success') {
            console.log(product);

            // Rellenar el campo del nombre con el nombre del producto
            $('#name').val(product.producto.nombre);
            $('#marca').val(product.producto.marca);
            $('#modelo').val(product.producto.modelo);
            $('#precio').val(product.producto.precio);
            $('#detalles').val(product.producto.detalles);
            $('#unidades').val(product.producto.unidades);
            $('#imagen').val(product.producto.imagen);

            // Convertir los detalles del producto a JSON y mostrarlos en el campo #description
            const description = {
                precio: product.producto.precio,
                unidades: product.producto.unidades,
                modelo: product.producto.modelo,
                marca: product.producto.marca,
                detalles: product.producto.detalles,
                imagen: product.producto.imagen
            };

            // Rellenar el campo de descripción en formato JSON
            //$('#description').val(JSON.stringify(description, null, 2));  // Formateado para que sea más legible
            $('#product-id').val(product.producto.id);
            
            edit = true;
        } else {
            $('#container').html(product.message);  // En caso de error, muestra el mensaje
            $('#product-result').show();
        }
    });
});

    // Eliminar un producto
    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Estás seguro de que deseas eliminarlo?')) {
            // Usar e.currentTarget para obtener el botón correcto
            const element = e.currentTarget.closest('tr'); // Cambiar a closest('tr')
            const id = $(element).attr('productId'); // Obtener el ID del producto
            $.post('backend/product-delete.php', {id}, (response) => {
                // Procesar la respuesta del servidor
                const res = JSON.parse(response);
                if (res.status === "success") {
                    alert(res.message); // Mostrar mensaje de éxito
                } else {
                    alert(res.message); // Mostrar mensaje de error
                }
                listarProductos(); // Actualizar la lista de productos después de eliminar
            });
        }
    });

});
