<!DOCTYPE html >
<html>

  <head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de productos</title>
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>

    <script>
      // Validaciones con JavaScript

        // Validación de la imagen
        /*const imagen = document.getElementById('form-imagen').value;
        if (!imagen) {
          document.getElementById('form-imagen').value = 'http://localhost/tecweb/practicas/p09/img/img.png';
        }

        return true; 
      }*/
            function validarNombre(){
            var nombre = document.getElementById('form-name').value;
            if (nombre.length > 100) {
              alert('El nombre es requerido y debe tener 100 caracteres o menos.');
              return false;
            }
            return true;
      }

          function validarMarca(){
              var marca = document.getElementById('form-marca').value;
              if (!marca) {
                alert('La marca es requerida.');
                return false;
              }
              return true;
          }

          function validarModelo(){
            var modelo = document.getElementById("form-model").value;
            var alfanumerico = /^[a-zA-Z0-9]+$/;
            if (modelo.length > 25) {
                alert("El modelo debe tener 25 caracteres o menos");
                return false; // Evitar el envío del formulario
            } else if (!alfanumerico.test(modelo)) {
                alert("El modelo debe ser alfanumérico");
                return false; // Evitar el envío del formulario
            }
            return true;
          }

          function validarPrecio() {
              var precio = document.getElementById("form-price").value.trim();
              var precioNumerico = parseFloat(precio);
              if (precioNumerico === 0) {
                  alert("El precio no puede ser 0");
                  return false; // Evita el envío del formulario
              } 
              else if (precioNumerico < 99.99) {
                  alert("El precio no puede ser menor a 99.99");
                  return false; // Evita el envío del formulario
              }
              return true;
            } 

          function validarUnidades() {
              var unidades = document.getElementById("form-units").value;
              unidades = parseInt(unidades, 10);
              if (isNaN(unidades) || unidades < 0) {
                  alert("Las unidades son requeridas y deben ser un número mayor o igual a 0");
                  return false;
              }
              return true;
          }


          function validarDetalles() {
              var detalles = document.getElementById("form-details").value;
              if (detalles.length >= 200) {
                alert("Los detalles deben tener 250 caracteres o menos");
                return false;
              }
              return true;
          }

          function validarImagen() {
            var imagen = document.getElementById('form-image').value.trim();
            if (!imagen) {
                alert("El path de la imagen es requerido.");
                document.getElementById('form-image').value = 'http://localhost/tecweb/practicas/p09/img/img.png';
                return false; // No permite enviar el formulario
            }
            return true; // Permite enviar el formulario
        }

          function validarFormulario() {
              return validarPrecio() && validarModelo() && validarNombre() 
              && validarUnidades() && validarDetalles() && validarImagen();
          }
    </script>

  </head>

  <body>
    <h1>Registro de productos</h1>

    <form id="formularioProductos" action="http://localhost/tecweb/practicas/p10/update_producto.php" method="post"  enctype="multipart/form-data" onsubmit="return validarFormulario()">

    <fieldset>
        <legend>Información del Producto</legend>
        <ul>
              <li><label for="form-id">ID:</label><input type="hidden" name="id" id="form-id" value="<?= isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '' ?>"></li>
            
              <li><label for="form-name">Nombre:</label>
                <input type="text" name="nombre" id="form-name" oninput="validarNombre()" value="<?= isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : (isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '') ?>"required>
                <div id="error-name"></div>
              </li>

              <li>
                    <label for="marca">Marca:</label>
                    <select name="marca" id="marca" onchange="validarMarca()" required>
                        <option value="">Seleccione una marca</option>
                        <option value="Sweet" <?= !empty($_POST['marca']) && $_POST['marca'] == 'Sweet' ? 'selected' : '' ?>>Sweet</option>
                        <option value="La Tartería" <?= !empty($_POST['marca']) && $_POST['marca'] == 'La Tartería' ? 'selected' : '' ?>>La Tartería</option>
                        <option value="Cookie Heaven" <?= !empty($_POST['marca']) && $_POST['marca'] == 'Cookie Heaven' ? 'selected' : '' ?>>Cookie Heaven</option>
                        <option value="Sweet Delights" <?= !empty($_POST['marca']) && $_POST['marca'] == 'Sweet Delights' ? 'selected' : '' ?>>Sweet Delights</option>
                    </select>
                    <div id="error-marca"></div>
                </li>

              <li><label for="form-model">Modelo:</label> 
                  <input type="text" name="modelo" id="form-model" oninput="validarModelo()" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"required>
                  <div id="error-modelo"></div>
              </li>

              <li><label for="form-price">Precio:</label> 
                  <input type="number" name="precio" id="form-price" oninput="validarPrecio()" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"required>
                  <div id="error-precio"></div>
              </li>

              <li><label for="form-units">Unidades:</label> 
                  <input type="number" name="unidades" id="form-units" oninput="validarUnidades()" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"required>
                  <div id="error-unidades"></div>
              </li>

              <li>
                  <label for="form-details">Detalles</label><br>
                  <textarea name="detalles" rows="4" cols="60" id="form-details" oninput="validarDetalles()" placeholder="No más de 250 caracteres de longitud">
                      <?= isset($_POST['detalles']) ? htmlspecialchars($_POST['detalles']) : (isset($_GET['detalles']) ? htmlspecialchars($_GET['detalles']) : '') ?>
                  </textarea>
                  <div id="error-detalles"></div>
              </li>

              <li><label for="form-image">Path de la Imagen:</label> 
                  <input type="text" name="imagen" id="form-image" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>">
                  <div id="error-imagen"></div>
              </li>
        
          </ul>
    </fieldset>

      <p>
        <input type="submit" value="Registrar Producto">
        <input type="reset" value="Limpiar Formulario">
      </p>

    </form>
  </body>
</html>