/*function getDatos(){
    var nombre = window.prompt("Nombre: ", "");
    var edad = prompt("Edad: ", "");

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+ nombre + '</h3>';

    var div1 = document.getElementById('edad');
    div1.innerHTML = '<h3> Edad: '+ edad + '</h3>';
}*/

function holaMundo(){
    var div1 = document.getElementById('ej01');
    div1.innerHTML = '<h3>Hola Mundo</h3>';
}

function ej02(){
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;
    /*document.write( nombre );
    document.write( '<br>' );
    document.write( edad );
    document.write( '<br>' );
    document.write( altura );
    document.write( '<br>' );
    document.write( casado );*/
    var div2 = document.getElementById('ej02');
    div2.innerHTML = '<p>Nombre: ' + nombre + '</p>' +
                     '<p>Edad: ' + edad + '</p>' +
                     '<p>Altura: ' + altura + ' m</p>' +
                     '<p>Casado: ' + (casado ? 'Sí' : 'No') + '</p>';

}

function ej03(){
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    /*document.write('Hola ');
    document.write(nombre);
    document.write(' así que tienes ');
    document.write(edad);
    document.write(' años.');*/
    var div3 = document.getElementById('ej03');
    div3.innerHTML = '<p>Hola ' + nombre + ', así que tienes ' + edad + ' años.</p>';

}

function ej04(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);
    /*document.write('La suma es ');
    document.write(suma);
    document.write('<br>');
    document.write('El producto es ');
    document.write(producto);*/
    var div4 = document.getElementById('ej04');
    div4.innerHTML = '<p>La suma es: ' + suma + '</p>' +
                     '<p>El producto es: ' + producto + '</p>';

}

function ej05(){
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    /*if (nota>=4) {
    document.write(nombre+' esta aprobado con un '+nota);
    }*/
    var div5 = document.getElementById('ej05');
    if (nota >= 4) {
        div5.innerHTML = '<p>' + nombre + ' está aprobado con un ' + nota + '</p>';
    }

}

function ej06(){
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    /*if (num1>num2) {
    document.write('el mayor es '+num1);
    }
    else {
    document.write('el mayor es '+num2);
    }*/
    var div5 = document.getElementsByTagName('ej06');
    if (num1>num2) {
        div6.innerHTML = '<p> el número es'+ num1 + '</p>';
    }
        else {
            div6.innerHTML = '<p> el número es'+ num2 + '</p>';
        }
}

function ej07(){
    var nota1,nota2,nota3;
    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');
    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);
    var pro; 
    pro = (nota1+nota2+nota3)/3;
    /*if (pro>=7) {
        document.write('aprobado');
        }
        else {
            if (pro>=4) {
            document.write('regular');
            }
            else {
            document.write('reprobado');
            }
        }*/
    var div7 = document.getElementById('ej07');
    if (pro>=7) {
        div7.innerHTML = '<p> aprobado </p>';
    }
        else {
            if (pro>=4) {
                div7.innerHTML = '<p> regular </p>';
            }
            else {
                div7.innerHTML = '<p> reprobado </p>';
            }
        }

}

function ej08(){
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    /*switch (valor) {
    case 1: document.write('uno');
    break;
    case 2: document.write('dos');
    break;
    case 3: document.write('tres');
    break;
    case 4: document.write('cuatro');
    break;
    case 5: document.write('cinco');
    break;
    default:document.write('debe ingresar un valor comprendido entre 1 y 5');
    }*/
   var div8 = document.getElementById('ej08');
   switch (valor) {
    case 1: 
        div8.innerHTML = '<p>uno</p>';
        break;
    case 2: 
        div8.innerHTML = '<p>dos</p>';
        break;
    case 3: 
        div8.innerHTML = '<p>tres</p>';
        break;
    case 4: 
        div8.innerHTML = '<p>cuatro</p>';   
        break;
    case 5: 
        div8.innerHTML = '<p>cinco</p>';
        break;
    default:
        div8.innerHTML = '<p>debe ingresar un valor comprendido entre 1 y 5</p>';
    }
}

function ej09(){
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '' );
    /*switch (col) {
    case 'rojo': document.bgColor='#ff0000';
    break;
    case 'verde': document.bgColor='#00ff00';
    break;
    case 'azul': document.bgColor='#0000ff';
    break;
    }*/
    switch (col.toLowerCase()) {
        case 'rojo':
            document.body.style.backgroundColor = '#ff0000';
            break;
        case 'verde':
            document.body.style.backgroundColor = '#00ff00';
            break;
        case 'azul':
            document.body.style.backgroundColor = '#0000ff';
            break;
        default:
            alert('Color no reconocido. Prueba con "rojo", "verde" o "azul".');
    }

}

