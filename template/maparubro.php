<?php
error_reporting(-1);
ini_set('display_errors', '1');
require_once('../clases/lugar.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="../js/mkfilter.js"></script>
	<script src="../js/prettify.js"></script>
	<style>
	li{display:inline;}</style>
</head>
<body>
	<div id="markers-with-index">

			<input type="radio" class="num" data-rubro="1">Servicios</a>

			<input type="radio" class="num" data-rubro="2">Comercios</a>

			<input type="radio" class="num" data-rubro="3">Profesionales</a>

			<input type="radio" class="num" data-rubro="4">Educación</a>

			<input type="radio" class="num" data-rubro="5">Delivery</a>
	</div>

	<div class="12u">
		<div id="fullmap" class="6u"></div>
	</div>
	<script>
		var map;
		$(document).ready(function () {
			prettyPrint();
			map = new GMaps({
				div: '#fullmap',
				width: '300px',
				height: '300px',
				lat: -28.4667867,
				lng: -65.7760949,
			});
<?php
$array_resultante = array();
	$rubros = new Lugar();
for ($i=1; $i <= 5; $i++) {

	$rubros->A($i);
	$array_resultante = $rubros->rows;
}
?>

			map.addMarkers([{<?php	foreach ($array_resultante as $key => $value){
			if ($value['coord'] !== ''){
				$padre = new Lugar();
				$padre->ObtenerIdPadre($value['categoria']);

				$coordid = explode(',', $value['coord']);

?>lat: <?php echo $coordid[0] ?>,lng: <?php echo $coordid[1] ?>,icon: '/images/maker_<?php echo $padre->rows[0]["id_padre"] ?>.png',size: 'small',details: <?php echo $padre->rows[0]["id_padre"] ?>,infoWindow: {content: '<img src="../images/<?php if (!empty($value["img"])){echo "u/".$value["img"].".jpg";}else{echo "../default.png";} ?>" style="width: 110px;float: left;margin-right: 10px;" /><h3><a href="../lugar/<?php echo $value["url"] ?>"><?php echo utf8_encode($value["nombre"]) ?></a></h3><p><?php echo utf8_encode($value["direccion"]) ?></p>'}<?php
			}

    		if(count($rubros->rows)-1 != $key) {

    			echo '},{';

    		}else{

    			echo '}';

    		}

    	} ?>]);<?php
?>});
		$(document).on('click', '.num', function(e) {
			e.preventDefault();

			var $num = $(this).data('rubro');

		    var miArray = new Array('1', '2', '3','4','5');
			// var posBorrar = miArray.indexOf($num);
			// miArray.splice(posBorrar, 1);

			for (var indice = 0; indice < miArray.length; ++indice) {

			    var no_filtrado = map.markerFilter(function() {
			    	return this == miArray[indice];
			    });

			    console.log('filtrado para borrar '+no_filtrado.length);

			    for (var indi = 0; indi < no_filtrado.length; indi++) {
					console.log('indice de los no filtrados '+indi);
			    	no_filtrado[indi].setVisible(false);
			    }

			}

			if ($num != undefined) {
			    var filtered = map.markerFilter(function() {
			    	return this == $num;
			    });

		    	console.log(filtered.length);

			    for (var index = 0; index < filtered.length; index++) {
			    	filtered[index].setVisible(true);
			    }

			}

		});
	</script>
</body>
</html>