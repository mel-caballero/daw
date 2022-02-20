<?php
  session_start();
  /* EJERCICIO 3
  Al clicar en el botón GUARDAR COMBINACION envía una petición al servidor con el API XMLHttpRequest pasando la combinación formada por los 4 números escritos en los inputs. */
  if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['num3']) && isset($_GET['num4'])) {
    
    $numbers = array($_GET['num1'], $_GET['num2'], $_GET['num3'], $_GET['num4']);
    
    /* EJERCICIO 3.1.
    El servidor ha de comprobar que sean efectivamente 4 números de un dígito y positivo. */
    $status = true;
    foreach ($numbers as $value) {
      if (!is_numeric($value) || !($value >= 0 && $value < 10)){
        $status = false;
      } 
    }

    if ($status) {
      /* EJERCICIO 3.2. 
      Si la combinación es válida se guarda en una (o varias) variables de sesión y retorna al cliente un mensaje indicando que se ha guardado el valor. */
      $_SESSION["numbers"] = $numbers;
      
      echo '{"resCode":"OK", "resText":"Se han guardado los valores."}';
    }
    else {
      /* EJERCICIO 3.3. 
      Si la combinación no es válida se retorna al cliente un mensaje indicando que no se ha guardado el valor porque la combinación no es válida. */
      echo '{"resCode":"ERROR", "resText":"La combinación no se ha podido guardar. Los valores tienen que ser del 0 al 9."}';
    }
  }
