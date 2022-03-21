<?php
  session_start();
  if (isset($_POST['num'])){
    $num = $_POST['num'];
  }

  if (empty($_SESSION['rand'])) {
    $_SESSION['rand'] = rand(1, 100);
  }
  
  if ($num < $_SESSION['rand']) {
    echo "¡Oh! El número que has escrito es menor.";
  } elseif ($num > $_SESSION['rand']) {
    echo "¡Oh! El número que has escrito es mayor.";
  } else {
    echo "¡FELICIDADES! ¡Has acertado el número!";
  }
?>

<script>
  window.setTimeout(function() { window.location = '../index.php'; }, 3000);
</script>