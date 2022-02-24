<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Actividad 2 de M07">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title>Actividad 2</title>
</head>
<body  class="container my-5">
  <h1>M07 Actividad 2</h1>
  <div> <!-- Ejercicio 1 -->
    <h2>Ejercicio 1.</h2>
    <div class="enunciado">
      <p>Escribe un programa en el que se declare un array asociativo para guardar las notas de unos alumnos. Las claves del array serán los nombres de los alumnos y los valores serán las notas de cada uno.</p>
      <p>El programa deberá hacer las operaciones necesarias para mostrar los siguientes mensajes:</p>
      <p>La nota más alta es la de David con un 9.</p>
      <p>La nota más baja es la de Sandra con un 3.</p>
      <p>La nota media de la clase es 6.4.</p>
      <p>Además, se mostrarán los nombres de los alumnos, acompañados de su nota, ordenados por esta última (ascendentemente).</p>
    </div>
    <div class="respuesta">
      <?php
        $notas = ["David" => 9, "Sandra" => 3, "Sergi" => 8];

        $nota_max = max($notas);
        $nombre_max = array_search($nota_max, $notas);
        echo "<p>La nota más alta es la de $nombre_max con un $nota_max.</p>";

        $nota_min = min($notas);
        $nombre_min = array_search($nota_min, $notas);
        echo "<p>La nota más baja es la de $nombre_min con un $nota_min.</p>";

        $media = round(array_sum($notas) / count($notas), 2);
        echo "<p>La nota media de la clase es $media</p>";

        $orden = asort($notas);
        echo "<p>";
        foreach ($notas as $key => $value) {
          echo "$key - $value. ";
        }
        echo "</p>";
      ?>
    </div>
    
  </div>
  <div> <!-- Ejercicio 2 -->
    <h2>Ejercicio 2.</h2>
    <div class="enunciado">
      <p>Realizar una aplicación que simule una calculadora. Constará de una página HTML con dos campos de texto para introducir los dos operadores, y 4 RadioButtons para seleccionar la operación: suma, resta, multiplicación y división. Se mostrará el resultado de la operación en una segunda página con la frase “El resultado de la suma/resta/multiplicación/división es XXX”.</p>
      <p>Hacer el programa usando un formulario de tipo POST.</p>
    </div>
    <div class="respuesta">
      <form action="calculadora.php" method="POST">
        <label for="num1">Numero 1 </label><input type="number" name="num1">
        <label for="num2">Numero 2 </label><input type="number" name="num2">
        <br>
        <input type="radio" name="calc" id="sumar" value="sumar" checked>
        <label for="sumar">Sumar</label>
        <input type="radio" name="calc" id="restar" value="restar">
        <label for="restar">Restar</label>
        <input type="radio" name="calc" id="multiplicar" value="multiplicar">
        <label for="multiplicar">Multiplicar</label>
        <input type="radio" name="calc" id="dividir" value="dividir">
        <label for="dividir">Dividir</label>
        <br>
        <input type="submit" name="calcular" value="Calcular">
      </form>
    </div>

  </div>
  <div> <!-- Ejercicio 3 -->
    <h2>Ejercicio 3.</h2>
    <div class="enunciado">
      <p>Crea una aplicación que parta de un formulario en que se pida un valor numérico al usuario bajo el título “¿Cuántas veces?”. Al darle al botón de envío del formulario, se ejecutará un script PHP que, primero comprobará que existe la variable proveniente del formulario y, luego, repetirá tantas veces como indique el valor introducido por el usuario la siguiente frase:</p>
      <p>1.- Los bucles son fáciles!</p>
    </div>
    <div class="respuesta">
      <form action="bucle.php" method="POST">
        <label for="num">¿Cuántas veces? </label><input type="number" name="num">
        <input type="submit" name="bucle" value="Enviar">
      </form>
    </div>
  </div>
  <div> <!-- Ejercicio 4 -->
    <h2>Ejercicio 4.</h2>
    <div class="enunciado">
      <p>Escribir un programa que pida la nota de un examen, y muestre la calificación obtenida.</p>
    </div>
    <div class="respuesta">
      <form action="nota.php" method="POST">
        <label for="nota">Nota: </label><input type="number" name="nota" min="0" max="10" step="0.01" value="0">
        <input type="submit" name="calcularNota" value="Calcular nota">
      </form>
    </div>
  </div>
  <div> <!-- Ejercicio 5 -->
    <h2>Ejercicio 5.</h2>
    <div class="enunciado">
      <p>Escribir un programa que nos pida un número de DNI y nos calcule la letra. El cálculo se realiza dividiendo el número entre 23 y el resto se sustituye por letra que corresponde mediante la siguiente tabla:</p>
    </div>
    <div class="respuesta">
      <form action="dni.php" method="POST">
        <label for="dni">Introduce los números del DNI </label><input type="text" pattern="[0-9]{8}" name="dni">
        <input type="submit" name="calcularLetra" value="Calcular letra">
      </form>
    </div>
  </div>
</body>
</html>