<?php
  require("database.php");
  $con = conectar();

  $idNota = $_POST['identificador'];

  $consulta = 'delete from asignatura where identificador="'.$idNota.'";';
  $resultado = consulta($con, $consulta);

  cerrar_conexion($con);
  header("Location: ../validar.php");
?>