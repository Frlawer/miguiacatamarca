<?php
error_reporting(-1);
ini_set('display_errors', '1');
if (!isset($_GET['idnoti'])) {
	require_once('./clases/noticia.php');
 	$noti = new Noticia();
 	$noti->select();
 	foreach ($noti->rows as $key => $value) {
 		echo $value['titulo'];
 	}
 }





 ?>