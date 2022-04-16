<?php
  require('database.php');
  $con = conectar();
  $dni = $_POST['dniAltaUsuario'];
  $apellido = $_POST['apellidoAltaUsuario'];
  $tipo_usuario = $_POST['tipoAltaUsuario'];

  $consulta = 'insert into usuario(dni, apellido, tipo_usuario) values("'.$dni.'", "'.$apellido.'", "'.$tipo_usuario.'")';
  $resultado = consulta($con, $consulta);
  cerrar_conexion($con);
  header("Location: ../validar.php");
?>