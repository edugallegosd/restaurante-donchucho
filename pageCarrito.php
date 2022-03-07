<?php
    session_start();

	include 'php/conexion.php';  

    if (isset($_SESSION['carrito'])) {
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;

        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }

        if ($encontro == true) {
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION['carrito'] = $arreglo;
        }else{
            $nombre = "";
            $precio = 0;
            $imagen = "";
            $tipo = 0;
            $sql = "SELECT * FROM productos WHERE id=".$_GET['id'];
            $ejecuta_sentencia = mysqli_query($conexion, $sql);
            while ($f = mysqli_fetch_array($ejecuta_sentencia)) {
                $nombre = $f['nombre'];
                $precio = $f['precio'];
                $imagen = $f['imagen'];
                $tipo = $f['tipo'];
            }

            $datosNuevos = array('Id'=>$_GET['id'],
                               'Nombre'=>$nombre,
                               'Precio'=>$precio,
                               'Imagen'=>$imagen,
                               'Tipo'=>$tipo,
                               'Cantidad'=> 1
            );

            array_push($arreglo, $datosNuevos);
            $_SESSION['carrito'] = $arreglo;
        }
    }else{
        if (isset($_GET['id'])) {
            $nombre = "";
            $precio = 0;
            $imagen = "";
            $tipo = 0;
            $sql = "SELECT * FROM productos WHERE id=".$_GET['id'];
            $ejecuta_sentencia = mysqli_query($conexion, $sql);
            while ($f = mysqli_fetch_array($ejecuta_sentencia)) {
                $nombre = $f['nombre'];
                $precio = $f['precio'];
                $imagen = $f['imagen'];
                $tipo = $f['tipo'];
            }

            $arreglo[] = array('Id'=>$_GET['id'],
                               'Nombre'=>$nombre,
                               'Precio'=>$precio,
                               'Imagen'=>$imagen,
                               'Tipo'=>$tipo,
                               'Cantidad'=> 1
            );

            $_SESSION['carrito'] = $arreglo;
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
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

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
						<img src="images/logo.png" class="logo" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.html">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="#menu-slash">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="about.html">Nosotros</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.php">A Domicilio</a></li>
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
					<h1>Carrito de Compras</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<?php 
                if (isset($_SESSION['carrito'])) {
                    $datos = $_SESSION['carrito'];
                    $total = 0;

                    for ($i = 0; $i < count($datos); $i++) {
            ?>
                    <div>
                        <center>
                            <img src="<?php echo $datos[$i]['Imagen']; ?>">
                            <span>Nombre: <?php echo $datos[$i]['Nombre'];?></span>
                            <span>Precio: <?php echo $datos[$i]['Precio'];?></span>
                            <span><input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"></span>
                            <span>Subtotal: <?php echo $datos[$i]['Precio'] * $datos[$i]['Cantidad'];?></span>
                        </center>
                    </div>
            <?php
                    $total = ($datos[$i]['Cantidad'] * $datos[$i]['Precio']) + $total;
                    }
                }else{
                    echo '<center><h2>El carrito de compras está vacio.</h2></center>';
                }

                echo '<center><h2>Total: '.$total.'</h2></center>';
            ?>
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
					<p><span class="text-color">Lunes: </span>Cerrado</p>
					<p><span class="text-color">Mar-Mie :</span> 7:Am - 10PM</p>
					<p><span class="text-color">Jue-Vie :</span> 7:Am - 10PM</p>
					<p><span class="text-color">Sab-Dom :</span> 9:PM - 10PM</p>
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
</body>
</html>