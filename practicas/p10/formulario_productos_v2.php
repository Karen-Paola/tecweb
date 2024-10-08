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

      /*function validarFormulario() {
        // Validación del nombre
        /*const nombre = document.getElementById('form-nombre').value;
        if (!nombre || nombre.length > 100) {
          alert('El nombre es requerido y debe tener 100 caracteres o menos.');
          return false;
        }*/
        /*var nombre = document.getElementById("form-nombre").value;
        var error = document.getElementById("error-nombre");
        if (nombre.length > 100) {
            error.textContent = "El nombre es demasiado largo";
        } else if (nombre.trim() === "") {
            error.textContent = "Inserte un nombre"; 
        } else {
            error.textContent = ""; 
        }


        // Validación de la marca
        const marca = document.getElementById('marca').value;
        if (!marca) {
          alert('La marca es requerida.');
          return false;
        }

        const modelo = document.getElementById('modelo').value;
        const modeloRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/; // Debe contener al menos una letra y un número
        if (!modelo || !modeloRegex.test(modelo) || modelo.length > 25) {
          alert('El modelo es requerido, debe ser alfanumérico, contener al menos una letra y un número, y tener 25 caracteres o menos.');
          return false;
        }

        // Validación del precio
       const precio = parseFloat(document.getElementById('precio').value);
        if (isNaN(precio) || precio < 99.99) {
          alert('El precio es requerido y debe ser mayor a 99.99.');
          return false;
        }
                if (precio.trim() === "") {
            error.textContent = "El precio es requerido";
            return false;  // Detener el envío
        } else {
            precio = parseFloat(precio);
            if (precio <= 99.99) {
                error.textContent = "El precio debe de ser mayor a 99.99.";
                return false;  // Detener el envío
            }
        }
        

        // Validación de los detalles (opcional, pero máximo 250 caracteres)
        const detalles = document.getElementById('detalles').value;
        if (detalles && detalles.length > 250) {
          alert('Los detalles deben tener 250 caracteres o menos.');
          return false;
        }

        // Validación de las unidades
        const unidades = parseInt(document.getElementById('unidades').value);
        if (isNaN(unidades) || unidades < 0) {
          alert('Las unidades son requeridas y deben ser un número mayor o igual a 0.');
          return false;
        }

        // Validación de la imagen
        const imagen = document.getElementById('form-imagen').value;
        if (!imagen) {
          document.getElementById('form-imagen').value = 'http://localhost/tecweb/practicas/p09/img/img.png';
        }

        return true; // Si todas las validaciones pasan
      }*/
              function validarNombre(){
            var nombre = document.getElementById("form-name").value;
            if (nombre.length > 100) {
                alert("Alerta El nombre es muy largo, debe ser menos de 100 caracteres");
            } else if (nombre.trim() === "") {
              alert("Ingrese nuevo nombre");
            }
        }

          function validarMarca(){
              var marca = document.getElementById("form-marca").value;
              if (marca === "") {
                alert("Selecciona una marca");
              }
          }

          function validarModelo(){
              var modelo = document.getElementById("form-model").value;
              var alfanumerico = /^[a-zA-Z0-9]+$/;
              if (modelo.length === 0) {
                alert("El modelo es requerido");
              } else if (modelo.length > 25) {
                alert("El modelo debe tener 25 caracteres o menos");
              } else if (!alfanumerico.test(modelo)) {
                alert("El modelo debe ser alfanumérico");
              }
          }

          function validarPrecio() {
              var precio = document.getElementById("form-price").value;
              if (precio.trim() === "") {
                alert("El precio es requerido");
              } else {
                  precio = parseFloat(precio);
                  if (precio >= 99.99 ) {
                  } else  {
                      if (precio == 0){
                        alert("El precio no puede ser 0");
                      }else {
                        alert("El precio no puede ser menor");
                      }
                  }
              }
          }

          function validarUnidades() {
              var unidades = document.getElementById("form-units").value;
              if (unidades.trim() === "") {
                alert("Las unidades son requeridas");
              } else {
                  unidades = parseInt(unidades, 10);
                  if (unidades >= 0) {
                  } else {
                    alert("Las unidades deben ser mayor o igual a 0");
                  }
              }
          }


          function validarDetalles() {
              var detalles = document.getElementById("form-details").value;
              if (detalles.length >= 200) {
                alert("Los detalles deben tener 250 caracteres o menos");
              }
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
              <!--<li><label for="form-name">Nombre:</label> <input type="text" name="name" id="form-name" value="
              <!-?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li-->
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
              <!--<li><label for="form-brand">Marca:</label> <input type="text" name="marca" id="form-brand" value="
              <!-?= !empty($_POST['marca'])?$_POST['marca']:$_GET['marca'] ?>"></li-->
              <li><label for="form-model">Modelo:</label> 
                  <input type="text" name="modelo" id="form-model" oninput="validarModelo()" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"required>
                  <div id="error-modelo"></div>
              </li>
              <li><label for="form-price">Precio:</label> 
                  <input type="number" name="precio" id="form-price" oninput="validarPrecio()" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"require>
                  <div id="error-precio"></div>
              </li>
              <li><label for="form-units">Unidades:</label> 
                  <input type="number" name="unidades" id="form-units" oninput="validarUnidades()" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"required>
                  <div id="error-unidades"></div>
              </li>
              <li><label for="form-details">Detalles</label><br><textarea name="detalles" rows="4" cols="60" id="form-details" oninput="validarDetalles()" placeholder="No más de 300 caracteres de longitud"><?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?></textarea><div id="error-detalles"></div></li>
              <li><label for="form-image">Path de la Imagen:</label> <input type="text" name="imagen" id="form-image" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>"></li>
        
          </ul>
    </fieldset>

      <p>
        <input type="submit" value="Registrar Producto">
        <input type="reset" value="Limpiar Formulario">
      </p>

    </form>
  </body>
</html>