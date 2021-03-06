<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title>M07 Act 4 Principal</title>
</head>
<body class="container my-5">
  <h1>M07 Actividad 4</h1>
  <p>Crear una aplicación web que trabaje con la base de datos anterior, y que proporcione las siguientes funcionalidades:</p>
  <h2>Ejercicio 1.</h2>
  <div class="enunciado">
    <p>La aplicación tendrá como página principal una pantalla de validación de usuario. Constará de un formulario con un campo de texto para introducir el DNI, otro campo de texto para introducir el apellido, y un botón de entrada.</p>
  </div>
  <p id="error" class="badge bg-danger d-none">
    <?php 
      if (isset($_GET['error'])) { 
        if ($_GET['error'] == 1) { 
          echo 'ERROR : Faltan Datos.'; 
        } else if ($_GET['error'] == 2) { 
          echo 'ERROR : El usuario no existe.'; 
        }
        echo '<script>let show = document.getElementById("error"); show.classList.remove("d-none"); show.classList.add("d-block");</script>';
      } 
    ?>
  </p>
  <div class="respuesta">
    <form action="scripts/validar.php" method="POST">
      <div class="row">
        <div class="col-4">
          <input type="text" class='form-control' name="dni" placeholder="DNI">
        </div>
        <div class="col-4">
          <input type="text" class='form-control' name="apellido" placeholder="Apellido">
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Validar usuario</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>