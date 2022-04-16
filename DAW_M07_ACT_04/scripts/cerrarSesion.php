<?php
  session_start();
  require('database.php');

  session_destroy();

  $con = conectar();
  cerrar_conexion($con);
  
  header("Location: ../index.html");
?>