function ej10(){
    var x;
    var res= ''; 
    x=1;
    var div10 = document.getElementById('ej10');
    /*while (x<=100) {
    document.write(x);
    document.write('<br>');
    x=x+1;
    }*/
   while (x <= 100) {
        res += x + '<br>';
        x = x + 1;
    }
    var div10 = document.getElementById('ej10');
    div10.innerHTML = res;
}

function ej11(){
    var x = 1;
    var suma = 0;
    var valor;
    
    while (x <= 5) {
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }
    var div11 = document.getElementById('ej11');
    div11.innerHTML = 'La suma de los valores es ' + suma;
}

function ej12(){
    /*var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        document.write('El valor '+valor+' tiene ');
        if (valor<10)
        document.write('Tiene 1 dígitos')
        else
            if (valor<100) {
            document.write('Tiene 2 dígitos');
            }
            else {
            document.write('Tiene 3 dígitos');
            }
        //document write('<br>');
        document.write('<br>');
    }while(valor!=0);*/
    var valor;
    var res = ''; // Variable para almacenar la salida

    do {
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);   
        res += 'El valor ' + valor + ' tiene ';
        if (valor < 10) {
            res += 'Tiene 1 dígito';
        } else if (valor < 100) {
            res += 'Tiene 2 dígitos';
        } else {
            res += 'Tiene 3 dígitos';
        } 
        res += '<br>';
    } while (valor != 0);
    var div12 = document.getElementById('ej12');
    div12.innerHTML = res;

}

function ej13(){
    var f;
    var res = '';
    for(f=1; f<=10; f++)
    {
        res += f + '<br>';
    }
    var div13 = document.getElementById('ej13');
    div13.innerHTML = res;
}

function ej14(){
    var div14 = document.getElementById('ej14');
    div14.innerHTML = 'Cuidado<br>'+'Ingresa tu documento correctamente<br>'+'Cuidado<br>'+
    'Ingresa tu documento correctamente<br>'+ 'Cuidado<br>'+'Ingresa tu documento correctamente<br>';

}

function ej15(){
    /*function mostrarMensaje() {
        document.write('Cuidado<br>');
        document.write('Ingresa tu documento correctamente<br>');
    }
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
    }*/
    function mostrarMensaje() {
        return 'Cuidado<br>Ingresa tu documento correctamente<br>';
    }
    var result = mostrarMensaje() + mostrarMensaje() + mostrarMensaje();
    var div15 = document.getElementById('ej15');
    div15.innerHTML = result;

function ej16(){
    /*function mostrarRango(x1,x2) {
            var inicio;
            for(inicio=x1; inicio<=x2; inicio++) {
                document.write(inicio+'');
        }
        }
        var valor1,valor2;
        valor1 = prompt('Ingresa el valor inferior:', '');
        valor1 = parseInt(valor1);
        valor2 = prompt('Ingresa el valor superior:', '');
        valor2 = parseInt(valor2);
        mostrarRango(valor1,valor2);*/
        function mostrarRango(x1, x2) {
            var result = '';
            var inicio;
            for (inicio = x1; inicio <= x2; inicio++) {
                result += inicio + '<br>';
            }
            return result;
        }
    
        var valor1, valor2;
        valor1 = prompt('Ingresa el valor inferior:', '');
        valor1 = parseInt(valor1);
        valor2 = prompt('Ingresa el valor superior:', '');
        valor2 = parseInt(valor2);
        var div16 = document.getElementById('ej16');
        div16.innerHTML = mostrarRango(valor1, valor2);
}

function ej17(){
    function convertirCastellano(x) {
        switch (x) {
            case 1: return 'uno';
            case 2: return 'dos';
            case 3: return 'tres';
            case 4: return 'cuatro';
            case 5: return 'cinco';
            default: return 'valor incorrecto';
        }
    }

    var valor = prompt('Ingresa un valor entre 1 y 5:', '');
    valor = parseInt(valor);
    if (isNaN(valor) || valor < 1 || valor > 5) {
        var resultado = 'valor incorrecto';
    } else {
        var resultado = convertirCastellano(valor);
    }
    var div17 = document.getElementById('ej17');
    div17.innerHTML = resultado;
}

function ej18(){
    var x = prompt('Ingresa un valor entre 1 y 5:', '');
    x = parseInt(x);
    var result;
    if (isNaN(x) || x < 1 || x > 5) {
        result = 'valor incorrecto';
    } else {
        switch (x) {
            case 1: result = 'uno'; break;
            case 2: result = 'dos'; break;
            case 3: result = 'tres'; break;
            case 4: result = 'cuatro'; break;
            case 5: result = 'cinco'; break;
        }
    }
    var div18 = document.getElementById('ej18');
    div18.innerHTML = result;   
}