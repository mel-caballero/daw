<?php
  if (isset($_POST["nota"])) {
    if (is_numeric($_POST["nota"])) {
      $nota = round($_POST["nota"], 2);
    } else {
      echo "ERROR. La nota debe ser numérica.";
    }
  } else {
    echo "ERROR. Introduce una nota.";
  }

  if ($nota >= 0  && $nota <= 4.99) {
    echo "Tu nota " .$nota. " es un Suspenso.";
  } elseif ($nota >= 5  && $nota <= 6.99) {
    echo "Tu nota " .$nota. " es un Aprobado.";
  } elseif ($nota >= 7  && $nota <= 8.99) {
    echo "Tu nota " .$nota. " es un Notable.";
  } elseif ($nota >= 9  && $nota <= 9.99) {
    echo "Tu nota " .$nota. " es un Excelente.";
  } elseif ($nota == 10) {
    echo "Tu nota " .$nota. " es Matrícula de honor.";
  }
?>