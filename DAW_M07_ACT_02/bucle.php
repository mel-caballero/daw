<?php
  if (isset($_POST["num"])) {
    if (is_numeric($_POST["num"])) {
      $num = $_POST["num"];
    } else {
      echo "ERROR. Debe ser un número.";
    }
  } else {
    echo "ERROR. Introducir un número.";
  }
  
  for ($i = 0; $i < $num; $i++) {
    echo $i + 1 . ".- Los bucles son fáciles!<br>";
  }
  echo "Se acabó!";
?>