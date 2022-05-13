<?php
  require_once('conexion.php');
  $con = mysqli_connect($host, $user, $pass, $db_name) or die ("ERROR. No se ha podido conectar con la base de datos");
  $query = 'SELECT * FROM local';
  $result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Melanie Caballero">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <title>M07 ACT 6</title>
  <style>
    /* 
    * Always set the map height explicitly to define the size of the div element
    * that contains the map. 
    */
    #map {
      height: 80%;
      width: 100%;
    }

    /* 
    * Optional: Makes the sample page fill the window. 
    */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
  <script type="text/javascript">
    let map;

    function initMap() {
      const coord = {lat: 41.3879, lng: 2.16992};

      map = new google.maps.Map(document.getElementById("map"), {
        center: coord,
        zoom: 12,
      });

      let misMarcadores = [];

      <?php
        while($locales = mysqli_fetch_array($result)){
          extract($locales);
          echo "misMarcadores.push(['".$nombre."', ".$coordenadas.", '".$poblacion."', '".$tipo."']);";
        }
      ?>

      const infowindow = new google.maps.InfoWindow();

      misMarcadores.forEach(([title, position, poblacion, tipo]) => {
        const marker = new google.maps.Marker({
          position,
          map,
          title,
        });

        marker.addListener("click", () => {
          infowindow.setContent("<p>" + title + "</p><p>" + poblacion + " - " + tipo + "</p>");
          infowindow.open({
            anchor: marker,
            map,
            shouldFocus: false,
          });
        });
      });
    }

    window.initMap = initMap;
  </script>
</head>
<body class="container mt-5">
  <div id="map"></div>
  <?php echo '<script src="https://maps.googleapis.com/maps/api/js?key='.$api.'" defer></script>'; ?>
</body>
</html>