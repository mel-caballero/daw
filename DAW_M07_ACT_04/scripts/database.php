<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db_name = "escuela";

  function conectar() {
    $con = new mysqli($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["db_name"]) or die("Error de conexión con la base de datos");
    return $con;
  }

  function consulta($con, $consulta) {
    $resultado = $con->query($consulta);
    return $resultado;
  }

  function obtener_num_filas($resultado){
		return $resultado->num_rows;
	}

	function obtener_resultados($resultado){
		return $resultado->fetch_array();
	}

  function cerrar_conexion($con) {
    $con->close();
  }
?>