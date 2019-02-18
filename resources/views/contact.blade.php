<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<!-- Internet Explorer -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Contenido adaptable -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Pets - La comunidad más grande de adopción</title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

		<!-- Vendor Styles -->

		<link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.css')}}">
		<link rel="stylesheet" href="{{asset('vendor/Camera-master/css/camera.css')}}">
		<link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.theme.css')}}">
		<link rel="stylesheet" href="{{asset('vendor/WOW-master/css/libs/animate.css')}}">
		<link rel="stylesheet" href="{{asset('vendor/fancybox/dist/jquery.fancybox.min.css')}}">


		<!-- Style -->
		<link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('fonts/icon/font/font/flaticon.css')}}">
		<link rel="stylesheet" href="{{asset('fonts/icon/font/2/flaticon.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
	</head>


	<body>
	<div class="main-page-wrapper home-page-two">
			<div class="html-top-content">

				 <!-- Menú -->
                <header class="theme-main-header contact">
                    <div class="container">
                        <div class="menu-wrapper clearfix ">
                            <div class="logo float-left"><a href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" alt="Logo"></a></div>

                            <ul class="button-group float-right">
                                <li>
                                    <a href="{{route('index')}}" >
                                        <i class="material-icons">home</i> Inicio
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">
                                        <i class="material-icons">contact_mail</i> Contacto
                                    </a>
                                </li>	
                                
                                @guest
                                <li>
                                    <a href="{{route('login')}}" >
                                        <i class="material-icons">fingerprint</i> Ingresar
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('register')}}" >
                                        <i class="material-icons">person_add</i> Registrarse
                                    </a>
                                </li>
                                @else
                                <li>
                                    <!--<a href="{{route('login')}}" > -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i> Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                        @csrf
                                    </form>

                                    </a>
                                </li>
                                @endguest

                            </ul>						
                        </div> 
                    </div> 
                </header> 
                <!-- /Menú  -->

				<div style="padding-top: 300px;">
					<div class="what-we-do bg">
						<div class="container">
							<!--Título-->
							<div class="theme-title-one text-center">
								<h2>¡Genial, gracias por querer contactarnos!</h2>
								<a href="#"><h5>También puedes donar para comprar comida <i class="material-icons">shopping_basket</i> <i class="material-icons">local_dining</i></h5></a>
							</div> <!-- /Título -->
							<div style="padding-top: 100px;">

							<!--Sección del formulario-->
							<div class="contact-us-section">
								<div class="container">
									<div class="row">
										<div class="col-xs-12">
											<form action="#" class="contact-us-form form-validation" auto-complete="off">
												<label>Nombre completo</label>
												<input type="text" name="name">
												<label>Correo electrónico</label>
												<input type="email" name="email">
												<label>Asunto</label>
												<input type="text" name="subject">
												<label>Mensaje</label>
												<textarea  name="message"></textarea>
												<div class="theme-button">
													<span></span>
													<input type="submit" value="Enviar">
												</div>
											</form>

											<div style="padding-top: 100px;"></div>

											<!-- Mapa -->
											<div class="col-xs-12">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15863.815616359221!2d-75.57430178033222!3d6.269792777390103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTYnMTEuMyJOIDc1wrAzMyc1Ni4wIlc!5e0!3m2!1ses!2sco!4v1525223313196" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
											</div>
											<!-- /Mapa -->
											<div style="padding-top: 100px;">
											</div> 
										</div> 
									</div>
									<!--/Sección del formulario-->
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	
		@include('includes.footer')
	</body>
</html>