<?php
  if (isset($_POST["dni"])) {
    if (is_numeric($_POST["dni"])) {
      $dni = $_POST["dni"];
    } else {
      echo "ERROR. Introduce solo los números del DNI.";
    }
  } else {
    echo "ERROR. Introduce un DNI.";
  }

  $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
  echo "La letra de tu DNI " .$dni. " es ". $letras[$dni%23];
?>