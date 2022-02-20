
let text = ""

const product = document.getElementById("product")
const codeBar = document.getElementById("codeBar")
const day = document.getElementById("day")
const month = document.getElementById("month")
const year = document.getElementById("year")
const offer = document.getElementById("offer")
const cbs = myForm['foodType']
const data = document.getElementById("data")
const submit = document.getElementById("enviar")

function register(event) {
  event.preventDefault()
  const validate = validateForm()
  submit.disabled = true
  return validate
}

function clearData() {
  product.value = ""
  codeBar.value = ""
  day.value = ""
  month.value = ""
  year.value = ""
  offer.value = "normal"
  for (let i=0; i<cbs.length; i++){
    cbs[i].checked = false
  }  
  data.innerHTML = ""
  text = ""
  submit.disabled = false
}

/* EJERCICIO 3 
Controla que si no se selecciona algún tipo de alimento (Congelado, Fruta o Snak) no se envíe el formulario al clicar en Regístrate.
*/

function validateForm() {
  let checks = false
  let checkFields = writeTextArea()
  
  for (let i=0; i<cbs.length; i++){
    if (cbs[i].checked == true) checks = true
  }
  if (!checks || checkFields==false) { 
    data.innerHTML = "ERROR, no se ha enviado el formulario."
  } else {
    checkFields
  }
  return checks
}

/* EJERCICIO 4 
Controla que cada vez que el usuario escribe una letra en un input se muestre un mensaje en el TextArea con el valor del input y si su valor es válido. Para saber si un input es válido ten en cuenta qué:
  - No se debe enviar el formulario si alguno de los inputs es incorrecto.
  - InputNombre no puede empezar por un número y debe contener entre 3 y 20 caracteres.
  - InputCodigo debe tener 13 números, ninguna letra (puedes utilizar una expresión regular para validar).
  - InputDia , inputMes y inputAno deben formar una fecha válida.
*/

function writeTextArea() {
  text = ""
  let pass = true
  let cPro = checkProduct()
  let cCode = checkCode()
  let cDate = checkDate()
  if (!cPro && !cCode && !cDate) {
    pass = false
  }  
  text += "offer : " + offer.options[offer.selectedIndex].text + "\n" 
  text += "Tipo : "
  for (let i=0; i<cbs.length; i++){
    if (cbs[i].checked == true) text = text + cbs[i].value + " "
  }
  data.innerHTML = text
  return pass
}

function checkProduct() {
  let result = true
  let checkProduct = /^[0-9]/
  text = text + "Producto : "
  if (!checkProduct.test(product.value)) {
    if (product.value.length >= 3 && product.value.length <= 20) {
      text += product.value + "\n"
    } else {
      text += "ERROR. El nombre debe contener entre 3 y 20 carácteres.\n"
      result = false
    } 
  } else {
    text += "ERROR. El nombre no puede empezar con un número.\n"
    result = false
  }
  return result
}

function checkCode() {
  let result = true
  let checkCode = /^[0-9]+$/
  text += "Código de barras : "
  if (checkCode.test(codeBar.value)) {
    if (codeBar.value.length === 13) {
      text +=  codeBar.value + "\n"
    } else {
      text += "ERROR. El código debe contener 13 caráceteres.\n"
      result = false
    }
  } else {
    text += "ERROR. El código no puede contener letras.\n"
    result = false
  } 
  return result
}

function checkDate() {
  let result = true
  text += "Caducidad : "
  let dia = parseInt(day.value)
  let mes = month.value
  let any = year.value
  let currentYear = new Date().getFullYear()
  let dias = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
  
  if (dia >= 1 && dia <= 31) {
     text += day.value + "/"
  } else {
    text += "/"
    result = false
  }

  if ((parseInt(mes) > 0 && parseInt(mes) <= dias.length) || mes == "") {
    if (mes != "") {
      if (dia <= dias[parseInt(mes) - 1 ]) {
        text += month.value + "/"
      } else {
        text += "/"
        result = false
      }
    } else {
      text += "/"
      result = false
    }
  } else {
    text += "/"
    result = false
  }

  if (parseInt(any) >= currentYear || any == "") {
    text += year.value + "\n"
  } else {
    text += "\n"
    result = false
  }

  if(!result) {text += "ERROR. Fecha incorrecta\n"}
  return result
}

/* EJERCICIO 5 
Programa con JavaScript que al clicar sobre Guardar Datos se guarden todos los datos de los inputs en una cookie para cada input. Pej: para el input inputNombre crea una cookie que guarde su valor, para el input inputCodigo crea otra cookie con su valor, etc...)
*/
function saveData() {
  setCookie("product", product.value, 1)
  setCookie("codeBar", codeBar.value, 1)
  setCookie("day", day.value, 1)
  setCookie("month", month.value, 1)
  setCookie("year", year.value, 1)
  setCookie("offer", offer.options[offer.selectedIndex].index, 1)
  let text = ""
  for (let i=0; i<cbs.length; i++){
    if (cbs[i].checked == true) text = text + cbs[i].value + " "
  }
  setCookie("cbs", text, 1)
}

function setCookie(cName, cValue, days) {
  let d = new Date()
  d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000))
  document.cookie = cName + "=" + cValue + ";" + "expires=" + d.toUTCString()
}

/* EJERCICIO 6
Programa con JavaScript que al clicar sobre Recupera Datos se sustituya el valor de los inputs por el valor almacenado en su correspondiente cookie.
Comenta las funciones que has utilizado y todos los bloques de código explicando cuál es su funcionalidad.
*/

function recoverData() {
  document.getElementById("product").value = getCookie("product")
  document.getElementById("codeBar").value = getCookie("codeBar")
  document.getElementById("day").value = getCookie("day")
  document.getElementById("month").value = getCookie("month")
  document.getElementById("year").value = getCookie("year")
  document.getElementById("offer").selectedIndex = getCookie("offer")
  
  let cbsCookie = getCookie("cbs").split(" ")
  let cbsArray = cbsCookie.map(item=> item.trim())
  for (let i=0; i<cbs.length; i++){
    for (let y=0; y<cbsArray.length; y++){
      if (cbs[i].value == cbsArray[y]) cbs[i].checked = true
    }
  }
}

function getCookie(cName) {
  /*let name = cName + "="
  let aCookies = document.cookie.split(';')
  for (let i = 0; i < aCookies.length; i++) {
    let c = aCookies[i]
    while (c.charAt(0) == '') { 
      c.substring(1) 
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length) 
    }
  } return ""*/

  let vector = document.cookie.split(';');
  let vector_limpio = vector.map(item=> item.trim())
  let respuesta = ""
  vector_limpio.forEach(item=> {
    let valores= item.split('=')
    if (valores[0] === cName) respuesta = valores[1]
  })
  return respuesta
}