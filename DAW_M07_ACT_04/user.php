<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title>M07 Actividad 4 - User</title>
</head>
<body class="container my-5">
  <h1>M07 Actividad 4</h1>  
  <p id="error" class="badge bg-danger d-none">
    <?php 
      if (isset($_GET['error'])) { 
        if ($_GET['error'] == 1) { 
          echo 'ERROR : Faltan Datos.'; 
        } else if ($_GET['error'] == 2) { 
          echo 'ERROR : Ya existe en la Base de datos.'; 
        } else if ($_GET['error'] == 3) {
          echo 'ERROR : No se pueden poner notas a Administradores.'; 
        } else if ($_GET['error'] == 4) {
          echo 'ERROR : No existe en la Base de datos.'; 
        }
        echo '<script>let show = document.getElementById("error"); show.classList.remove("d-none"); show.classList.add("d-block");</script>';
      } 
    ?>
  </p>
  <h2>Ejercicio 3.</h2>
  <div class="enunciado">
    <p>Los usuarios normales, una vez validados en la pantalla anterior, accederán a una pantalla donde verán en una tabla sus notas obtenidas en cada asignatura.</p>
  </div>
  <div class="respuesta">
    <p>
      <?php
        session_start(); 
        require('scripts/database.php');
        $con = conectar();

        $consultaUsuario = 'SELECT apellido FROM usuario WHERE dni="'.$_SESSION['dni'].'";';
        $resultadoUsuario = consulta($con, $consultaUsuario);

        while($filaUsuario = obtener_resultados($resultadoUsuario)){
          extract($filaUsuario);
          echo 'Notas de '.$apellido.' con DNI '.$_SESSION['dni'].'.';
        }
      ?>
    </p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ASIGNATURA</th>
          <th scope="col">NOTAS</th>
        </tr>
      </thead>
      <tbody id="tablaNotas">
        <?php
          $consultaNotas = 'SELECT alumno, nombre, nota FROM nota, asignatura WHERE asignatura=identificador AND alumno="'.$_SESSION['dni'].'";';
          $resultadoNotas = consulta($con, $consultaNotas);
          $numFilasNotas = obtener_num_filas($resultadoNotas);

          while($filaNotas = obtener_resultados($resultadoNotas)){
            extract($filaNotas);
            echo '<tr><th scope="row">'.$nombre.'</th><td>'.$nota.'</td></tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
  <h2>Ejercicio 4.</h2>
  <div class="enunciado">
    <p>Hay que incorporar, en las pantallas que lo requieran, un botón o link de desconexión, de tal forma que el usuario que esté usando la aplicación pueda abandonar la sesión.</p>
  </div>
  <div class="respuesta">
    <form action="scripts/cerrarSesion.php" method="POST">
      <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
    </form>
  </div>
</body>
</html>