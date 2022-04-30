<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>
<body class="container">
  <header>
  </header>
  <main class="container">
    <form action="" method="POST" class="row p-5">
      <div class="col-auto">
        <select id="lista" class="form-control form-select" name="categoria">
          <?php
            require('conexion.php');
            $conexion = mysqli_connect($host, $user, $pass, $db_name);
            $query = 'SELECT id, nombre FROM categoria;';
            $result = mysqli_query($conexion, $query);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row["id"].'">'.$row["nombre"].'</option>';
              }
            } else {
              echo "0 results";
            }
          ?>
        </select>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary">Mostrar tabla</button>
      </div>
      </div>
    </form>
    <div class="container p-5">
      <?php
        if (isset($_POST['categoria'])) {
          require_once("lib/nusoap.php");
          $client = new soapclient('http://localhost:8080/daw/DAW_M07_ACT_05/servidor.php?wsdl');
          
          $result = $client->listaProductos($_POST['categoria']);
          echo '<table class="table"><th>Identificador</th><th>Nombre</th>';
          foreach ($result as $producto) {
            $array = json_decode(json_encode($producto), true);
            echo '<tr>';
            echo '<td>'.$array["id"].'</td>';
            echo '<td>'.$array["nombre"].'</td>';
            echo '</tr>';
          }
          echo '</table>';
        }
      ?>
    </div>
  </main>
  
</body>
</html>