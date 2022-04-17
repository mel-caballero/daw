<?php
  session_start();
  session_destroy();

  require('database.php');

  $con = conectar();
  cerrar_conexion($con);
  
  header("Location: ../index.php");
?>