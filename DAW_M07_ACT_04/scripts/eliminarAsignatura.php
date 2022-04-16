<?php
  require('database.php');

  if (!empty($_POST['identificador'])) {
    $con = conectar();

    $idNota = $_POST['identificador'];

    $consultaExiste = 'SELECT identificador FROM asignatura WHERE identificador="'.$idNota.'";';
    $existe = consulta($con, $consultaExiste);
    $resultadoExiste = obtener_num_filas($existe);

    if ($resultadoExiste == 1) {
      $consultaNotas = 'DELETE FROM nota WHERE asignatura="'.$idNota.'";';
      $resultadoNotas = consulta($con, $consultaNotas);

      $consultaAsignatura = 'DELETE FROM asignatura WHERE identificador="'.$idNota.'";';
      $resultadoAsignatura = consulta($con, $consultaAsignatura);

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