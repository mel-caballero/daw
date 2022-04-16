<?php
  require('database.php');
  $con = conectar();
  $alumno = $_POST['dniNota'];
  $asignatura = $_POST['asignatura'];
  $nota = $_POST['notaNota'];

  $consulta = 'insert into nota(alumno, asignatura, nota) values("'.$alumno.'", "'.$asignatura.'", "'.$nota.'")';
  $resultado = consulta($con, $consulta);
  cerrar_conexion($con);
  header("Location: ../validar.php");
?>