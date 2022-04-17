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
      // Si el usuario es tipo Usuario para cambiar a Admin, se borran sus notas
      $consultaIsUser = 'SELECT tipo_usuario FROM usuario WHERE dni="'.$dni.'";';
      $resultadoIsUser = consulta($con, $consultaIsUser);

      while($filaAsignaturas = obtener_resultados($resultadoIsUser)){
        extract($filaAsignaturas);
        $isUSer = $tipo_usuario;
      }

      if ($isUSer == 1) {
        $consultaNotas = 'DELETE FROM nota WHERE alumno="'.$dni.'";';
        $resultadoNotas = consulta($con, $consultaNotas);
      }

      $consulta = 'UPDATE usuario SET apellido="'.$apellido.'", tipo_usuario="'.$tipo_usuario.'" WHERE dni="'.$dni.'";';
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