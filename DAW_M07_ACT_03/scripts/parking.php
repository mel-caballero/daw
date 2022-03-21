<?php
  session_start();
  if (isset($_POST['aparcarOption'])) {
    $opcion = $_POST['aparcarOption'];
  }

  define("TAMSMALL", 10);
  define("TAMBIG", 14);
  
  if (!isset($_SESSION['small']) && !isset($_SESSION['big'])) {
    for ($i = 0; $i < TAMSMALL; $i++) { $_SESSION['small'][$i] = 0; }
    for ($i = 0; $i < TAMBIG; $i++) { $_SESSION['big'][$i] = 0; }
  }

  switch ($opcion) {
    case "aparcar":
        if (isset($_POST['aparcarType'])) {
          $tipo = $_POST['aparcarType'];
        }
    
        switch ($tipo) {
          case "aparcarSmall":
            $lleno = false;
            
            for ($i = 0; $i < TAMSMALL; $i++) {
              if ($_SESSION['small'][$i] === 0) {
                $_SESSION['small'][$i] = 1;
                break;
              }

              if ($i === (TAMSMALL - 1)) { 
                $lleno = true; 
                break;
              }
            }
            if ($lleno === true ) {
              aparcarGrande();
            }
          break;
          case "aparcarBig":
            aparcarGrande();
          break;
        }
        imprimir();
      break;
    case "retirar":
        //TODO retirar coches
        if (isset($_POST['retirarType'])) {
          $retirarTipo = $_POST['retirarType'];
        }
        if (isset($_POST['plaza'])) {
          $plaza = $_POST['plaza'] - 1;
        }

        switch ($retirarTipo) {
          case "retirarSmall":
            if ($plaza >= 0 && $plaza <= TAMSMALL) {
              if ($_SESSION['small'][$plaza] === 1) {
                $_SESSION['small'][$plaza] = 0;
                imprimir();
              } else {
                echo "Su coche no está en esa plaza.";
              }
            } else {
              echo "ERROR. El parking no tiene tantas plazas.";
            }
            break;
          case "retirarBig":
            if ($plaza >= 0 && $plaza <= TAMBIG) {
              if ($_SESSION['small'][$plaza] === 1) {
                $_SESSION['big'][$plaza] = 0;
                imprimir();
              } else {
                echo "Su coche no está en esa plaza.";
              }
            } else {
              echo "ERROR. El parking no tiene tantas plazas.";
            }
            break;
          default:
            echo "ERROR. La plaza no existe";
            break;
        }
        
      break;
    case "ver":
        imprimir();
      break;
  }

  function aparcarGrande() {
    for ($i = 0; $i < TAMBIG; $i++) {
      if ($_SESSION['big'][$i] === 0) {
        $_SESSION['big'][$i] = 1;
        break;
      }
    }
  }

  function imprimir() {
    foreach ($_SESSION['small'] as $valor) {
      echo "[$valor]";
    }
    echo "<br><br><br>";
    foreach ($_SESSION['big'] as $valor) {
      echo "[$valor]";
    }
  }
?>

<script>
  window.setTimeout(function() { window.location = '../index.php'; }, 3000);
</script>