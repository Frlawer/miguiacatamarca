<!DOCTYPE html>
<html lang="es" class="no-js">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# place: http://ogp.me/ns/place#">
	<base href="<?php echo BASE_URL ?>" />
	<title>Mi Guía Catamarca | <?php echo TITULO_WEB ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="La guía más completa de la provincia, todos los servicios, comercios y profesionales en un solo lugar. No pierdas la oportunidad de estar en Mi Guía Catamarca" />
	<meta name="keywords" content="guía, clasificados, catamarca, anuncios, servicios, comercios, profesionales, educación, cursos, delivery, rubros" />
	<meta name="viewport" content="width=1040" />
	<meta name="author" content="Frlawer" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta name="google-site-verification" content="xgQtHoap7rPOOCTza_qoyq87BWR_dkSaKpp-fk3-Ez8" />
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" href="/css/animations.css">
	<noscript>
		<link rel="stylesheet" href="/css/style-noscript.css" />
		<link rel="stylesheet" href="/css/styles.css" />
		<link rel="stylesheet" href="/css/style-pc.css" />
	</noscript>
	<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><![endif]-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="/js/jquery.dropotron.js"></script>
	<script src="/js/config.js"></script>
	<script src="/js/skel.min.js"></script>
	<script src="/js/skel-panels.min.js"></script>
	<!--[if lte IE 7]><script src="/fonts/lte-ie7.js"></script><![endif]-->
	<script src="/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="/js/gmaps.js"></script>
	<script src="/js/mkfilter.js"></script>
	<script src="/js/prettify.js"></script>
	<script src="/js/social.js"></script>
	<script type="text/javascript" src="/js/fetcher.js"></script>
	<script>
	(function() {
		var cx = '002879616134673256382:WMX-1286968695';
		var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
		gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		'//www.google.com/cse/cse.js?cx=' + cx;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
	})();
	</script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-18727563-22', 'auto');
	  ga('send', 'pageview');

	</script>
<?php if ($_GET['view'] == 'rubro'): ?>
	<meta property="fb:app_id" content="302184056577324" />
	<meta property="og:type"   content="article" />
	<meta property="og:url"    content="http://miguiacatamarca.com/rubro/<?php echo $rubro->rows[0]['url']; ?>" />
	<meta property="og:title"  content="Mi Guía Catamarca | <?php echo TITULO_WEB ?>" />
	<meta property="og:image"  content="http://miguiacatamarca.com/images/serv.jpg" />
	<meta property="og:image"  content="http://miguiacatamarca.com/images/comr.jpg" />
	<meta property="og:image"  content="http://miguiacatamarca.com/images/prof.jpg" />
	<meta property="og:image"  content="http://miguiacatamarca.com/images/del.jpg" />
	<meta property="og:image"  content="http://miguiacatamarca.com/images/educ.jpg" />
	<meta property="og:locale" content="es_LA" />
<?php elseif($_GET['view'] == 'categoria'): ?>
	<meta property="fb:app_id" content="302184056577324" />
	<meta property="og:type"   content="article" />
	<meta property="og:url"    content="http://miguiacatamarca.com/categoria/<?php echo $cat->rows[0]['url']; ?>" />
	<meta property="og:title"  content="Mi Guía Catamarca | <?php echo TITULO_WEB ?>" />
	<meta property="og:image"  content="http://miguiacatamarca.com/images/fondo_web.jpg" />
	<meta property="og:locale" content="es_LA" />
