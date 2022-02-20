<?php
  session_start();
  /* EJRECICIO 5
  Al clicar en el botón CHECK COMBINACION envía una petición al servidor con el API Fetch pasando la combinación formada por los 4 números escritos en los inputs. */
  if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['num3']) && isset($_GET['num4'])) {
      
    $guess = array($_GET['num1'], $_GET['num2'], $_GET['num3'], $_GET['num4']);

    /* EJRECICIO 5.1. 
    El servidor ha de comprobar si son iguales a la combinación guardada. */
    $status = true;
    if ($guess != $_SESSION["numbers"]) {
      $status = false;
    }

    if ($status){
      /* EJRECICIO 5.2. 
      Si la combinación es igual, retorna al cliente un mensaje indicando que se ha guardado el valor. */
      echo '{"resCode":"OK", "resText":"¡Wiiii! ¡Has acertado!"}';
    }
    else {
      /* EJRECICIO 5.3. 
      Si la combinación no es igual, retorna al cliente un mensaje indicando que no se ha acertado la combinación. */
      echo '{"resCode":"ERROR", "resText":"¡Oh nooo! La combinación es incorrecta"}';
    }
  }