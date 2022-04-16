<?php
  require('database.php');

  if (!empty($_POST['dniModificaUsuario']) && !empty($_POST['apellidoModificaUsuario'])) {
    $con = conectar();

    $dni = $_POST['dniModificaUsuario'];
    $apellido = $_POST['apellidoModificaUsuario'];
    $tipo_usuario = $_POST['tipoModificaUsuario'];

    $consultaExiste = 'SELECT dni FROM usuario WHERE dni="'.$dni.'";';
    $existe = consulta($con, $consultaExiste);
    $resultadoExiste = obtener_num_filas($existe);

    if ($resultadoExiste == 1) {
      $consulta = 'UPDATE usuario SET apellido="'.$apellido.'", tipo_usuario="'.$tipo_usuario.'" WHERE dni="'.$dni.'";';
      $resultado = consulta($con, $consulta);
      cerrar_conexion($con);
      header("Location: ../validar.php");
    } else {
      cerrar_conexion($con);
      header('Location: ../validar.php?error=4');
    }
  } else {
    header('Location: ../validar.php?error=1');
  }
?>