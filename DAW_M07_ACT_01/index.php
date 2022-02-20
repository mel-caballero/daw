<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Actividad 1 de M07">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title>Actividad 1</title>
</head>
<body class="container my-4">
  <h1>M07 Actividad 1</h1>
  <h2>Ejercicio 1</h2>
  <p>Realizar los siguientes ejercicios utilizando código PHP embebido en HTML:</p>
  <div> <!-- Ejercicio 1.1 -->
    <h3>Ejercicio 1.1.</h3>
    <div class="enunciado">
      <p>Escribir un programa en que se declare una variable que contenga un valor numérico (el que tú quieras). Este valor representará una cantidad en euros. El programa calculará el equivalente a otras dos monedas: dólares americanos y yenes. La equivalencia entre euro y dólar y euro y yen deberá guardarse en constantes.</p>
    </div>
    <div class="respuesta">
      <?php
        $euro = 1;
        define("DOLLAR", 1.145201 * $euro);
        define("YEN", 131.93876 * $euro);
        echo "<p>$euro euro(s) equivalen a ".DOLLAR." dólares y ".YEN." yenes.</p>";
      ?>
    </div>
    
  </div>
  <div> <!-- Ejercicio 1.2 -->
    <h3>Ejercicio 1.2.</h3>
    <div class="enunciado">
      <p>Escribir un programa que, daba una cantidad de segundos, muestre por pantalla a cuántas horas, minutos y segundos equivale. Por ejemplo, 5363 segundos equivalen a 1 horas, 29 minutos, 23 segundos.</p>
    </div>
    <div class="respuesta">
      <?php
        $num = 5363;
        $horas = floor($num / 3600);
        $minutos = floor(($num - ($horas * 3600)) / 60);
        $segundos = $num - ($horas * 3600) - ($minutos * 60);;
        echo "<p>$num segundos, equivalen a $horas horas, $minutos minutos, $segundos segundos.</p>";
      ?>
    </div>
  </div>
  <div> <!-- Ejercicio 1.3 -->
    <h3>Ejercicio 1.3.</h3>
    <div class="enunciado">
      <p>Escribir un programa que guarde en tres variables los coeficientes de una ecuación de segundo grado. Debe guardar en otras dos variables los resultados, y mostrarlos por pantalla. Para hacer la raíz cuadrada, usar la función de PHP sqrt (número).</p>
    </div>
    <div class="respuesta">
      <?php
        $a = 1;
        $b = 3;
        $c = 2;
        $res1 = (-($b) + (sqrt((pow($b, 2) - (4 * $a * $c))))) / (2 * $a);
        $res2 = (-($b) - (sqrt((pow($b, 2) - (4 * $a * $c))))) / (2 * $a);
        echo "<p>$a x<sup>2</sup> + $b X + $c = 0</p>";
        echo "<p>$res1</p>";
        echo "<p>$res2</p>";
      ?>
    </div>
  </div>
  <div> <!-- Ejercicio 1.4 -->
    <h3>Ejercicio 1.4.</h3>
    <div class="enunciado">
      <p>Escribir un programa que, daba la longitud del radio de una circunferencia, nos muestre la longitud y el área de la circunferencia y volumen de la esfera equivalente. Para utilizar el número π en PHP puedes observar este link: http://php.net/manual/es/math.constants.php.</p>
    </div>
    <div class="respuesta">
      <?php
        $radio = 8;
        $longitud = round(2 * M_PI * $radio, 2);
        $area = round(M_PI * pow($radio, 2), 2);
        $volumen = round(4 * M_PI * pow($radio, 3) / 3, 2);
        echo "<p>Dado el radio $radio, la longitud de la circunferencia es $longitud, el área es $area y el volumen es $volumen</p>";
      ?>
    </div>
  </div>
  <div> <!-- Ejercicio 1.5 -->
    <h3>Ejercicio 1.5.</h3>
    <div class="enunciado">
      <p>Escribe un programa en PHP que construya una tabla HTML de 20x20. En cada casilla se mostrará un número, empezando por 1. Las casillas irán cambiando de color, siguiendo la misma secuencia (por ejemplo, verde, amarillo y rojo).</p>
    </div>
    <div class="respuesta">
      <?php
        define("TAM", 20);
        $colores = ["#fa9e9b", "#c9f081", "#81f0be"];
        $limite = count($colores) - 1;
        $c = 0;
        echo "<table>";
        for ($i = 0; $i < TAM; $i++) {
          echo "<tr>";
          for ($j = 0; $j < TAM; $j++) {
            echo "<td style='background-color: $colores[$c];'>".$i * TAM + $j + 1 ."</td>";
            $c < $limite ? $c++ : $c = 0;
          } 
          echo "</tr>";
        }
        echo "</table>";
      ?>
    </div>
  </div>
</body>
</html>