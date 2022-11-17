<?php
error_reporting(-1);
ini_set('display_errors', '1');
require_once('../clases/lugar.php');

$array_resultante = array();
	$rubros = new Lugar();
for ($i=1; $i < 6; $i++) {

	$rubros->A($i);
	$array_resultante = $rubros->rows;
}
var_dump($array_resultante);