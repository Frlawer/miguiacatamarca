<?php require_once('../clases/cat_class.php');
require_once('../clases/class_class.php'); ?><!DOCTYPE HTML>
<html>
	<head>
		<title>Clasificados Mi Guía Catamarca</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Publicá tu clasificado gratis en Mi Guía Catamarca." />
		<meta name="keywords" content="Catamarca, anuncios clasificados, clasificados, compra, venta, inmuebles, autos, motos, celulares, trabajo, empleo, servicios" />
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><![endif]-->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-layers.min.js"></script>
		<script src="/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="/css/skel.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-xlarge.css" />
		</noscript>
		<script src="http://platform.twitter.com/widgets.js"></script>
		<script src="http://miguiacatamarca.com/js/social.js"></script>
		<script>
		(function() {
			var cx = '002879616134673256382:WMX-1286968695';
			var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
			gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
			'//www.google.com/cse/cse.js?cx=' + cx;
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
		})();
		</script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-18727563-22', 'auto');
		  ga('send', 'pageview');

		</script>
		<script type="text/javascript">
		var disqus_shortname = 'clasificadosmiguiacatamarca';
		(function () {
		var s = document.createElement('script'); s.async = true;
		s.type = 'text/javascript';
		s.src = '//' + disqus_shortname + '.disqus.com/count.js';
		(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
		}());
		</script>
	</head>
	<body id="top">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=510154989074719&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<?php $categoria = new Tipo(); ?>
		<?php $categoria->select(); ?>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="http://miguiacatamarca.com"><i class="icon fa-long-arrow-left"></i> Mi Guía Catamarca</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="http://clasificados.miguiacatamarca.com">Inicio</a></li>
						<li><a href="/categoria/1_compra-venta" class="icon ">Compra-Venta</a></li>
						<li><a href="/categoria/2_vehiculos" class="icon ">Vehiculos</a></li>
						<li><a href="/categoria/3_inmuebles" class="icon ">Inmuebles</a></li>
						<li><a href="/categoria/4_empleos" class="icon ">Empleos</a></li>
						<li><a href="/nuevo" class="button special">Nuevo</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2><img src="/images/logo.png" id="logo" class="3u"></h2>
				<p>Selecciona que estas buscando.</p>
				<ul class="action">
					<?php foreach ($categoria->rows as $key => $value): ?>
					<li><a href="/categoria/<?php echo $value['id'] ?>_<?php echo $value['url'] ?>" class="button special"><?php echo $value['nombre'] ?></a></li>
					<?php endforeach ?>
				</ul>
			</section>

		<!-- Main -->
			<div id="main" class="container">
