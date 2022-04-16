<?php
  require('database.php');

  if (!empty($_POST['dniNota']) && !empty($_POST['asignatura']) && !empty($_POST['notaNota'])) {
    $con = conectar();

    $alumno = $_POST['dniNota'];
    $asignatura = $_POST['asignatura'];
    $nota = $_POST['notaNota'];

    $consultaExiste = 'SELECT alumno, asignatura FROM nota WHERE alumno="'.$alumno.'" AND asignatura="'.$asignatura.'";';
    $existe = consulta($con, $consultaExiste);
    $resultadoExiste = obtener_num_filas($existe);

    if ($resultadoExiste == 0) {
      $consultaIsUser = 'SELECT tipo_usuario FROM usuario WHERE dni="'.$alumno.'";';
      $respuestaIsUser = consulta($con, $consultaIsUser);

      while($fila = obtener_resultados($respuestaIsUser)){
        extract($fila);
        $isUser = $tipo_usuario;
      }
      
      if ($isUser) {
        $consulta = 'INSERT INTO nota (alumno, asignatura, nota) VALUES ("'.$alumno.'", "'.$asignatura.'", "'.$nota.'")';
        $resultado = consulta($con, $consulta);

        cerrar_conexion($con);
        header("Location: ../validar.php");
      } else {
        cerrar_conexion($con);
        header('Location: ../validar.php?error=3');
      }

    } else {
      cerrar_conexion($con);
      header('Location: ../validar.php?error=2');
    }
  } else {
    header('Location: ../validar.php?error=1');
  }
?>