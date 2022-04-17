<?php
  session_start(); 

  if (empty($_SESSION['dni']) && empty($_SESSION['apellido'])) {
    if (!empty($_POST['dni']) && !empty($_POST['apellido'])) {
      $_SESSION['dni'] = $_POST['dni'];
      $_SESSION['apellido'] = $_POST['apellido'];

      require('database.php');
      $con = conectar();

      $consultaValidar = 'SELECT * FROM usuario WHERE dni="'.$_SESSION['dni'].'" AND apellido="'.$_SESSION['apellido'].'";';
      $resultadoValidar = consulta($con, $consultaValidar);
      $numFilasValidar = obtener_num_filas($resultadoValidar);

      // Comprobar si existe el usuario. Si no coincide DNI y apellido, el usuario no existe
      if ($numFilasValidar == 1) {
        // Comprobar tipo de usuario
        while($fila = obtener_resultados($resultadoValidar)){
          extract($fila);
          $tipo = $tipo_usuario;
        }

        // Si usuario tipo 0 es ADMIN
        if ($tipo == 0) {
          cerrar_conexion($con);
          header('Location: ../admin.php'); 
        } // Si usuario tipo 1 es USUARIO
        else {
          cerrar_conexion($con);
          header('Location: ../user.php');
        }
      } else {
        cerrar_conexion($con);
        // ERROR : El usuario no existe.
        header('Location: ../index.php?error=2');
      }
    } else {
      // ERROR : Faltan Datos.
      header('Location: ../index.php?error=1');
    }
  }
?>