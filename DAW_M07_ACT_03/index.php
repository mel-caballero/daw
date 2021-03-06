<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Actividad 3 de M07">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title>Actividad 3</title>
</head>
<body class="container my-5">
  <h1>M07 Actividad 3</h1>
  <div> <!-- Ejercicio 1 -->
    <h2>Ejercicio 1.</h2>
    <div class="enunciado">
      <p>Crea una aplicación que genere un número aleatorio entre 1 y 100. El usuario tiene que acertarlo. El programa irá dando pistas al usuario (el número que buscas es mayor, el número que buscas es menor). El usuario tendrá un formulario donde introducirá el número que crea. Usa la función rand para generar un número aleatorio.</p>
    </div>
    <div class="respuesta">
      <form action="scripts/comprobarNum.php" method="POST">
        <label for="num">Introduce un número </label><input type="number"  name="num">
        <input type="submit" value="Comprobar Número">
      </form>
    </div>
  </div>
  <div> <!-- Ejercicio 2 -->
    <h2>Ejercicio 2.</h2>
    <div class="enunciado">
      <p>Crea una aplicación web que simule el estado de un parking público.</p>
      <p>Tendremos dos tipos de aparcamientos: pequeño y grande. Habrá un total de 10 plazas pequeñas y 14 grandes. Cada tipo de parking se representará mediante un array, que guardará la siguiente información: 0 - plaza libre, 1 - plaza ocupada.</p>
      <p>Los coches grandes, sólo se podrán aparcar en plazas grandes, y los coches pequeños se intentarán aparcar primero en plazas pequeñas, pero si éstas están todas ocupadas y hay alguna plaza grande libre, el coche pequeño se aparcará en una plaza grande.</p>
      <p>La aplicación constará de una página principal en la que se mostrarán 3 opciones:</p>
      <ul>
        <li>Aparcar coche.</li>
        <li>Retirar coche.</li>
        <li>Ver estado del parking.</li>
      </ul>
      <p>Cada opción estará representada por un RadioButton, que nos llevará a una página diferente.</p>
      <p>En la página para aparcar, el usuario deberá especificar el tipo de coche que tiene (grande o pequeño), y el programa lo intentará aparcar, mostrando los siguientes posibles mensajes: “Coche aparcado” o “No hay sitio para su coche”. En ningún momento se especificará el número de plaza en el que se ha aparcado el coche. Se aparcará en la primera plaza que se encuentre libre.</p>
      <p>En la página para retirar un coche, el usuario especificará el tipo de coche y el número de plaza. El programa retirará el coche, pudiendo mostrar uno de los siguientes mensajes: “Coche retirado” o “En esta plaza no se encuentra ningún coche”.</p>
      <p>En la página para ver el estado del parking, se mostrarán los valores de los arrays que representan los dos parkings (ceros y unos).</p>
      <p>Desde las páginas de aparcar y de retirar un coche, después del proceso se redirigirá al usuario automática a la página principal pasados unos segundos.</p>
      <p>Se deben usar sesiones para almacenar el estado de los parkings.</p>
    </div>
    <div class="respuesta">
      <form action="scripts/parking.php" method="POST">
        <p>Selecciona una opción:</p>

        <div>
          <input type="radio" id="aparcar" name="aparcarOption" value="aparcar" onclick="aparcarDisplay()">
          <label for="aparcar">Aparcar coche</label>

          <div>
            <div class="form-check form-check-inline">
              <input type="radio" id="aparcarSmall" name="aparcarType" value="aparcarSmall" disabled>
              <label for="aparcarSmall">Coche pequeño</label>
            </div>
    
            <div class="form-check form-check-inline">
              <input type="radio" id="aparcarBig" name="aparcarType" value="aparcarBig" disabled>
              <label for="aparcarBig">Coche grande</label>
            </div>
          </div>
        </div>

        <div>
          <input type="radio" id="retirar" name="aparcarOption" value="retirar" onclick="aparcarDisplay()">
          <label for="retirar">Retirar coche</label>

          <div>
            <div class="form-check form-check-inline">
              <input type="radio" id="retirarSmall" name="retirarType" value="retirarSmall" disabled>
              <label for="retirarSmall">Parking coches pequeños</label>
            </div>
    
            <div class="form-check form-check-inline">
              <input type="radio" id="retirarBig" name="retirarType" value="retirarBig" disabled>
              <label for="retirarBig">Parking coches grandes</label>
            </div>
            
            <div class="form-check form-check-inline">
              <label for="plaza">Plaza</label>
              <input type="number" name="plaza" id="plaza" value="1" min="1" max="14" disabled>
            </div>
          </div>
        </div>

        <div>
          <input type="radio" id="ver" name="aparcarOption" value="ver" onclick="aparcarDisplay()">
          <label for="ver">Ver estado del parking</label>
        </div>

        <input type="submit" value="Parking">
      </form>
    </div>
  </div>
  <div> <!-- Ejercicio 3 -->
    <h2>Ejercicio 3.</h2>
    <div class="enunciado">
      <p>Crea un programa usando orientación a objetos. Se desea almacenar información sobre futbolistas. Concretamente se guardará un nombre, un dorsal y una cantidad de goles. Además, dependiendo del tipo de demarcación en la que juegue tendrá los siguientes atributos:</p>
      <ul>
        <li>El portero tendrá cantidad de paradas.</li>
        <li>El jugador de campo (defensa, medio y delantero) tendrá cantidad de pases y cantidad de recuperaciones.</li>
      </ul>
      <p>De los futbolistas interesa saber su valoración en un partido. Ésta se calcula de la siguiente forma:</p>
      <ul>
        <li>Portero: paradas * 5 + (goles * 30).</li>
        <li>Jugador de campo: (pases * 2) + (recuperaciones * 3) + (goles * 30).</li>
      </ul>
      <p> Crea un script en PHP que use estos datos y almacenen varios jugadores en un array. Asigna datos a estos jugadores y haz que se muestre el nombre de cada jugador, su dorsal y su valoración.</p>
    </div>
    <div class="respuesta">
      <?php
        class Futbolista{
          private $nombre;
          private $dorsal;
          private $goles;
        
          function __construct($nombre, $dorsal, $goles){
            $this->nombre = $nombre;
            $this->dorsal = $dorsal;
            $this->goles = $goles;
          }
        
          function get_nombre(){
            return $this->nombre;
          }
        
          function set_nombre($nombre){
            $this->nombre = $nombre;
          }
        
          function get_dorsal(){
            return $this->dorsal;
          }
        
          function set_dorsal($dorsal){
            $this->dorsal = $dorsal;
          }
        
          function get_goles(){
            return $this->goles;
          }
        
          function set_goles($goles){
            $this->goles = $goles;
          }
        
          function __toString(){
            return "Nombre: ".$this->nombre." | Dorsal: ".$this->dorsal.
                " | Goles: ".$this->goles;
          }
        }

        class Portero extends Futbolista {
          private $paradas;
        
          function __construct($nombre, $dorsal, $goles, $paradas){
            parent::__construct($nombre, $dorsal, $goles);
            $this->paradas = $paradas;
          }
        
          function get_paradas(){
            return $this->paradas;
          }
        
          function set_paradas($paradas){
            $this->paradas = $paradas;
          }
        
          function valoracion(){
            $paradas = $this->paradas;
            $goles = parent::get_goles();
            return ($paradas * 5) + ($goles * 30);
          }
        
          function __toString(){
            return "PORTERO: ".parent::__toString().
                " | Paradas: ".$this->paradas;
          }
        }

        class Jugador extends Futbolista {
          private $pases;
          private $recuperaciones;
        
          function __construct($nombre, $dorsal, $goles, $pases, $recuperaciones){
            parent::__construct($nombre, $dorsal, $goles);
            $this->pases = $pases;
            $this->recuperaciones = $recuperaciones;
          }
        
          function get_pases(){
            return $this->pases;
          }
        
          function set_pases($pases){
            $this->pases = $pases;
          }

          function get_recuperacioness(){
            return $this->recuperaciones;
          }
        
          function set_recuperaciones($recuperaciones){
            $this->recuperaciones = $recuperaciones;
          }
        
          function valoracion(){
            $pases = $this->pases;
            $recuperaciones = $this->recuperaciones;
            $goles = parent::get_goles();
            
            return ($pases * 2) + ($recuperaciones * 3) + ($goles * 30);
          }
        
          function __toString(){
            return "JUGADOR: ".parent::__toString().
                " | Pases: ".$this->pases." | Recuperaciones: ".$this->recuperaciones;
          }
        }
        
        // PORTERO construct($nombre, $dorsal, $goles, $paradas)
        // JUGADOR construct($nombre, $dorsal, $goles, $pases, $recuperaciones)
        $futbolistas = array();
        $futbolistas[0] = new Portero("Sandra Paños", 1, 4, 30);
        $futbolistas[1] = new Portero("Cata Coll", 13, 3, 20);
        $futbolistas[2] = new Portero("Gema Font", 24, 6, 10);
        $futbolistas[3] = new Jugador("Irene Paredes", 2, 21, 34, 54);
        $futbolistas[4] = new Jugador("Jana", 3, 22, 43, 76);
        $futbolistas[5] = new Jugador("Maria Leon", 4, 21, 24, 53);
        $futbolistas[6] = new Jugador("M. Serrano", 5, 22, 48, 76);
        $futbolistas[7] = new Jugador("Marta Torrejón", 8, 21, 46, 44);
        $futbolistas[8] = new Jugador("Leila", 15, 22, 36, 76);
        $futbolistas[9] = new Jugador("Alexia", 11, 21, 48, 54);
        $futbolistas[10] = new Jugador("Patri", 12, 22, 35, 87);

        foreach ($futbolistas as $futbolista) {
          echo $futbolista;
          if($futbolista instanceof Portero){
            echo " | Valoración : ".$futbolista->valoracion()."<br/>";
          } else if($futbolista instanceof Jugador){
            echo " | Valoración : ".$futbolista->valoracion()."<br/>";
          }
        }

      ?>
    </div>
  </div>
  <script src="scripts/scripts.js"></script>
</body>
</html>