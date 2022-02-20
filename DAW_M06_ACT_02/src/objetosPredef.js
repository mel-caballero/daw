window.onload = function() {
  lista();
  testCookie();
}

/* Ejercicio 2 
  Dentro de index.html añade un div con id “listaPropiedades”. Utiliza la función onload de window para que una vez cargado todo el HTML se llame a una función que cree dentro de “listaPropiedades” una lista desordenada HTML ( <UL> <LI></LI> .... </UL>) como la mostrada a continuación y rellenada con los valores obtenidos de los métodos de los objetos predefinidos JavaScript:
  */
  function lista() {
    let d = new Date();
    document.getElementById("listaPropiedades").innerHTML = 
    "<ul><li>Valor máximo que puede tener un número en JavaScript : " + Number.MAX_VALUE
    + "</li><li>Valor mínimo que puede tener un número en JavaScript : " + Number.MIN_VALUE
    + "</li><li>Altura total de la pantalla : " + screen.height
    + "</li><li>Anchura total de la pantalla : " + screen.width
    + "</li><li>Altura interna de la ventana : " + screen.availHeight
    + "</li><li>Anchura interna de la ventana : " + screen.availWidth
    + "</li><li>URL de la página web : " + document.URL
    + "</li><li>Título de la página web : " + document.title
    + "</li><li>Un valor aleatorio entre 0 y 200 : " + Math.floor(Math.random() * 201)
    + "</li><li>Sistema operativo del ordenador : " + navigator.platform
    + "</li><li>La fecha actual es : " + d.getDate().toString().padStart(2, '0') + "-" + (d.getMonth() + 1).toString().padStart(2, '0') + "-" + d.getFullYear()
    + "</li><li>La hora actual es : " + d.getHours().toString().padStart(2, '0') + ":" + d.getMinutes().toString().padStart(2, '0') + "h"
    + "</li></ul>";
  }

/* Ejercicio 3 
Añade al HTML un input con id=”nombre” y un botón que al clicarlo establezca como valor de la cookie “nombre_usuario” el texto introducido por el usuario dentro del input. 
*/
function setCookie(){
  let valorInput = document.getElementById("nombre").value;
  let apellidoInput = document.getElementById("apellido").value;
  document.cookie = "nombre_usuario=" + valorInput;
  document.cookie = "apellido_usuario=" + apellidoInput;
  console.log("set cookie : " + document.cookie);
}

/* Ejercicio 4 
Programa que una vez cargada la web, el valor  del input con id “nombre” sea el valor guardado en la cookie “nombre_usuario”.
*/
function testCookie(){
  /*
  console.log("test cookie : " + document.cookie)
  let positionStart = document.cookie.indexOf("=")+1;
  let positionEnd = document.cookie.indexOf(";");
  if (positionEnd === -1){
    positionEnd = document.cookie.length;
  }
  let text = document.cookie.substring(positionStart, positionEnd);
  console.log("text : " + text);
  document.getElementById("nombre").value = text
  */
  let vector = document.cookie.split(';');
  let vector_limpio = vector.map(item=> item.trim())
  vector_limpio.forEach(item=> {
    let valores= item.split('=')
    if (valores[0] === 'nombre_usuario') document.getElementById("nombre").value = valores[1]
    if (valores[0] === 'apellido_usuario') document.getElementById("apellido").value = valores[1]
  })
  
}

/* Ejercicio 5
Añade al HTML un botón con el texto “ACIERTA NUMERO”. 
 * Programa que al clicarlo se abra una nueva ventana “numero.html”. 
 * La nueva ventana ha de ser de 300x300px, sin barra de menús y situada en medio de la pantalla. 
*/
let new_window;
let height = 300;
let width = 300;
let screenHeight = parseInt((screen.height-height)/2);
let screenWidth = parseInt((screen.width-width)/2);
function openWindow(){
  new_window = window.open("numero.html", "", 
    `scrollbars=no 
    resizable=false 
    height=${height} 
    width=${width} 
    top=${screenHeight} 
    left=${screenWidth}`
  );
  
  setTimeout(function(){
    closeWindow();
  }, 10000)
}

function showRandom(num) {
  console.log("El numero es : " + num);
}

function closeWindow() {
  new_window.close();
}