<?php
  if (isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["calc"])) {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $calc = $_POST["calc"];
  }
  
  function calcular($num1, $num2, $calc) {
    switch ($calc) {
      case "suma" :
        $suma = suma($num1, $num2);
        echo $suma;
        break;
      case "resta" :
        $resta = resta($num1, $num2);
        echo $resta;
        break;
      case "multiplicacion" :
        $multiplicacion = multiplicacion($num1, $num2);
        echo $multiplicacion;
        break;
      case "division" :
        $division = division($num1, $num2);
        echo $division;
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