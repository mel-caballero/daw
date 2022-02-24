<?php
  if (isset($_POST["nota"])) {
    $nota = round($_POST["nota"], 2);
  }
  
  function calcularNota($nota) {
    switch ($nota) {
      case ($nota == 0  && $nota <= 4.99) :
        echo "Suspenso";
        break;
      case ($nota >= 5  && $nota <= 6.99) :
        echo "Aprobado";
        break;
      case ($nota >= 7  && $nota <= 8.99) :
        echo "Notable";
        break;
      case ($nota >= 9  && $nota <= 9.99) :
        echo "Excelent";
        break;
      case ($nota == 10) :
        echo "Matrícula de honor";
        break;
    }
  }

  calcularNota($nota);
?>