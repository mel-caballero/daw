<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Mostrar datos</title>
</head>
<body class="container my-5">
<?php
  require("database.php");
  $con = conectar();

  $dni = $_POST['dniMostrarDatos'];

  $consultaUsuario = 'select * from usuario where dni="'.$dni.'";';
  $resultadoUsuario = consulta($con, $consultaUsuario);

  while($filaUsuario = obtener_resultados($resultadoUsuario)){
    extract($filaUsuario);
    echo '<div class="row"><div class="col-10"><h1>Notas de '.$apellido.' con DNI '.$dni.'</h1></div>';
  }

  echo '<div class="col-2"><a href="../validar.php" class="badge bg-info text-dark">Volver</a></div></div>';

  echo '<table class="table">
      <thead>
        <tr>
          <th scope="col">ASIGNATURA</th>
          <th scope="col">NOTAS</th>
        </tr>
      </thead>
      <tbody id="tablaNotas">';
      
  $consultaNotas = 'select alumno, nombre, nota from nota, asignatura where asignatura=identificador AND alumno="'.$dni.'";';
  $resultadoNotas = consulta($con, $consultaNotas);
  $numFilasNotas = obtener_num_filas($resultadoNotas);

  while($filaNotas = obtener_resultados($resultadoNotas)){
    extract($filaNotas);
    echo '<tr><th scope="row">'.$nombre.'</th><td>'.$nota.'</td></tr>';
  }
        
  echo '</tbody>
    </table>';
?>
</body>
</html>