<?php
  if (isset($_POST["num"])) {
    $num = $_POST["num"];
  }
  
  function bucle($num) {
    for ($i = 0; $i < $num; $i++) {
      echo $i + 1 . ".- Los bucles son fáciles!<br>";
    }
    echo "Se acabó!";
  }

  bucle($num);
?>