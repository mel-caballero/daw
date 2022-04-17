<?php
  require('database.php');

  if (!empty($_POST['identificador']) && !empty($_POST['nombre'])) {
    $con = conectar();

    $identificador = $_POST['identificador'];
    $nombre = $_POST['nombre'];

    $consultaExiste = 'SELECT identificador FROM asignatura WHERE identificador="'.$identificador.'";';
    $existe = consulta($con, $consultaExiste);
    $resultadoExiste = obtener_num_filas($existe);

    if ($resultadoExiste == 0) {
      $consulta = 'INSERT INTO asignatura (identificador, nombre) VALUES ("'.$identificador.'", "'.$nombre.'")';
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