<?php
	include 'php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
	<title>Don Chucho | A Domicilio</title>    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
						<img src="images/logo.png" class="logo" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.html">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="index.html#menu-slash">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="about.html">Nosotros</a></li>
						<li class="nav-item active"><a class="nav-link" href="menu.php">A Domicilio</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contacto</a></li>
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
					<h1>Pedidos a Domicilio</h1>
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
						<h2>Menú</h2>
						<p>Nuestros platillos te van a sorprender.</p>
					</div>
				</div>
			</div>

			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Pozole</a>
						<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Guisos</</a>
						<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Bebidas</a>
					</div>
				</div>
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<!-- Todos -->
							<div class="row">
								<?php
									$sql = "SELECT * FROM productos WHERE tipo=1 || tipo=4";
									$re = mysqli_query($conexion, $sql)or die(mysqli_error());
									while ($f = mysqli_fetch_array($re)) {
								?>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="<?php echo $f['imagen'];?>" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4><?php echo $f['nombre'];?></h4>
											<p><?php echo $f['descripcion'];?></p>							
											<h5>$ <?php echo $f['precio'];?> | <a href="pageCarrito.php?id=<?php echo $f['id'];?>">Añadir al Carrito</a></h5>
										</div>
									</div>
								</div>

								<?php
									}
								?>
							</div>
						</div>
				
						<!-- Guisos -->
						<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<div class="row">
								<?php
										$sql = "SELECT * FROM productos WHERE tipo=2";
										$re = mysqli_query($conexion, $sql)or die(mysqli_error());
										while ($f = mysqli_fetch_array($re)) {
									?>
									<div class="col-lg-4 col-md-6 special-grid drinks">
										<div class="gallery-single fix">
											<img src="<?php echo $f['imagen'];?>" class="img-fluid" alt="Image">
											<div class="why-text">
												<h4><?php echo $f['nombre'];?></h4>
												<p><?php echo $f['descripcion'];?></p>
												<h5>$ <?php echo $f['precio'];?> | <a href="pageCarrito.php?id=<?php echo $f['id'];?>">Añadir al Carrito</a></h5>
											</div>
										</div>
									</div>

									<?php
										}
									?>
							</div>
						</div>
						
						<!-- Bebidas -->
						<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
							<div class="row">
							<?php
									$sql = "SELECT * FROM productos WHERE tipo=3";
									$re = mysqli_query($conexion, $sql)or die(mysqli_error());
									while ($f = mysqli_fetch_array($re)) {
								?>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="<?php echo $f['imagen'];?>" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4><?php echo $f['nombre'];?></h4>
											<p><?php echo $f['descripcion'];?></p>
											<h5>$ <?php echo $f['precio'];?> | <a href="pageCarrito.php?id=<?php echo $f['id'];?>">Añadir al Carrito</a></h5>
										</div>
									</div>
								</div>

								<?php
									}
								?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" Las recetas no funcionan al menos que utilices tu corazón. "
					</p>
					<span class="lead">Dylan Jone</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	
	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Opiniones de Clientes</h2>
						<p>La opinión de nuestros clientes es lo más valioso en nuestro restaurante.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Alejandro Garza</strong></h5>
								<h6 class="text-dark m-0">Desarrollador Web</h6>
								<p class="m-0 pt-3">Comida, presentación y trato del personal excelente a un precio razonable.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Benito Ocasio</strong></h5>
								<h6 class="text-dark m-0">Empresario</h6>
								<p class="m-0 pt-3">Platos modernos con muchisimo sabor.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel Dominguez</strong></h5>
								<h6 class="text-dark m-0">Médico Cirujano</h6>
								<p class="m-0 pt-3">Menú fantástico.</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Siguiente</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Customer Reviews -->
	
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
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
	<script src="https://kit.fontawesome.com/c7d7062c45.js" crossorigin="anonymous"></script>
</body>
</html>