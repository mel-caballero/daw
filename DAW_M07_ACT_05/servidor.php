<?php
require_once('lib/nusoap.php');

$namespace = 'http://localhost:8080/daw/DAW_M07_ACT_05/servidor.php';
$server = new soap_server();
$server->configureWSDL('MiServicioWeb', $namespace);
$server->schemaTargetNamespace = $namespace;
$server->soap_defencoding = 'UTF-8';

function listaProductos($categoria){
  require_once('conexion.php');
  $misProductos = array();
  $con = mysqli_connect($host, $user, $pass, $db_name);
  $query = 'select * from producto where categoria="'.$categoria.'";';
  $productos = mysqli_query($con, $query);
  while($producto = mysqli_fetch_assoc($productos)){
    $misProductos[] = $producto;
  }
  mysqli_close($con);
  return $misProductos;
}

$server->wsdl->addComplexType(
  'Producto',
  'complexType',
  'struct', 
  'all',
  '',
  array(
  'id' => array('name'=>'id','type'=>'xsd:int'),
  'nombre' => array('name'=>'nombre','type'=>'xsd:string'),
  'categoria' => array('name'=>'categoria','type'=>'xsd:int')
  )
);

$server->wsdl->addComplexType(
  'ArrayProductos',
  'complexType',
  'array',
  '',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'ref'=>'SOAP-ENC:arrayType',
      'wsdl:arrayType'=>'tns:Producto[]')
    ),
    'tns:Producto'
  );

  $server->register(
    'listaProductos',
    array(),
    array('return'=>'tns:ArrayProductos'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Método que devuelve una array con los productos de la
    base de datos'
    );

$server->service(file_get_contents('php://input'));