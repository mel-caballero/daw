/* EJERCICIO 2
Crea una nueva clase “Extra” para almacenar: el precio y la url de la imagen del extra y una función “getHTML()” que al ejecutarse retorne un código HTML con la imagen y el precio del extra.
*/

/* Primera versión del ejercicio 
function Extra() {
  this.precio
  this.url
  this.getHTML = function () {
    return "<span> <img src='" + this.url + "'/>" + this.precio + "€</span>"
  }
}
*/

function Extra(nombre="", precio=10, url="") {
  this.nombre = nombre
  this.precio = precio
  this.url = url
  this.getHTML = function () {
    return "<span> <img src='" + this.url + "'/>" + this.precio + "€</span>"
  }
}

/* EJERCICIO 3
Una vez realizada la clase “Extra” deberá ser capaz de validar el siguiente código:
Mostrando por consola un mensaje parecido a: “<span> <img src='imgs/concha_azul.jpeg'/> 10€</span>”
*/

var extra = new Extra();
extra.nombre = "Airbag";
extra.url = "imgs/concha_azul.jpeg";
console.log(extra.getHTML());
//extrasDisponibles.push(extra);

/* EJERCICIO 4 
Crea un objeto “Coche” que almacene: el nombre del coche, su velocidad, una array vacía de extras,  una función que reciba un extra y lo añada a su array y una función que retorne un código HTML con los datos del Coche y de los extras
*/

/* Primera versión del ejercicio 
function Coche() {
  this.nombre
  this.velocidad
  this.extras = []
  this.addExtra = function (extra) {
      this.extras.push(extra)
  }
  this.getHTML = function() {
    let extraArray = ""
    this.extras.forEach(function (elemento) { extraArray += elemento.getHTML() })

    return "<span>" + this.nombre + " " + this.velocidad + "km/h [" + extraArray + "]</span><br />"
  }
}
*/

function Coche(nombre="", velocidad="10") {
  this.nombre = nombre
  this.velocidad = velocidad
  this.extras = []
  this.addExtra = function (extra) {
      this.extras.push(extra)
  }
  this.getHTML = function() {
    let extraArray = ""
    this.extras.forEach( (elemento) => { extraArray += elemento.getHTML() })

    return "<span>" + this.nombre + " " + this.velocidad + "km/h [" + extraArray + "]</span><br />"
  }
}

/* EJERCICIO 5 
Una vez realizada la clase “Coche”, deberá ser capaz de validar el siguiente código:
Mostrando por consola un mensaje parecido a: <span> Carricoche  10km/h [<span> <img src='imgs/concha_azul.jpeg'/> 10€</span>]</span><br />”
*/

var coche = new Coche();
coche.nombre = "Carricoche";
coche.addExtra(extra);
console.log(coche.getHTML());

/* EJERCICIO 6 
Crea un array global extrasDisponibles para almacenar todos los extras disponibles y añádele el extra creado anteriormente y otro extra. 
*/

const extrasDisponibles = []
extrasDisponibles.push(extra)

var extra2 = new Extra();
extra2.nombre = "Estrella";
extra2.url = "imgs/estrella.jpeg";
extrasDisponibles.push(extra2)

/* EJERCICIO 7 
Programa que una vez cargada la web llame a una función mostrarExtras() que muestre en el HTML todos los extras que contiene extrasDisponibles.
*/

function mostrarExtras() {
  let extraArray = ""
  extrasDisponibles.forEach(function (elemento) { extraArray += elemento.getHTML() })
  console.log(extraArray)
  document.getElementById("extras").innerHTML = extraArray
  loadExtrasOption()
}

window.onload = function() {
  mostrarExtras()
  mostrarCoches()
  loadExtrasOption()
  loadCochesOption()
}

/* EJERCICIO 8 
Crea un array associativa global de nombre cochesDisponibles para almacenar todos los coches creados según su nombre y añádele el coche creado anteriormente. 
*/

const cochesDisponibles = [] 
cochesDisponibles.push({nombre: coche.nombre, coche: coche})
console.log(cochesDisponibles)


