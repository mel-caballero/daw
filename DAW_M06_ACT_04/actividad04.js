/* EJERCICIO 2 
Programa que al clicar en "AÑADE PARTICIPANTE" se añada el nombre introducido en el input "Nombre" como un nuevo participante con el color de texto igual al escrito en el segundo input "Color".
*/

function addParticipante() {
  
  const nombre = document.getElementById("nombre").value
  const color = document.getElementById("color").value

  const nodo = document.createElement("li")
  const textoNodo = document.createTextNode(nombre) 
  nodo.appendChild(textoNodo)
  document.getElementById("listadoParticipantes").appendChild(nodo).style.color = color

  document.getElementById("nombre").value = ""
  document.getElementById("color").value = "#000000"
  
}

/* EJERCICIO 3 
Programa que al clicar en "FINALIZA COMPETICION" el color de fondo del 
primer participante se cambie a verde, 
el segundo a azul, 
el tercero a naranja 
y el último a rojo. 
Si solo hay un participante se ha de mostrar verde. Captura los errores.
*/

function finalizaCompeticion() {

  document.getElementById("listadoParticipantes").style.backgroundColor = "transparent"
  
  const array = document.getElementById("listadoParticipantes").children
  //console.log(array.length)

  colors = ["green", "blue", "orange"]

  for (let i = 0; i < array.length; i++){
    if (i < colors.length) array[i].style.backgroundColor = colors[i]
  }
  
  if (array.length > 1) document.getElementById("listadoParticipantes").lastChild.style.backgroundColor = "red"
  
  const buttons = document.getElementsByTagName("button")
  const inputs = document.getElementsByTagName("input")

  for (i=0; i < buttons.length; i++){
    buttons[i].disabled = true
  }

  for (i=0; i < inputs.length; i++){
    inputs[i].disabled = true
  }

}

/* EJERCICIO 4 
Programa que al clicaren "BORRA PARTICIPANTE" se borre el LI de la lista de participantes que sea al número de hijo igual al escrito en el 3r input "Posición".
*/

function borraParticipante() {

  const posicion = document.getElementById("posicion").value - 1
  const nodoPadre = document.getElementById("listadoParticipantes")
  //console.log(nodoPadre.children[posicion])
  //console.log(nodoPadre.children.length)
  if (posicion < nodoPadre.children.length ) {
    nodoPadre.removeChild(nodoPadre.children[posicion])
    document.getElementById("posicion").value = ""
  } else document.getElementById("msgError").innerHTML = "ERROR : el número a borrar es superior a los elementos de la lista."
  
}

/* EJERCICIO 5 
Programa que al clicar en "MUEVE PARTICIPANTE" se mueva el LI de la lista de participantes que sea al número de hijo igual al escrito en el  3r input "Posición" y se sitúe en la posición escrita en el 4o input "Posición Final".
*/

function mueveParticipante() {
  const posicion = document.getElementById("posicion").value - 1
  const posicionFinal = document.getElementById("posicionFinal").value - 1
  const nodoPadre = document.getElementById("listadoParticipantes")
  
  if (posicion < nodoPadre.children.length && posicionFinal < nodoPadre.children.length) {
    const lis = document.getElementsByTagName("li")
    //console.log("lis pos : " + lis[posicion].innerHTML)
    let pos = lis[posicion].innerHTML
    let posFin = lis[posicionFinal].innerHTML

    let color1 = lis[posicion].style.color
    let color2 = lis[posicionFinal].style.color

    //lis[posicion].innerHTML = posFin
    //posFin = lis[posicionFinal].innerHTML = pos
    nodoPadre.insertBefore(nodoPadre.children, nodoPadre.children[posicion])

    lis[posicion].style.color = color2
    lis[posicionFinal].style.color = color1
    



    document.getElementById("msgError").innerHTML = ""
    document.getElementById("msgErrorFinal").innerHTML = ""
  } else if (posicion >= nodoPadre.children.length && posicionFinal >= nodoPadre.children.length) {
    document.getElementById("msgError").innerHTML = "ERROR : el número a borrar es superior a los elementos de la lista."
    document.getElementById("msgErrorFinal").innerHTML = "ERROR : el número a mover es superior a los elementos de la lista."
  } else if (posicion >= nodoPadre.children.length) {
    document.getElementById("msgError").innerHTML = "ERROR : el número a borrar es superior a los elementos de la lista."
  } else {
    document.getElementById("msgErrorFinal").innerHTML = "ERROR : el número a mover es superior a los elementos de la lista."
  }
  document.getElementById("posicion").value = ""
  document.getElementById("posicionFinal").value = ""
}

/* EJERCICIO 6 
Programa que al clicar en "MODIFICA PARTICIPANTE" se cambie el texto del LI de la lista que sea al número de hijo igual al escrito en el 3r input “Posición” y se sustituya por el texto escrito en el 1r input "Nombre".
*/

function modificaParticipante() {
  const nombreMod = document.getElementById("nombre").value
  const posMod = document.getElementById("posicion").value -1

  const lisMod = document.getElementsByTagName("li")
  lisMod[posMod].innerHTML = nombreMod

  document.getElementById("nombre").value = ""
  document.getElementById("posicion").value = ""
}