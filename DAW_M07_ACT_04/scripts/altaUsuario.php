<?php
  require('database.php');

  if (!empty($_POST['dniAltaUsuario']) && !empty($_POST['apellidoAltaUsuario'])) {
    $con = conectar();

    $dni = $_POST['dniAltaUsuario'];
    $apellido = $_POST['apellidoAltaUsuario'];
    $tipo_usuario = $_POST['tipoAltaUsuario'];

    $consultaExiste = 'SELECT dni FROM usuario WHERE dni="'.$dni.'";';
    $existe = consulta($con, $consultaExiste);
    $resultadoExiste = obtener_num_filas($existe);

    if ($resultadoExiste == 0) {
      $consulta = 'INSERT INTO usuario (dni, apellido, tipo_usuario) VALUES ("'.$dni.'", "'.$apellido.'", "'.$tipo_usuario.'")';
      $resultado = consulta($con, $consulta);
      
      cerrar_conexion($con);
      header("Location: ../admin.php");
    } else {
      cerrar_conexion($con);
      header('Location: ../admin.php?error=2');
    }
  } else {
    header('Location: ../admin.php?error=1');
  }
?>