/* EJERCICIO 9 
Programa que una vez cargada la web llame a una función mostrarCoches() que muestre en el HTML todos los coches (con sus extras) que contiene coches disponibles
*/

function mostrarCoches() {
  let extraArray = ""
  cochesDisponibles.forEach(function (elemento) { extraArray += elemento.coche.getHTML() })
  console.log(extraArray)
  document.getElementById("disponibles").innerHTML = extraArray
}

/* EJERCICIO 10 
Crea la estructura HTML que se muestra a continuación y programa el botón ADD EXTRA para que añada en extrasDisponibles un nuevo extra con el precio indicado y la imagen seleccionada del select y actualice visualmente todos los extras disponibles (llama a mostrarExtras() )
*/

function addExtraDisponible(){
  let nombre = ""
  let precio = document.getElementById("precio").value
  let imagen = document.getElementById("imagen").value
  let url = "imgs/" + imagen + ".jpeg"
  var extra = new Extra(nombre, precio, url);
  extrasDisponibles.push(extra)
  mostrarExtras()
  document.getElementById("precio").value = ""
} 

/* EJERCICIO 11 
Crea la estructura HTML que se muestra a continuación y programa el botón BORRAR para que borre de extrasDisponibles el número de extra indicado (el número es la posición que ocupa el extra dentro del array de extrasDisponibles)
*/

function deleteExtraDisponible() {
  let num = document.getElementById("numero").value - 1
  extrasDisponibles.splice(num, 1)
  mostrarExtras()
  document.getElementById("numero").value = ""
}

/* EJERCICIO 12 
Crea la estructura HTML que se muestra a continuación y programa el botón ADD COCHE para que añada a cochesDisponibles un nuevo coche con el nombre y la velocidad máxima indicada y actualice visualmente todos los coches disponibles (llama a mostrarCoches() )
*/

function addCoche() {
  let nombre = document.getElementById("nombre").value
  let velocidad = document.getElementById("velocidad").value
  
  var coche = new Coche(nombre, velocidad);
  
  cochesDisponibles.push({nombre: coche.nombre, coche: coche})
  
  mostrarCoches()
  loadCochesOption()
  
  document.getElementById("nombre").value = ""
  document.getElementById("velocidad").value = ""
}

/* EJERCICIO 13 
Crea la estructura HTML que se muestra a continuación y modifica  mostrarExtras() para que por cada extra se añada un option al select con el número de extra , y modifica mostrarCoches() para que por cada coche  se añada un option al select con el nombre del coche.
*/

  function loadExtrasOption() {
    let total = document.getElementById("extraOption")
    while (total.length > 0) {
      total.remove(0);
    }

    for (let i = 0; i < extrasDisponibles.length; i++) {
      var option = document.createElement("option");
      option.value = i;
      option.text = i + 1;
      document.getElementById("extraOption").appendChild(option)
    }
  }

  function loadCochesOption() {
    let total = document.getElementById("nombreCoche")
    while (total.length > 0) {
      total.remove(0);
    }

    for (let i = 0; i < cochesDisponibles.length; i++) {
      let option = document.createElement("option");
      option.value = cochesDisponibles[i].nombre;
      option.text = cochesDisponibles[i].nombre;
      document.getElementById("nombreCoche").appendChild(option)
    }
  }
  

/* EJERCICIO 14 
Programa el botón ADD EXTRA COCHE para que añada al coche seleccionado  el número de extra seleccionado y actualice visualmente todos los coches disponibles.
*/

function addExtraCoche() {
  let extra = document.getElementById("extraOption").value
  let nombreCoche = document.getElementById("nombreCoche").value
  let extraAdd

  extrasDisponibles.forEach(function (elemento, indice) { 
    if (indice == extra) {
      extraAdd = elemento
      console.log(extraAdd)
    }
  })
  
  cochesDisponibles.forEach(function (elemento, indice) { 
    if (elemento.nombre === nombreCoche) {
      elemento.coche.addExtra(extraAdd)
    }
  })
  
  mostrarCoches()
}