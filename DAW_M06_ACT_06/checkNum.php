<?php
  /* EJERCICIO 4
  Escribir un valor en un input del apartado GUARDAR COMBINACION envía una petición al servidor con el API XMLHttpRequest pasando como mínimo el valor escrito. */
  if (isset($_POST["num"])) {

    $number = $_POST["num"];
    $position = substr($_POST["pos"], -1);
    @header("Content-type: application/json");
    
    /* EJERCICIO 4.1. 
    El servidor ha de comprobar si es un valor numérico de un único dígito y positivo. */
    if (!is_numeric($number) || !($number >= 0 && $number < 10)){
      /* EJERCICIO 4.2. 
      Si el valor es correcto, retorna al cliente un mensaje indicando que el valor es correcto. */
      echo '{"resCode":"ERROR. El valor tiene que ser del 0 al 9", "resText":"'.$position.'"}';
    } else {
      /* EJERCICIO 4.3. 
      Si el valor no es correcto, retorna al cliente un mensaje indicando que el valor no es correcto. */
      echo '{"resCode":"OK", "resText":"'.$position.'"}';
    }
  }