<?php
  if (isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["calc"])) {
    if (is_numeric($_POST["num1"]) && is_numeric($_POST["num2"])) {
      $num1 = $_POST["num1"];
      $num2 = $_POST["num2"];
    } else {
      echo "ERROR. Deben ser números.";
    }
    $calc = $_POST["calc"];
  } else {
    echo "ERROR. Debes introducir números.";
  }
  
  function calcular($num1, $num2, $calc) {
    switch ($calc) {
      case "sumar" :
        $suma = suma($num1, $num2);
        echo "El resultado de " .$calc. " " .$num1. " y " .$num2. " es " .$suma;
        break;
      case "restar" :
        $resta = resta($num1, $num2);
        echo "El resultado de " .$calc. " " .$num1. " y " .$num2. " es " .$resta;
        break;
      case "multiplicar" :
        $multiplicacion = multiplicacion($num1, $num2);
        echo "El resultado de " .$calc. " " .$num1. " y " .$num2. " es " .$multiplicacion;
        break;
      case "dividir" :
        $division = division($num1, $num2);
        echo "El resultado de " .$calc. " " .$num1. " y " .$num2. " es " .$division;
        break;
    }
  }

  function suma($num1, $num2) {
    $resultado = $num1 + $num2;
    return $resultado;
  }

  function resta($num1, $num2) {
    $resultado = $num1 - $num2;
    return $resultado;
  }

  function multiplicacion($num1, $num2) {
    $resultado = $num1 * $num2;
    return $resultado;
  }

  function division($num1, $num2) {
    $resultado = $num1 / $num2;
    return $resultado;
  }

  calcular($num1, $num2, $calc);
?>