<?php elseif($_GET['view'] == 'lugar'): ?>
	<meta property="og:url" content="<?php echo BASE_URL.$_SERVER['REQUEST_URI']; ?>" />
	<meta property="og:type" content="place" />
	<meta property="og:title" content="Mi Guía Catamarca | <?php echo TITULO_WEB ?>" />
	<meta property="og:description" content="<?php if (!empty($lugar->rows[0]['descrip'])){
		echo $lugar->rows[0]['descrip']; }else{ echo $lugar->rows[0]['nombre']." La guía más completa de la provincia, todos los servicios, comercios y profesionales en un solo lugar. No pierdas la oportunidad de estar en Mi Guía Catamarca"; } ?>" />
	<meta property="og:site_name" content="Mi Guía Catamarca" />
	<meta property="og:image" content="<?php if ($lugar->rows[0]['img'] !== '') {echo BASE_URL.'images/u/'.$lugar->rows[0]['img'].'.jpg'; }else{echo BASE_URL.'images/fondo_web.jpg';} ?>" />
	<meta property="place:location:latitude"  content="<?php if ($lugar->rows[0]['coord'] !== '') {$latlong = explode(',',$lugar->rows[0]['coord']); echo $latlong[0]; }else{echo '-28.4667867';} ?>" />
	<meta property="place:location:longitude" content="<?php if ($lugar->rows[0]['coord'] !== '') { echo $latlong[1];}else{echo '-65.7760949';} ?>" />
	<meta property="og:locale" content="es_LA" />
	<meta property="fb:app_id" content="510154989074719" />
<?php endif ?>
</head>
<body class="right-sidebar">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3&appId=510154989074719";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Encabezado Full -->
	<div id="header-wrapper">

		<!-- Encabezado -->
		<div id="header" class="container">

			<!-- Logo -->
			<h1 id="logo" class="hatch" ><a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL ?>images/logo.png" class="logo" alt="Mi Guía Catamarca" /></a></h1>
			<!-- /Logo -->
			<!-- Tagline -->
			<p>La guía más completa de la Provincia</p>
			<!-- /Tagline -->

			<!-- Menu -->
			<div class="mainnav clearfix">
				<nav  id="menu" class="nav">
					<ul>
						<li>
							<a  href="<?php echo BASE_URL ?>" title="">
								<span  class="icon"><i aria-hidden="true"  class="i-home"></i></span>
								<span>Inicio</span>
							</a>
						</li>
						<li>
							<a href="/rubro/servicios" title="">
								<span class="icon"> <i aria-hidden="true" class="i-wrench"></i></span>
								<span>Servicios</span>
							</a>
						</li>
						<li>
							<a  href="/rubro/comercios" title="">
								<span  class="icon"><i  aria-hidden="true" class="i-office"></i></span>
								<span>Comercios</span>
							</a>
						</li>
						<li>
							<a  href="/rubro/profesionales" title="">
								<span  class="icon"><i  aria-hidden="true" class="i-briefcase"></i></span>
								<span>Profesionales</span>
							</a>
						</li>
						<li>
							<a  href="/rubro/educacion" title="">
								<span  class="icon"><i  aria-hidden="true" class="i-book"></i></span>
								<span>Educación</span>
							</a>
						</li>
						<li>
							<a  href="/rubro/delivery" title="">
								<span  class="icon"><i  aria-hidden="true" class="i-food"></i></span>
								<span>Delivery</span>
							</a>
						</li>
						<li>
							<a  href="/contacto" title="">
								<span  class="icon"><i  aria-hidden="true" class="i-comment"></i></span>
								<span>Contacto</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<!-- /Menu -->
		</div>
		<!-- /Encabezado -->

	</div>
	<!-- Encabezado Full -->
	<script>
			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};

			//  Creating our button in JS for smaller screens
			var menuElements = document.getElementById('menu');
			menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="i-menu"> </i> Menu</button>');

			//  Toggle the class on click to show / hide the menu
			document.getElementById('menutoggle').onclick = function() {
				changeClass(this, 'navtoogle active', 'navtoogle');
			}

			// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
			document.onclick = function(e) {
				var mobileButton = document.getElementById('menutoggle'),
					buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

				if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
					changeClass(mobileButton, 'navtoogle active', 'navtoogle');
				}
			}
		</script>

	<!-- Principal Full -->
	<div id="main-wrapper">

			<!-- Principal -->
			<div id="main" class="container">
				<!-- Contenido -->
				<div class="row">