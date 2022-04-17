<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title>M07 Actividad 4 - Admin</title>
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
                require('scripts/database.php');
                $con = conectar();

                $consultaAsignaturas = 'SELECT identificador, nombre FROM asignatura;';
                $resultadoAsignaturas = consulta($con, $consultaAsignaturas);

                while($filaAsignaturas = obtener_resultados($resultadoAsignaturas)){
                  extract($filaAsignaturas);
                  echo '<option value="'.$identificador.'">'.$nombre.'</option>';
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

    <!-- Modificar Usuario -->
    <form action="scripts/modificarUsuario.php" method="POST">
      <fieldset>
        <legend>Modificar usuario</legend>
        <p>Escribe el DNI del usuario que quieras modificar su apellido o el tipo de usuario:</p>
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
    
    <!-- Modificar asignaturas -->
    <form action="scripts/modificarAsignatura.php" method="POST">
      <fieldset>
        <legend>Modificar asignatura</legend>
        <p>Escribe el identificador de la asignatura que le quieras modificar el nombre:</p>
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
            <button type="submit" class="btn btn-primary">Modificar asignatura</button>
          </div>
      </fieldset>
    </form>

    <!-- Modificar notas -->
    <form action="scripts/modificarNota.php" method="POST">
      <fieldset>
        <legend>Modificar nota</legend>
        <p>Escribe el DNI del usuario y la asignatura de la nota que quieras modificar:</p>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" name="dniNota" placeholder="DNI">
          </div>
          <div class="col">
            <select id="lista" class="form-control" name="asignatura">
              <?php
                $consultaAsignaturas = 'SELECT identificador, nombre FROM asignatura;';
                $resultadoAsignaturas = consulta($con, $consultaAsignaturas);

                while($filaAsignaturas = obtener_resultados($resultadoAsignaturas)){
                  extract($filaAsignaturas);
                  echo '<option value="'.$identificador.'">'.$nombre.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="col">
            <input type="text" class="form-control" name="notaNota" placeholder="Nota">
          </div>
          
          <div class="col">
            <button type="submit" class="btn btn-primary">Modificar nota</button>
          </div>
      </fieldset>
    </form>

    <hr>

    <div class="row">
      <!-- Eliminar Usuario -->
      <div class="col-6">
        <form action="scripts/eliminarUsuario.php" method="POST">
          <fieldset>
            <legend>Eliminar usuario</legend>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name="dniEliminarUsuario" placeholder="DNI usuario">
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary">Eliminar usuario</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    
      <!-- Eliminar asignaturas -->
      <div class="col-6">
        <form action="scripts/eliminarAsignatura.php" method="POST">
          <fieldset>
            <legend>Eliminar asignatura</legend>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name="identificador" placeholder="Identificador asignatura">
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary">Eliminar asignatura</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>

    <!-- Eliminar notas -->
    <form action="scripts/eliminarNota.php" method="POST">
      <fieldset>
        <legend>Eliminar nota</legend>
        <div class="row">
          <div class="col-3">
            <input type="text" class="form-control" name="dniNota" placeholder="DNI">
          </div>
          <div class="col-3">
            <select id="lista" class="form-control" name="asignatura">
              <?php

                $consultaAsignaturas = 'SELECT identificador, nombre FROM asignatura;';
                $resultadoAsignaturas = consulta($con, $consultaAsignaturas);

                while($filaAsignaturas = obtener_resultados($resultadoAsignaturas)){
                  extract($filaAsignaturas);
                  echo '<option value="'.$identificador.'">'.$nombre.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="col-3">
            
          </div>
          
          <div class="col-3">
            <button type="submit" class="btn btn-primary">Eliminar nota</button>
          </div>
      </fieldset>
    </form>
    
    <hr>

    <!-- Mostrar datos -->
    <div class="row">
      <div class="col-6">
        <form action="scripts/mostrarDatos.php" method="POST">
          <fieldset>
            <legend>Mostrar Datos</legend>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name="dniMostrarDatos" placeholder="DNI usuario">
              </div>
              <div class="col">
                <button type="submit" name="modificar" class="btn btn-primary">Mostrar datos</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
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