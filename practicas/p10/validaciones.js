function validarNombre(){
    var nombre = document.getElementById("form-name").value;
    var error = document.getElementById("error-name");
    if (nombre.length > 100) {
        alert("Alerta");
        error.textContent = "El nombre es demasiado largo";
    } else if (nombre.trim() === "") {
        error.textContent = "Inserte un nombre"; 
    } else {
        error.textContent = ""; 
    }
}

function validarMarca(){
    var marca = document.getElementById("form-marca").value;
    var error = document.getElementById("error-marca");
    error.textContent = "";
    if (marca === "") {
        error.textContent = "Selecciona una marca";
    }
}

function validarModelo(){
    var modelo = document.getElementById("form-model").value;
    var error = document.getElementById("error-model");
    error.textContent = "";
    var alfanumerico = /^[a-zA-Z0-9]+$/;
    if (modelo.length === 0) {
        error.textContent = "El modelo es requerido";
    } else if (modelo.length > 25) {
        error.textContent = "El modelo debe tener 25 caracteres o menos";
    } else if (!alfanumerico.test(modelo)) {
        error.textContent = "El modelo debe ser alfanumérico";
    }
}

function validarPrecio() {
    var precio = document.getElementById("form-price").value;
    var error = document.getElementById("error-price");
    error.textContent = "";
    if (precio.trim() === "") {
        error.textContent = "El precio es requerido";
    } else {
        precio = parseFloat(precio);
        if (precio > 99.99) {
        } else {
            error.textContent = "El precio debe de ser mayor a 99.99.";
        }
    }
}

function validarUnidades() {
    var unidades = document.getElementById("form-units").value;
    var error = document.getElementById("error-units");
    error.textContent = "";
    if (unidades.trim() === "") {
        error.textContent = "Las unidades son requeridas";
    } else {
        unidades = parseInt(unidades, 10);
        if (unidades >= 0) {
        } else {
            error.textContent = "Las unidades deben ser mayor o igual a 0"; 
        }
    }
}


function validarDetalles() {
    var detalles = document.getElementById("form-details").value;
    var error = document.getElementById("error-details");
    error.textContent = "";
    if (detalles.length > 250) {
        error.textContent = "Los detalles deben tener 250 caracteres o menos";
    }
}
