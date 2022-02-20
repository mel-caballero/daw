
window.onload = function() {
  generateRandom();
  setCounter();
}

/* Ejercicio 6
Vincula a “numero.html” un archivo “numero.js”. Programa en “numero.js” que al cargar el HTML se muestre una cuenta atrás desde 8 hasta 0 que se actualice cada  segundo. Cierra “numero.html” al llegar a 0.
*/
function setCounter() {
  let count = 8;
  let interval = setInterval(myTimer, 1000);
  function myTimer() {
    document.getElementById("contador").innerHTML = "Contador : " + `${count}`;
    if (count === 0) {window.clearInterval(interval)}
    --count;
  }
}

/* Ejercicio 7
Programa en “numero.js” que una vez cargado el HTML se genere un número aleatorio entre 0 y 10 (ambos incluidos) y lo muestre por la consola de index.html.
*/

let num;

function generateRandom() {
  num = Math.floor(Math.random() * 11);
  window.opener.showRandom(num);
}

/* Ejercicio 8 
Añade a “numero.html” un input y un botón y programa en “numero.js” que al clicar sobre el botón se muestre en “numero.html” y en “index.html” un mensaje indicando si el valor dentro del input es mayor, menor o igual al número aleatorio generado. 
*/

function checkNumber() {
  let input = parseInt(document.getElementById("numToCheck").value);
  if (isNaN(input)) {
    document.getElementById("message").innerHTML = "Introduce un numero.";
    document.getElementById("numToCheck").value = "";
  }else if (input < num) {
    document.getElementById("message").innerHTML = input + " es un valor inferior.";
    document.getElementById("numToCheck").value = "";
  }else if (input > num) {
    document.getElementById("message").innerHTML = " es un valor mayor.";
    document.getElementById("numToCheck").value = "";
  } else {
    /* Ejercicio 9
    Programa que cuando el usuario acierte se cierre “numero.html”.
    */
    window.opener.closeWindow();
  }
}