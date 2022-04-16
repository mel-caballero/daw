<?php
  require("database.php");
  $con = conectar();

  $dni = $_POST['dniEliminarUsuario'];

  $consulta = 'delete from usuario where dni="'.$dni.'";';
  $resultado = consulta($con, $consulta);

  cerrar_conexion($con);
  header("Location: ../validar.php");
?>