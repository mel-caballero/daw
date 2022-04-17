<?php
  require('database.php');

  if (!empty($_POST['dniNota']) && !empty($_POST['asignatura'])) {
    $con = conectar();

    $dni = $_POST['dniNota'];
    $asignatura = $_POST['asignatura'];

    $consultaExiste = 'SELECT alumno, asignatura FROM nota WHERE alumno="'.$dni.'" AND asignatura="'.$asignatura.'";';
    $existe = consulta($con, $consultaExiste);
    $resultadoExiste = obtener_num_filas($existe);

    if ($resultadoExiste == 1) {
      $consulta = 'DELETE FROM nota WHERE alumno="'.$dni.'" AND asignatura="'.$asignatura.'";';
      $resultado = consulta($con, $consulta);

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