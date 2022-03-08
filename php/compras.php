<?php
    session_start();
    include 'conexion.php';

    $arreglo=$_SESSION['carrito'];
	$numeroventa=0;
	$sql = "SELECT * FROM compras ORDER BY numeroventa DESC limit 1";
    $ejecuta_sentencia = mysqli_query($conexion, $sql);
    while($f=mysqli_fetch_array($ejecuta_sentencia)) {
    	$numeroventa=$f['numeroventa'];
    }
    if($numeroventa==0) {
    	$numeroventa=1;
    }else{
    	$numeroventa=$numeroventa+1;
    }
    for($i=0; $i<count($arreglo); $i++) {
    $insertar =	"INSERT INTO compras(numeroventa, nombre, imagen, precio, cantidad, subtotal) VALUES (
		".$numeroventa.",
		'".$arreglo[$i]['Nombre']."',
		'".$arreglo[$i]['Imagen']."',
		'".$arreglo[$i]['Precio']."',
		'".$arreglo[$i]['Cantidad']."',
		'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."'
    	)";

    	$resultado = mysqli_query($conexion, $insertar);
		if (!$resultado) {
			header("location:Errorpedido.html");
		} else {
			
		}
    }
?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
	<title>Don Chucho | Inicio</title>    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
						<img src="../images/logo.png" class="logo" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.html">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="../index.html#menu-slash">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="../about.html">Nosotros</a></li>
						<li class="nav-item"><a class="nav-link" href="../menu.php">A Domicilio</a></li>
						<li class="nav-item"><a class="nav-link" href="../contact.php">Contacto</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Carrito de Compras</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
        <div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Pedido a Domicilio</h2>
						<p>¡Ingresa tus datos para llevarte tu pedido lo más pronto posible!</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form method="post" action="pedidos.php">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="nombre" placeholder="Ingresa tu nombre" required data-error="Ingresa tu nombre">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Ingresa tu apellido" id="email" class="form-control" name="apellido" required data-error="Ingreasa tu apellido">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="event" name="calle" placeholder="Ingresa la calle de tu direccion" required data-error="Ingresa la calle de tu direccion">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group"> 
                                <input type="text" class="form-control" id="event" name="colonia" placeholder="Ingresa la colonia de tu direccion" required data-error="Ingresa la colonia de tu direccion">
									<div class="help-block with-errors"></div>
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="event" name="telefono" placeholder="Ingresa tu numero de telefono" required data-error="Ingresa tu numero de telefono">
									<div class="help-block with-errors"></div>
								</div>                         
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="event" name="referencias" placeholder="Ingresa las referencias" required data-error="Ingresa las referencias">
									<div class="help-block with-errors"></div>
								</div>                    
							</div>
                            <div class="col-md-12">
								<div class="form-group"> 
									<textarea class="form-control" id="message" name="numeroventa" placeholder="Tu mensaje" rows="4" data-error="Ingresa un mensaje" required><?php echo "$numeroventa"; ?></textarea>
									<div class="help-block with-errors"></div>
								</div>
								<div class="submit-button text-center">
									<button type="submit" class="btn btn-common">Enviar</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div> 
									<div class="clearfix"></div> 
								</div>
							</div>
						</div>            
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Telefono</h4>
						<p class="lead">
							+01 553-934-9083
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							donchucho@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Ubicación</h4>
						<p class="lead">
							804, Lazaro Cardenas, CDMX
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>Sobre Nosotros</h3>
					<p>Somos un restuarante mexicano, en el cual procuramos brindarle el mejor servicio a nuestros clientes.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBETE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Información de Contacto</h3>
					<p class="lead">804, Lazaro Cardenas, CDMX, 508000</p>
					<p class="lead"><a href="#">+01 553-934-9083</a></p>
					<p><a href="#"> donchucho@gmail.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Horarios de Apertura</h3>
					<p><span class="text-color">Lun-Dom: </span>Cerrado</p>
					<p><span class="text-color">Mar-Mie :</span> 8:00 AM - 6:00 PM</p>
					<p><span class="text-color">Jue-Vie :</span> 8:00 AM - 6:00 PM</p>
					<p><span class="text-color">Sabado :</span> 8:00 AM - 6:00 PM</p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">Todos los derechos reservados. &copy; 2022 <a href="#">Don Chucho Restuarant</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/problema.js"></script>
    <!-- ALL PLUGINS -->
	<script src="../js/jquery.superslides.min.js"></script>
	<script src="../js/images-loded.min.js"></script>
	<script src="../js/isotope.min.js"></script>
	<script src="../js/baguetteBox.min.js"></script>
	<script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>