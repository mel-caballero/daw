let num1 = document.getElementById("num1");
let num2 = document.getElementById("num2");
let num3 = document.getElementById("num3");
let num4 = document.getElementById("num4");
let saveResponse = document.getElementById("saveResponse");

let chck1 = document.getElementById("chck1"); 
let chck2 = document.getElementById("chck2"); 
let chck3 = document.getElementById("chck3"); 
let chck4 = document.getElementById("chck4"); 
let compResponse = document.getElementById("compareResponse");

/* EJERCICIO 3
Al clicar en el botón GUARDAR COMBINACION envía una petición al servidor con el API XMLHttpRequest pasando la combinación formada por los 4 números escritos en los inputs. */
function saveCombination() {
  let xmlHttp = new XMLHttpRequest();
  let url = "saveCombination.php?num1=" + num1.value + "&num2=" + num2.value + "&num3=" + num3.value + "&num4=" + num4.value;
  xmlHttp.open("GET", url, true);
  xmlHttp.setRequestHeader("Content-Type", "application/json");
  xmlHttp.onreadystatechange = function() {
    if (xmlHttp.readyState == 4) {
      if (xmlHttp.status == 200) {
        let response = xmlHttp.responseText;
        let objJSON = JSON.parse(response);
        let resCode = objJSON.resCode;
        let resText = objJSON.resText;

        if (resCode == 'OK'){
          /* EJERCICIO 3.2. 
          Si la combinación es válida se guarda en una (o varias) variables de sesión y retorna al cliente un mensaje indicando que se ha guardado el valor. */
          saveResponse.innerHTML = resText;
          num1.innerHTML = "";
          num2.innerHTML = "";
          num3.innerHTML = "";
          num4.innerHTML = "";
        } else {
          /* EJERCICIO 3.3. 
          Si la combinación no es válida se retorna al cliente un mensaje indicando que no se ha guardado el valor porque la combinación no es válida. */
          saveResponse.innerHTML = resCode + ". "+ resText;
        }
      } else {
        console.log('ERROR 404.La URL del recurso no se ha encontrado.');
      }
    } else {
      console.log('ERROR. No se ha podido cargar la respuesta');
    }
  }
  xmlHttp.send();
}

/* EJERCICIO 4
Escribir un valor en un input del apartado GUARDAR COMBINACION envía una petición al servidor con el API XMLHttpRequest pasando como mínimo el valor escrito. */
function chechNum(val) {
  let xmlHttp = new XMLHttpRequest();
  let url = "checkNum.php";
  let params = "num=" + val.value + "&pos=" + val.id;
  xmlHttp.open("POST", url, true);
  xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
  xmlHttp.onreadystatechange = function() {
    if (xmlHttp.readyState == 4) {
      if (xmlHttp.status == 200) {
        let response = xmlHttp.responseText;
        let objJSON = JSON.parse(response);
        let resCode = objJSON.resCode;
        let resText = objJSON.resText;
        let respId = "resp" + resText;
        let resp = document.getElementById(respId);

        

        /* EJERCICIO 4.4. Ambos mensajes se muestran al usuario quedando claro a qué input se refiere. */
        if (resCode == 'OK'){
          /* EJERCICIO 4.2. 
          Si el valor es correcto, retorna al cliente un mensaje indicando que el valor es correcto. */
          resp.classList.remove("fa", "fa-times", "text-danger");
          resp.classList.add("fa", "fa-check", "text-success");
          saveResponse.innerHTML = "";
        } else {
          /* EJERCICIO 4.3. Si el valor no es correcto, retorna al cliente un mensaje indicando que el valor no es correcto. */
          if (val.value.length === 0) {
            resp.classList.remove("fa", "fa-times", "text-danger");
            resp.classList.remove("fa", "fa-check", "text-success");
            saveResponse.innerHTML = "";
          } else {
          resp.classList.remove("fa", "fa-check", "text-success");
          resp.classList.add("fa", "fa-times", "text-danger");
          saveResponse.innerHTML = resCode;
          }
        }
      } else {
        console.log('ERROR 404.La URL del recurso no se ha encontrado.');
      }
    }
  }
  xmlHttp.send(params);
}

/* EJRECICIO 5
Al clicar en el botón CHECK COMBINACION envía una petición al servidor con el API Fetch pasando la combinación formada por los 4 números escritos en los inputs. */
function checkCombination() {
  let configFetch = { 
    method: "GET",
    headers: { 'Content-Type': 'application/json' } 
  };
  let params = "num1=" + chck1.value + "&num2=" + chck2.value + "&num3=" + chck3.value + "&num4=" + chck4.value;
  let promise = fetch("checkCombination.php?" + params, configFetch); 

  promise.then(function (response) {
    if (response.ok) { 
      console.log("Respuesta promesa OK");
    } 
    response.json().then( function (objJSON) {
      let resCode = objJSON.resCode;
      let resText = objJSON.resText;

      /* EJRECICIO 5.4. 
      Ambos mensajes se muestran al usuario. */
      if (resCode == 'OK'){
        /* EJRECICIO 5.2. 
        Si la combinación es igual, retorna al cliente un mensaje indicando que se ha guardado el valor. */
        compResponse.innerHTML = resText;
      } else {
        /* EJRECICIO 5.3. 
        Si la combinación no es igual, retorna al cliente un mensaje indicando que no se ha acertado la combinación. */
        compResponse.innerHTML = resCode + ". "+ resText;
      }
    });
  }).catch(function (error) {
    console.log('Error con la petición:' + error.message);
  });
}

/* EJERCICIO 6
6. Escribir un valor en un input del apartado GUARDAR COMBINACION envía una petición al servidor con el API Fetch pasando como mínimo el valor escrito. */
function compareNums(val) {

  let configFetch = { 
    method: "GET",
    headers: { 'Content-Type': 'application/json' } 
  };
  let params = "num=" + val.value + "&pos=" + val.id;
  let promise = fetch("compareNums.php?" + params, configFetch); 

  promise.then(function (response) {
    if (response.ok) { 
      console.log("Respuesta promesa OK");
    } 
    response.json().then( function (objJSON) {
      let resCode = objJSON.resCode;
      let resText = objJSON.resText;

      let compId = "comp" + resText;
      let compare = document.getElementById(compId);

      /* EJRECICIO 6.3. 
      Ambos mensajes se muestran al usuario quedando claro a qué input se refiere. */
      if (resCode == 'OK'){
        /* EJRECICIO 6.1. 
        Si el digito se corresponde con el digito guardado en el servidor, retorna al cliente un mensaje indicando que el valor es correcto.*/
        compare.classList.remove("fa", "fa-times", "text-danger");
        compare.classList.add("fa", "fa-check", "text-success");
        compareResponse.innerHTML = "";
      } else {
        /* EJRECICIO 6.2. 
        Si el valor no se corresponde, retorna al cliente un mensaje indicando que el valor no es correcto. */
        if (val.value == "") {
          compare.classList.remove("fa", "fa-times", "text-danger");
          compare.classList.remove("fa", "fa-check", "text-success");
          compareResponse.innerHTML = "";
        } else {
          compare.classList.remove("fa", "fa-check", "text-success");
          compare.classList.add("fa", "fa-times", "text-danger");
          compareResponse.innerHTML = resCode;
        }
      }
    });
  }).catch(function (error) {
    console.log('Error con la petición:' + erroš.message);
  });
}