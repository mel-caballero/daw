<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title>Document</title>
</head>
<body class="container my-5">
  <?php 
    session_start(); 
    
    if (empty($_SESSION['dni']) && empty($_SESSION['apellido'])) {
      if (isset($_POST['dni']) && isset($_POST['apellido'])) {
        $_SESSION['dni'] = $_POST['dni'];
        $_SESSION['apellido'] = $_POST['apellido'];
      } else {
        echo '
          <script>
            let error = document.getElementById("error"); 
            error.classList.remove("d-none"); 
            error.classList.add("d-block");
            error.innerHTML = "ERROR : Faltan datos";
          </script>
        ';
      }
    }
    
    require('scripts/database.php');
    $con = conectar();
  ?>
  <h1>M07 Actividad 4</h1>  
  <p id="error" class="badge bg-danger d-none"></p>
  <div id="admin" class="d-none">
    <h2>Ejercicio 2.</h2>
    <div class="enunciado">
      <p>Los administradores, una vez validados en la pantalla anterior, accederán a una pantalla desde la que podrán realizar las siguientes operaciones:</p>
      <ul>
        <li>Dar de alta usuarios: mediante un formulario se darán de alta en la base de datos nuevos usuarios.</li>
        <li>Dar de alta asignaturas: mediante un formulario se darán de alta en la base de datos nuevas asignaturas.</li>
        <li>Poner nota: mediante un formulario se dará de alta una nota en la base de datos, para un alumno y una asignatura seleccionados.</li>
        <li>Modificar datos: se podrá seleccionar un usuario, una asignatura o una nota concreta, para modificar los datos.</li>
        <li>Eliminar usuarios y asignaturas: se podrá seleccionar un usuario, una asignatura o una nota concreta, para el borrado de los datos.</li>
        <li>Visualización de notas: se seleccionará un usuario y se mostrará en una tabla la nota de cada asignatura de ese usuario.</li>
      </ul>
    </div>
    <div class="respuesta">
      <!-- Alta Usuarios -->
      <form action="scripts/altaUsuario.php" method="POST">
        <fieldset>
          <legend>Alta usuario</legend>
          <div class="row">
            <div class="col-3">
              <input type="text" class="form-control" name="dniAltaUsuario" placeholder="DNI usuario">
            </div>
            <div class="col-3">
              <input type="text" class="form-control" name="apellidoAltaUsuario" placeholder="Apellido usuario">
            </div>
            <div class="col-3">
              <select class="form-control" name="tipoAltaUsuario">
                <option value="0">Administrador</option>
                <option value="1">Usuario</option>
              </select>
            </div>
            <div class="col-3">
              <button type="submit" class="btn btn-primary">Crear usuario</button>
            </div>
        </fieldset>
      </form>
    
      <hr>

      <!-- Alta de asignaturas -->
      <form action="scripts/altaAsignatura.php" method="POST">
        <fieldset>
          <legend>Alta asignatura</legend>
          <div class="row">
            <div class="col-3 container">
              <input type="text" class="form-control" name="identificador" placeholder="Identificador asignatura">
            </div>
            <div class="col-3">
              <input type="text" class="form-control" name="nombre" placeholder="Asignatura">
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
              <button type="submit" class="btn btn-primary">Crear asignatura</button>
            </div>
        </fieldset>
      </form>

      <hr>

      <!-- Alta de notas -->
      <form action="scripts/altaNota.php" method="POST">
        <fieldset>
          <legend>Poner nota</legend>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="dniNota" placeholder="DNI">
            </div>
            <div class="col">
              <select id="lista" class="form-control" name="asignatura">
                <?php

                  $consultaAsignaturas = 'select identificador, nombre from asignatura;';
                  $resultadoAsignaturas = consulta($con, $consultaAsignaturas);

                  while($filaAsignaturas = obtener_resultados($resultadoAsignaturas)){
                    extract($filaAsignaturas);
                    echo "<option value='$identificador'>$nombre</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="notaNota" placeholder="Nota">
            </div>
            
            <div class="col">
              <button type="submit" class="btn btn-primary">Añadir nota</button>
            </div>
        </fieldset>
      </form>
      
      <hr>

      <!-- TODO Modificar Usuario -->
      <form action="scripts/modificarUsuario.php" method="POST">
        <fieldset>
          <legend>Modificar usuario</legend>
          <div class="row">
            <div class="col-3">
              <input type="text" class="form-control" name="dniModificaUsuario" placeholder="DNI usuario">
            </div>
            <div class="col-3">
              <input type="text" class="form-control" name="apellidoModificaUsuario" placeholder="Apellido usuario">
            </div>
            <div class="col-3">
              <select class="form-control" name="tipoModificaUsuario">
                <option value="0">Administrador</option>
                <option value="1">Usuario</option>
              </select>
            </div>
            <div class="col-3">
              <button type="submit" class="btn btn-primary">Modifica usuario</button>
            </div>
        </fieldset>
      </form>
      
      <!-- TODO Nodificar asignaturas -->
      <form action="scripts/altaAsignatura.php" method="POST">
        <fieldset>
          <legend>Alta asignatura</legend>
          <div class="row">
            <div class="col-3 container">
              <input type="text" class="form-control" name="identificador" placeholder="Identificador asignatura">
            </div>
            <div class="col-3">
              <input type="text" class="form-control" name="nombre" placeholder="Asignatura">
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
              <button type="submit" class="btn btn-primary">Crear asignatura</button>
            </div>
        </fieldset>
      </form>

      <hr>

      <!-- TODO Modificar notas -->
      <form action="scripts/altaNota.php" method="POST">
        <fieldset>
          <legend>Poner nota</legend>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="dniNota" placeholder="DNI">
            </div>
            <div class="col">
              <select id="lista" class="form-control" name="asignatura">
                <?php

                  $consultaAsignaturas = 'select identificador, nombre from asignatura;';
                  $resultadoAsignaturas = consulta($con, $consultaAsignaturas);

                  while($filaAsignaturas = obtener_resultados($resultadoAsignaturas)){
                    extract($filaAsignaturas);
                    echo "<option value='$identificador'>$nombre</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="notaNota" placeholder="Nota">
            </div>
            
            <div class="col">
              <button type="submit" class="btn btn-primary">Añadir nota</button>
            </div>
        </fieldset>
      </form>

      <hr>

      <!-- TODO Eliminar datos -->
      <form action="eliminarDatos.php" method="POST">
        <fieldset>
          <legend>Eliminar datos</legend>
          <div class="row">
            <div class="col">
            </div>
          </div>
        </fieldset>
      </form>
      
      <hr>

      <!-- TODO Mostrar datos -->
      <form action="mostrarDatos.php" method="POST">
        <fieldset>
          <legend>Mostrar datos</legend>
          <div class="row">
            <div class="col">
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div> 

  <div id="user" class="d-none">
    <h2>Ejercicio 3.</h2>
    <div class="enunciado">
      <p>Los usuarios normales, una vez validados en la pantalla anterior, accederán a una pantalla donde verán en una tabla sus notas obtenidas en cada asignatura.</p>
    </div>
    <div class="respuesta">
      <p>
        <?php
            $consultaUsuario = 'select apellido from usuario where dni="'.$_SESSION['dni'].'";';
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
            $consultaNotas = 'select alumno, nombre, nota from nota, asignatura where asignatura=identificador AND alumno="'.$_SESSION['dni'].'";';
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
  </div>
  <div>
    <h2>Ejercicio 4.</h2>
    <div class="enunciado">
      <p>Hay que incorporar, en las pantallas que lo requieran, un botón o link de desconexión, de tal forma que el usuario que esté usando la aplicación pueda abandonar la sesión.</p>
    </div>
    <div class="respuesta">
      <form action="scripts/cerrarSesion.php" method="POST">
        <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
      </form>
    </div>
  </div>
  
  <?php
    //require('scripts/database.php');

    

    //$con = conectar();

    $consultaValidar = 'select * from usuario where dni="'.$_SESSION['dni'].'" AND apellido="'.$_SESSION['apellido'].'";';
    $resultadoValidar = consulta($con, $consultaValidar);
    $numFilasValidar = obtener_num_filas($resultadoValidar);

    $consultaNotas = 'select alumno, nombre, nota from nota, asignatura where asignatura=identificador AND alumno="'.$_SESSION['dni'].'";';
    $resultadoNotas = consulta($con, $consultaNotas);
    $numFilasNotas = obtener_num_filas($resultadoNotas);

    // Comprobar si existe el usuario. Si no coincide DNI y apellido, el usuario no existe
    if ($numFilasValidar == 1) {
      // Comprobar tipo de usuario
      while($fila = obtener_resultados($resultadoValidar)){
        extract($fila);
        $tipo = $tipo_usuario;
      }

      // Si usuario tipo 0 es ADMIN
      if ($tipo == 0) {
        echo '<script>let admin = document.getElementById("admin"); admin.classList.remove("d-none"); admin.classList.add("d-block");</script>';
        
      } // Si usuario tipo 1 es USUARIO
      else {
        if($numFilasNotas != 0){
          echo '<script>let user = document.getElementById("user"); user.classList.remove("d-none"); user.classList.add("d-block");</script>';
        }
        else{
          echo '
            <script>
              let error = document.getElementById("error"); 
              error.classList.remove("d-none"); 
              error.classList.add("d-block");
              error.innerHTML = "ERROR : Este alumno no tiene notas";
            </script>
          ';
        }
      }
    } else {
      echo '
        <script>
          let error = document.getElementById("error"); 
          error.classList.remove("d-none"); 
          error.classList.add("d-block");
          error.innerHTML = "ERROR : El usuario no existe";
        </script>
      ';
    }
  ?>
</body>
</html>