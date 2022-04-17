<?php
  require('database.php');

  if (!empty($_POST['dniEliminarUsuario'])) {
    $con = conectar();

    $dni = $_POST['dniEliminarUsuario'];

    $consultaExiste = 'SELECT dni FROM usuario WHERE dni="'.$dni.'";';
    $existe = consulta($con, $consultaExiste);
    $resultadoExiste = obtener_num_filas($existe);

    if ($resultadoExiste == 1) {
      $consultaNotas = 'DELETE FROM nota WHERE alumno="'.$dni.'";';
      $resultadoNotas = consulta($con, $consultaNotas);

      $consultaUsuario = 'DELETE FROM usuario WHERE dni="'.$dni.'";';
      $resultadoUsuario = consulta($con, $consultaUsuario);

      cerrar_conexion($con);
      header("Location: ../admin.php");
    } else {
      cerrar_conexion($con);
      header('Location: ../admin.php?error=4');
    }
  } else {
    header('Location: ../admin.php?error=1');
  }
?>