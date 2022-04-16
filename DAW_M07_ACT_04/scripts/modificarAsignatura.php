<?php
  require('database.php');

  if (!empty($_POST['identificador']) && !empty($_POST['nombre'])) {
    $con = conectar();

    $identificador = $_POST['identificador'];
    $nombre = $_POST['nombre'];

    $consultaExiste = 'SELECT identificador FROM asignatura WHERE identificador="'.$identificador.'";';
    $existe = consulta($con, $consultaExiste);
    $resultadoExiste = obtener_num_filas($existe);

    if ($resultadoExiste == 1) {
      $consulta = 'UPDATE asignatura SET nombre="'.$nombre.'" WHERE identificador="'.$identificador.'";';
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