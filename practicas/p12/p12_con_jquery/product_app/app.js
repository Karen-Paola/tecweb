// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
    
}

$(document).ready(function() {
    listarProductos();
    // Comprobación de jQuery
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

    // Manejo del formulario 
    $('#product-form').submit(e => {
        e.preventDefault();
        const postData = {
            nombre: $('#name').val(),
            descripcion: $('#description').val(),
            id: $('#productId').val()
        };
        $.post(url, postData, (response) => {
            console.log(response);
            $('#product-form').trigger('reset');
            listarProductos(); // Llama a la función para obtener la lista actualizada de productos
        });
    });

    // Obtener todos los productos
    function listarProductos() {
        $.ajax({
            url: 'backend/product-list.php', 
            type: 'GET',
            success: function(response) {
                const products = JSON.parse(response);
                let template = '';
                products.forEach(product => {
                    template += `
                       <tr productId="${product.id}">
                            <td>${product.id}</td>
                            <td>${product.nombre}</td>
                            <td>
                                <ul>
                                    <li>Descripción: ${product.descripcion}</li>
                                    <li>Precio: ${product.precio}</li> <!-- Precio -->
                                    <li>Unidades: ${product.unidades}</li> <!-- Unidades -->
                                    <li>Marca: ${product.marca}</li> <!-- Marca -->
                                    <li>Modelo: ${product.modelo}</li> <!-- Modelo -->
                                    <li>Detalles: ${product.detalles}</li> <!-- Detalles -->
                                </ul>
                            </td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar 
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $('#products').html(template); // Asegúrate de que este sea el ID de tu tabla en el HTML
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
  

  