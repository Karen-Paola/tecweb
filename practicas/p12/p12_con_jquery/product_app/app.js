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
    document.getElementById("description").value = JSON.stringify(baseJSON, null, 2);

    // SE LISTAN TODOS LOS PRODUCTOS
    //listarProductos();
}

$(document).ready(function() {
    init();
    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
    console.log('jQuery is working!');

    $('#product-result').hide();
  
    // Evento de búsqueda al teclear
    $('#search').keyup(function(e) {
      if ($('#search').val()) {
        let search = $('#search').val();
        $.ajax({
          url: 'backend/product-search.php', 
          data: {search},
          type: 'POST',
          success: function(response) {
            if(!response.error) {
                let products = JSON.parse(response);
                let template = '';
                products.forEach(task => {
                  template += `
                         <li><a href="#" class="task-item">${products.name}</a></li>
                        ` 
                });
                $('#product-result').show();
                $('#container').html(template);
              }
            } 
          })
        }
      });

// Función para validar el producto
function validarProducto(producto) {
    // Validar nombre
    if (!producto.nombre || producto.nombre.trim() === "") {
        alert('El nombre es requerido.');
        return false;
    }
    if (producto.nombre.length > 100) {
        alert('El nombre debe tener 100 caracteres o menos.');
        return false;
    }

    // Validar marca
    if (!producto.marca) {
        alert('La marca es requerida.');
        return false;
    }

    // Validar modelo
    var alfanumerico = /^[a-zA-Z0-9]+$/;
    if (producto.modelo.length > 25) {
        alert("El modelo debe tener 25 caracteres o menos.");
        return false;
    } else if (!alfanumerico.test(producto.modelo)) {
        alert("El modelo debe ser alfanumérico.");
        return false;
    }

    // Validar precio
    var precioNumerico = parseFloat(producto.precio);
    if (precioNumerico === 0) {
        alert("El precio no puede ser 0.");
        return false;
    } else if (precioNumerico < 99.99) {
        alert("El precio no puede ser menor a 99.99.");
        return false;
    }

    // Validar unidades
    var unidades = parseInt(producto.unidades, 10);
    if (isNaN(unidades) || unidades < 0) {
        alert("Las unidades son requeridas y deben ser un número mayor o igual a 0.");
        return false;
    }

    // Validar detalles
    if (producto.detalles.length >= 200) {
        alert("Los detalles deben tener 250 caracteres o menos.");
        return false;
    }

    // Validar imagen
    if (!producto.imagen) {
        alert("El path de la imagen es requerido.");
        producto.imagen = 'http://localhost/tecweb/practicas/p09/img/img.png'; // Default image path
    }

    return true; // Si todas las validaciones pasan
}

// Manejo del formulario para agregar producto
$('#product-form').submit(e => {
    e.preventDefault();

    // Obtener los datos del formulario
    let name = $('#name').val();
    let descriptionText = $('#description').val();

    // Intentar parsear la descripción a JSON
    let description;
    try {
        description = JSON.parse(descriptionText);  // Convertir a JSON
        console.log(description);
    } catch (error) {
        alert('La descripción debe estar en formato JSON válido.');
        return;
    }

    // Validar que la estructura del JSON sea correcta según baseJSON
    if (!description.hasOwnProperty('precio') || 
        !description.hasOwnProperty('unidades') || 
        !description.hasOwnProperty('modelo') || 
        !description.hasOwnProperty('marca') || 
        !description.hasOwnProperty('detalles') || 
        !description.hasOwnProperty('imagen')) {
        alert('La descripción JSON debe contener los campos correctos: precio, unidades, modelo, marca, detalles, imagen.');
        return;
    }

    // Crear objeto producto
    const producto = {
        nombre: name,
        marca: description.marca,
        modelo: description.modelo,
        precio: description.precio,
        detalles: description.detalles,
        unidades: description.unidades,
        imagen: description.imagen
    };

    // Validar el producto usando la función de validación
    if (!validarProducto(producto)) {
        return; // Si la validación falla, detener el envío
    }

    // Convertimos los datos a JSON
    const jsonData = JSON.stringify(producto);

    // Enviamos los datos al servidor
    $.ajax({
        url: 'backend/product-add.php', // Definir correctamente la URL
        type: 'POST',
        data: jsonData,
        contentType: 'application/json', // Muy importante para que PHP lo reciba correctamente
        success: function (response) {
            try {
                const res = JSON.parse(response);
                if (res.status === "success") {
                    alert(res.message); // Producto agregado correctamente
                } else {
                    alert(res.message); // Mensaje de error
                }
            } catch (error) {
                console.error("Error al procesar el JSON:", error);
                console.log("Respuesta recibida:", response); // Imprimir la respuesta que se está recibiendo para depurar
            }

            $('#product-form').trigger('reset');
            init();
            listarProductos(); // Llama a la función para obtener la lista actualizada de productos
        },
        error: function (xhr, status, error) {
            console.error('Error al agregar el producto:', error);
        }
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
                                <td>${product.nombre}</td>
                                <td>${descripcion}</td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                    Eliminar
                                    </button>
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
