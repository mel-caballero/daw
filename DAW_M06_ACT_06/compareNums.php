<?php
  session_start();

  /* EJERCICIO 6
  6. Escribir un valor en un input del apartado GUARDAR COMBINACION envía una petición al servidor con el API Fetch pasando como mínimo el valor escrito. */

  if (isset($_GET['num'])) {
      
    $number = $_GET["num"];
    $position = substr($_GET["pos"], -1);

    $status = true;

    if ($number != $_SESSION["numbers"][$position-1]) {
      $status = false;
    }

    if ($status){
      /* EJRECICIO 6.1. 
      Si el digito se corresponde con el digito guardado en el servidor, retorna al cliente un mensaje indicando que el valor es correcto.*/
      echo '{"resCode":"OK", "resText":"'.$position.'"}';
    }
    else {
      /* EJRECICIO 6.2. 
      Si el valor no se corresponde, retorna al cliente un mensaje indicando que el valor no es correcto. */
      echo '{"resCode":"ERROR. El número no coincide", "resText":"'.$position.'"}';
    }

  }