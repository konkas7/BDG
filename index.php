<?php include 'assets/php/numero_elementi.php'; ?>
<?php session_start() ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Bottega Di Gerosa</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/logo.jpg"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
		<!--header-top start -->
		<header id="header-top" class="header-top">
			<ul>
				<li>
					<div class="header-top-left">
						<ul>
							<li class="select-opt">
								<select name="language" id="language">
									<option value="default">IT</option>
									<option value="English">EN</option>
									<option value="French">FR</option>
								</select>
							</li>
							<li class="select-opt">
								<select name="currency" id="currency">
									<option value="EUR">EUR</option>
									<option value="USD">USD</option>
								</select>
							</li>
							<li class="select-opt">
								<!--aggiungere le pagine in lingue diverse oppure aggiungere una libreria che mi traduca automaticamente le parole e modificare anche i prezzi in base alla valuta selezionata-->
								<a href="#"><span class="lnr lnr-magnifier"></span></a>
							</li>
						</ul>
					</div>
				</li>
				<li class="head-responsive-right pull-right">
					<div class="header-top-right">
						<ul>
							<?php if(isset($_SESSION['user_nome'])) { ?>
								<li class="header-top-contact">
									Ciao, <?php echo $_SESSION['user_nome']; ?>
								</li>
								<li class="header-top-contact">
									<div class="dropdown">
										<button class="dropbtn"><span class="lnr lnr-menu"></span></button>
										<div class="dropdown-content">
											<a href="#">Carrello</a>
											<a href="assets/php/logout.php">Logout</a>
										</div>
									</div>
								</li>
							<?php } else { ?>
								<li class="header-top-contact">
									+39 0345 90079
								</li>
								<li class="header-top-contact">
									<a href="/bdg/assets/html/login.html">Accedi</a>
								</li>
								<li class="header-top-contact">
									<a href="/bdg/assets/html/register.html">Registrati</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</li>
			</ul>
					
		</header><!--/.header-top-->
		<!--header-top end -->

		<!-- top-area Start -->
		<section class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.html">B<span>D</span>G</a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class=" scroll active"><a href="#home">home</a></li>
			                    <li class="scroll"><a href="#works">chi siamo</a></li>
			                    <li class="scroll"><a href="#explore">esplora</a></li>
                                <li class="scroll"><a href="#blog">Orari</a></li>
			                    <li class="scroll"><a href="#reviews">recensioni</a></li>
			                    <li class="scroll"><a href="#contact">contatti</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->

		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<div class="container">
				<div class="welcome-hero-txt">
					<h2>La vera e unica <br> Bottega Di Gerosa </h2>
					<p>
						Templio di sapori e culture tramandate di generazione in generazione
					</p>
				</div>
				<form action="/bdg/assets/php/cerca_prodotto.php" method="POST">
					<div class="welcome-hero-serch-box">
						<div class="welcome-hero-form">
							<div class="single-welcome-hero-form">
								<h3>Categoria&nbsp;&nbsp;&nbsp;</h3>
								<?php include 'assets/php/categories.php'; ?>
								<div class="welcome-hero-form-icon">
									<!--<i class="flaticon-list-with-dots"></i>-->
								</div>
							</div>

							<div class="single-welcome-hero-form">
								<h3>Nome</h3>
								<input type="text" name="nome" placeholder="Ex: Patata dolce, Gorgonzola, ..." />
								<div class="welcome-hero-form-icon">
									<i class="flaticon-gps-fixed-indicator"></i>
								</div>
							</div>
						</div>
						<div class="welcome-hero-serch">
							<button type="submit" class="welcome-hero-btn" onclick="openModal()">
								Cerca <i data-feather="search"></i>
							</button>
						</div>
						
					</div>
				</form>

			</div>

		</section><!--/.welcome-hero-->


			


		<!--welcome-hero end -->

		<!--list-topics start -->
		<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content">
					<ul>
						<li id="frutta_e_verdura">
								<div class="single-list-topics-content">
								<div class="single-list-topics-icon" style="position: relative; margin:0 auto; clear:left; height:auto; z-index: 0; text-align:center;">
									<img src="assets/images/foto_categorie/vegetable.png" alt="Icon" style="width: 38%; height: auto;">
								</div>

									
									<h2><a>Frutta e verdura</a></h2>

									<form id="frutta_verdura_form" action="/bdg/assets/php/doppia_categoria.php" method="post">
										<input type="hidden" id="categoria1" name="categoria1" value="frutta">
										<input type="hidden" id="categoria2" name="categoria2" value="verdura">
										<input type="submit" style="display: none;">
									</form>



									<?php 

										$categoria1 = "Frutta";
										$numElementi1 = numero_elementi($categoria1);
										$categoria2 = "Verdura";
										$numElementi2 = numero_elementi($categoria2);

										$somma = $numElementi1 + $numElementi2;

										// Modifica la logica di stampa in base al numero di elementi
										if ($somma == 1) {
											echo "<p>$somma elemento</p>";
										} else {
											echo "<p>$somma elementi</p>";
										}
									?>
									
								</div>


							</form>
						</li>
						
						<li id="carne_e_pesce">
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon" style="position: relative; margin:0 auto; clear:left; height:auto; z-index: 0; text-align:center;">
									<img src="assets/images/foto_categorie/proteins.png" alt="Icon" style="width: 38%; height: auto;">
								</div>
								<h2><a href="#">Carne e pesce</a></h2>
								<form id="carne_pesce_form" action="/bdg/assets/php/doppia_categoria.php" method="post">
									<input type="hidden" name="categoria1" value="carne">
									<input type="hidden" name="categoria2" value="pesce">
									<input type="submit" style="display: none;">
								</form>
								<?php 

										$categoria1 = "Carne";
										$numElementi1 = numero_elementi($categoria1);
										$categoria2 = "Pesce";
										$numElementi2 = numero_elementi($categoria2);

										$somma = $numElementi1 + $numElementi2;

										// Modifica la logica di stampa in base al numero di elementi
										if ($somma == 1) {
											echo "<p>$somma elemento</p>";
										} else {
											echo "<p>$somma elementi</p>";
										}
								?>
							</div>
						</li>
						<li id="salumi_e_formaggi">
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon" style="position: relative; margin:0 auto; clear:left; height:auto; z-index: 0; text-align:center;">
									<img src="assets/images/foto_categorie/ham.png" alt="Icon" style="width: 38%; height: auto;">
								</div>
								<h2><a href="#">Salumi e formaggi</a></h2>
								<form id="salumi_formaggi_form" action="/bdg/assets/php/doppia_categoria.php" method="post">
									<input type="hidden" name="categoria1" value="salumi">
									<input type="hidden" name="categoria2" value="formaggi">
									<input type="submit" style="display: none;">
								</form>
								<?php 

										$categoria1 = "Salumi";
										$numElementi1 = numero_elementi($categoria1);
										$categoria2 = "Formaggi";
										$numElementi2 = numero_elementi($categoria2);

										$somma = $numElementi1 + $numElementi2;

										// Modifica la logica di stampa in base al numero di elementi
										if ($somma == 1) {
											echo "<p>$somma elemento</p>";
										} else {
											echo "<p>$somma elementi</p>";
										}
								?>
							</div>
						</li>
						<li id="prodotti_da_forno">
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon" style="position: relative; margin:0 auto; clear:left; height:auto; z-index: 0; text-align:center;">
									<img src="assets/images/foto_categorie/bread.png" alt="Icon" style="width: 38%; height: auto;">
								</div>
								<h2><a href="#">Prodotti da forno</a></h2>
								<form id="forno_form" action="/bdg/assets/php/doppia_categoria.php" method="post">
									<input type="hidden" name="categoria1" value="Pane_e_Prodotti_da_Forno">
									<input type="hidden" name="categoria2" value="Prodotti_da_Forno">
									<input type="submit" style="display: none;">
								</form>
								<?php 

										$categoria1 = "Pane_e_Prodotti_da_Forno";
										$numElementi1 = numero_elementi($categoria1);
										$categoria2 = "Prodotti_da_Forno";
										$numElementi2 = numero_elementi($categoria2);

										$somma = $numElementi1 + $numElementi2;

										// Modifica la logica di stampa in base al numero di elementi
										if ($somma == 1) {
											echo "<p>$somma elemento</p>";
										} else {
											echo "<p>$somma elementi</p>";
										}
								?>
							</div>
						</li>
						<li id="prodotti_casa">
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon" style="position: relative; margin:0 auto; clear:left; height:auto; z-index: 0; text-align:center;">
									<img src="assets/images/foto_categorie/cleaning.png" alt="Icon" style="width: 38%; height: auto;">
								</div>
								<h2><a href="#">Prodotti casa</a></h2>
								<form id="casa_form" action="/bdg/assets/php/doppia_categoria.php" method="post">
									<input type="hidden" name="categoria1" value="Detersivi_per_la_Casa">
									<input type="hidden" name="categoria2" value="Prodotti_per_la_Pulizia_Personale">
									<input type="hidden" name="categoria3" value="Accessori_per_la_Cucina">
									<input type="submit" style="display: none;">
								</form>
								<?php 

										$categoria1 = "Detersivi_per_la_Casa";
										$numElementi1 = numero_elementi($categoria1);
										$categoria2 = "Prodotti_per_la_Pulizia_Personale";
										$numElementi2 = numero_elementi($categoria2);
										$categoria3 = "Accessori_per_la_Cucina";
										$numElementi3 = numero_elementi($categoria3);

										$somma = $numElementi1 + $numElementi2 + $numElementi3;

										// Modifica la logica di stampa in base al numero di elementi
										if ($somma == 1) {
											echo "<p>$somma elemento</p>";
										} else {
											echo "<p>$somma elementi</p>";
										}
								?>
							</div>
						</li>
					</ul>
				</div>
			</div><!--/.container-->

		</section><!--/.list-topics-->

		<script>
			// Aggiungi gestori di eventi click per ciascun li
			var fruttaVerduraLi = document.getElementById("frutta_e_verdura");
			fruttaVerduraLi.addEventListener("click", function() {
				document.getElementById("frutta_verdura_form").submit();
			});

			var carnePesceLi = document.getElementById("carne_e_pesce");
			carnePesceLi.addEventListener("click", function() {
				document.getElementById("carne_pesce_form").submit();
			});

			var salumiFormaggiLi = document.getElementById("salumi_e_formaggi");
			salumiFormaggiLi.addEventListener("click", function() {
				document.getElementById("salumi_formaggi_form").submit();
			});

			var prodottiFornoLi = document.getElementById("prodotti_da_forno");
			prodottiFornoLi.addEventListener("click", function() {
				document.getElementById("forno_form").submit();
			});

			var prodottiCasaLi = document.getElementById("prodotti_casa");
			prodottiCasaLi.addEventListener("click", function() {
				document.getElementById("casa_form").submit();
			});
		</script>
		<!--list-topics end-->

		<!--works start -->
		<section id="works" class="works">
			<div class="container">
				<div class="section-header">
					<h2>chi siamo</h2>
					<p>Una semplice famiglia che aspira a portare avanti i sapori e le tradizioni di montagna</p>
				</div><!--/.section-header-->
				<div class="works-content">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<img src="assets/images/Dipendenti/Alfredo.jpeg" alt="Foto Alfredo" style="border-radius: 50%;">
								</div>
								<h2><a>Alfredo Pesenti Bolò</a></h2>
								<p>
									La causa prima di ogni cosa <br><br>‎ 
								</p>
								<p id="extraText" style="display: none;">Capostipite della famiglia, Cavaliere della Repubblica e Croce al merito di guerra. Dal 1960 insieme alla prima moglie Elsa Arnoldi apre l'attività commerciale che comprende sia il negozio di generi alimentari, frutta, verdura, salumi, formaggi e utili per la casa, ma anche il commercio di prodotti locali tipici della zona. Uomo di grande abilità commerciale e importante carisma personale.</p>
								<button class="welcome-hero-btn how-work-btn toggle-button">
									Leggi altro
								</button>
								

							</div>
						</div>
						<script>
							document.addEventListener('DOMContentLoaded', function() {
								var toggleButtons = document.querySelectorAll('.toggle-button');

								toggleButtons.forEach(function(button) {
									button.addEventListener('click', function() {
										var extraText = document.getElementById("extraText");
										var buttonText = this;

										if (extraText.style.display === "none") {
											extraText.style.display = "block";
											buttonText.textContent = "Nascondi"; // Cambia il testo del pulsante quando il testo extra è visibile
										} else {
											extraText.style.display = "none";
											buttonText.textContent = "Leggi Altro"; // Cambia il testo del pulsante quando il testo extra è nascosto
										}
									});
								});
							});
						</script>
						<div class="col-md-3 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<img src="assets/images/Dipendenti/Rita.jpeg" alt="Foto Rita" style="border-radius: 50%;">
								</div>
								<h2><a>Rita Pesenti Rossi</a></h2>
								<p>
									La Gabriella del villaggio
                                    
                                    <br><br><br> ‎ 
								</p>
								<p id="extraTextt" style="display: none;">Conosciuta da tutti come "Gabri", seconda moglie di Alfredo dapprima ha aiutato il marito nell'attività, poi ha continuato sola con tanta passione e spirito di sacrificio.</p>
								<button class="welcome-hero-btn how-work-btn toggle-buttonn">
									Leggi Altro
								</button>
								
							</div>
						</div>
						<script>
							document.addEventListener('DOMContentLoaded', function() {
								var toggleButtons = document.querySelectorAll('.toggle-buttonn');

								toggleButtons.forEach(function(button) {
									button.addEventListener('click', function() {
										var extraText = document.getElementById("extraTextt");
										var buttonText = this;

										if (extraText.style.display === "none") {
											extraText.style.display = "block";
											buttonText.textContent = "Nascondi"; // Cambia il testo del pulsante quando il testo extra è visibile
										} else {
											extraText.style.display = "none";
											buttonText.textContent = "Leggi Altro"; // Cambia il testo del pulsante quando il testo extra è nascosto
										}
									});
								});
							});
						</script>
						<div class="col-md-3 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<!-- <i class="flaticon-location-on-road"></i> -->
                                    <img src="assets/images/Dipendenti/Barbara.jpg" alt="Foto Barbara" style="border-radius: 50%;">
								</div>
								<h2><a>Barbara Pesenti Bolò</a></h2>
								<p>
									Le nuove generazioni <br>‎  
								</p>
								<p id="extraTexttt" style="display: none;">Degna erede commerciale dei genitori, ha portato avanti l'attività nonostante le grosse problematiche del periodo e con non pochi sacrifici per non lasciare senza un piccolo appoggio alimentare le persone anziane o impossibilitate a muoversi in auto che abitano nel paese di Gerosa.</p>
								<button class="welcome-hero-btn how-work-btn toggle-buttonnn">
									Leggi Altro
								</button>
							</div>
						</div>
						<script>
							document.addEventListener('DOMContentLoaded', function() {
								var toggleButtons = document.querySelectorAll('.toggle-buttonnn');

								toggleButtons.forEach(function(button) {
									button.addEventListener('click', function() {
										var extraText = document.getElementById("extraTexttt");
										var buttonText = this;

										if (extraText.style.display === "none") {
											extraText.style.display = "block";
											buttonText.textContent = "Nascondi"; // Cambia il testo del pulsante quando il testo extra è visibile
										} else {
											extraText.style.display = "none";
											buttonText.textContent = "Leggi Altro"; // Cambia il testo del pulsante quando il testo extra è nascosto
										}
									});
								});
							});
						</script>
                        <div class="col-md-3 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<img src="assets/images/Dipendenti/Armanda.jpeg" alt="Foto Barbara" style="border-radius: 50%;">
								</div>
								<h2><a href="#">Armanda Offredi</a></h2>
								<p>
									La migliore amica del cliente
								</p>
								<p id="extraTextttt" style="display: none;">La grande e mitica Arma di Taggia</p>
								<button class="welcome-hero-btn how-work-btn toggle-buttonnnn">
									Leggi Altro
								</button>
							</div>
						</div>
						<script>
							document.addEventListener('DOMContentLoaded', function() {
								var toggleButtons = document.querySelectorAll('.toggle-buttonnnn');

								toggleButtons.forEach(function(button) {
									button.addEventListener('click', function() {
										var extraText = document.getElementById("extraTextttt");
										var buttonText = this;

										if (extraText.style.display === "none") {
											extraText.style.display = "block";
											buttonText.textContent = "Nascondi"; // Cambia il testo del pulsante quando il testo extra è visibile
										} else {
											extraText.style.display = "none";
											buttonText.textContent = "Leggi Altro"; // Cambia il testo del pulsante quando il testo extra è nascosto
										}
									});
								});
							});
						</script>
					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.works-->
		<!--works end -->

		<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>esplora</h2>
					<p>Esplora i prodotti più venduti per ogni categoria</p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row">
						<div class=" col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/e1.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">best rated</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-1">
									<h2><a href="#">tommy helfinger bar</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">5.0</span>
										<a href="#"> 10 ratings</a> 
										<span class="explore-price-box">
											form
											<span class="explore-price">5$-300$</span>
										</span>
										 <a href="#">resturent</a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/person.png" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='#'">close now</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/e2.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">featured</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-2">
									<h2><a href="#">swim and dine resort</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">4.5</span>
										<a href="#"> 8 ratings</a> 
										<span class="explore-price-box">
											form
											<span class="explore-price">50$-500$</span>
										</span>
										 <a href="#">hotel</a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/person.png" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn open-btn" onclick="window.location.href='#'">open now</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/e3.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">best rated</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-3">
									<h2><a href="#">europe tour</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">5.0</span>
										<a href="#"> 15 ratings</a> 
										<span class="explore-price-box">
											form
											<span class="explore-price">5k$-10k$</span>
										</span>
										 <a href="#">destination</a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/person.png" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='#'">close now</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class=" col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/e4.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">most view</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-4">
									<h2><a href="#">banglow with swiming pool</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">5.0</span>
										<a href="#"> 10 ratings</a> 
										<span class="explore-price-box">
											form
											<span class="explore-price">10k$-15k$</span>
										</span>
										 <a href="#">real estate</a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/person.png" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='#'">close now</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/e5.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">featured</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-2">
									<h2><a href="#">vintage car expo</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">4.2</span>
										<a href="#"> 8 ratings</a> 
										<span class="explore-price-box">
											form
											<span class="explore-price">500$-1200$</span>
										</span>
										 <a href="#">automotion</a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/person.png" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn open-btn" onclick="window.location.href='#'">open now</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/e6.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">best rated</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-5">
									<h2><a href="#">thailand tour</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">5.0</span>
										<a href="#"> 15 ratings</a> 
										<span class="explore-price-box">
											form
											<span class="explore-price">5k$-10k$</span>
										</span>
										 <a href="#">destination</a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/person.png" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='#'">close now</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.explore-->
		<!--explore end -->

        <!--orari start -->
		

		<?php include 'assets/php/orari.php' ?>
        
        
        
		<!--orari end -->

		<!--reviews start -->
		<section id="reviews" class="reviews">
			<div class="section-header">
				<h2>Recensioni clienti</h2>
				<p>Cosa dicono i clienti riguardo al nostro servizio</p>
			</div><!--/.section-header-->
			<div class="reviews-content">
				<div class="testimonial-carousel">
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c1.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c2.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>monirul islam</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c3.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Shohrab Hossain</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c4.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c1.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c2.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>monirul islam</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c3.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Shohrab Hossain</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c4.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				</div>
			</div>

		</section><!--/.reviews-->
		<!--reviews end -->


        

		<!-- statistics start -->
		<section id="statistics"  class="statistics">
			<div class="container">
				<div class="statistics-counter"> 
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">90 </div> <span>K+</span>
							</div><!--/.statistics-content-->
							<h3>listings</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">40</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>listing categories</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">65</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>visitors</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">50</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>happy clients</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
				</div><!--/.statistics-counter-->	
			</div><!--/.container-->

		</section><!--/.counter-->	
		<!-- statistics end -->

		

		<!--subscription strat -->
		<section id="contact"  class="subscription">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						vuoi essere sempre aggiornato sulle offerte?
					</h2>
					<p>
						Permetti l'invio di email promozionali ogni qualvolta ci siano sconti nuovi al catalogo
					</p>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="subscription-input-group">
							<form action="#">
								<input type="email" class="subscription-input-form" placeholder="Inserisci qui l'email">
								<button class="appsLand-btn subscribe-btn" onclick="window.location.href='#'">
									crea l'account
								</button>
							</form>
						</div>
					</div>	
				</div>
			</div>

		</section><!--/subscription-->	
		<!--subscription end -->

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="index.html">B<span>D</span>G</a>
				            </div><!--/.navbar-header-->
			           	</div>
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
			                    <li class=" scroll active"><a href="#home">home</a></li>
			                    <li class="scroll"><a href="#works">chi siamo</a></li>
			                    <li class="scroll"><a href="#explore">esplora</a></li>
                                <li class="scroll"><a href="#blog">Orari</a></li>
			                    <li class="scroll"><a href="#reviews">recensioni</a></li>
			                    <li class="scroll"><a href="#contact">contatti</a></li>
			                </ul><!--/.nav -->
			           	</div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							<p>
								&copy;copyright. designed and developed by Thomas Vita</a>
							</p><!--/p-->
						</div>
						<div class="col-sm-7">
							<div class="footer-social">
								<span><i class="fa fa-phone"> +39 0345 90079</i></span>
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
					
				</div><!--/.hm-footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

        <!--feather.min.js-->
        <script  src="assets/js/feather.min.js"></script>

        <!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>

        <!--slick.min.js-->
        <script src="assets/js/slick.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		     
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
    </body>
	
</html>