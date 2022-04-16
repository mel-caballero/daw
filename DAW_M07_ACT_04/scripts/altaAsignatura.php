<?php
  require('database.php');
  $con = conectar();
  $identificador = $_POST['identificador'];
  $nombre = $_POST['nombre'];

  $consulta = 'insert into asignatura(identificador, nombre) values("'.$identificador.'", "'.$nombre.'")';
  $resultado = consulta($con, $consulta);
  cerrar_conexion($con);
  header("Location: ../validar.php");
?>