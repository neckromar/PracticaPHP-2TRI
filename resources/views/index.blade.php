@extends('app')
@section('title','La comunidad mas grande de adoption')

@section('content')

<!-- Slider -->
<div id="theme-main-banner" class="banner-two gradient-banner">
    <div data-src="{{asset('images/home/espacio.jpg')}}">
        <div class="camera_caption">
            <div class="main-container">
                <div class="container">

                    <div class="image-wrapper wow fadeInUp animated" data-wow-delay="0.75s">
                        <img src="" width="200%" alt="">
                    </div>

                    <h1 class="wow fadeInUp animated">Estar en contacto <br>siempre ayuda.</h1>

                    <p class="wow fadeInUp animated"><p class="wow fadeInUp animated">Unete de manera gratuita  a nuestra plataforma<br> de antiguos alumnos. <strong>¡Unidos venceremos!</strong></p>

                    <!--
                    <div class="center">
                        <a href="course-2-column.html" class="tran3s wow fadeInLeft animated button-one" data-wow-delay="0.499s"><i class="fa fa-apple" aria-hidden="true"></i>App Store</a>
                        <a href="course-2-column.html" class="tran3s wow fadeInRight animated button-two" data-wow-delay="0.499s"><img src="images/icon/2.png" alt="">GooglePlay</a>			
                    </div>
                    -->
                    <div class="image-wrapper wow fadeInUp animated" data-wow-delay="0.75s">
                        <img src="{{asset('images/home/principal.jpg')}}" alt="">
                    </div>
                </div>
            </div> 
        </div> 
    </div>

</div> 
<!-- /Slider -->


<!-- About -->
<div class="what-we-do bg" style="padding-bottom: 30px;">
    <div class="container">
        <div class="theme-title-one text-center"> 
            <h2>¿Para qué registrarte en <br>esta aplicación?</h2>
        </div> 

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
                <div class="single-block tran3s">
                    <img src="{{asset('images/icon/deal.svg')}}" style="width: 40%;" alt="" class="tran4s">
                    <h6>Acuerdos entre empresa e instituto</h6>
                    <p>Siempre hay colaboraciones<br> entre las dos partes.</p>
                </div> 
            </div> 
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="single-block tran3s">
                    <img src="{{asset('images/icon/graduates.svg')}}" style="width: 40%;" alt="" class="tran4s">
                    <h6>Ofertas de trabajo para el ex-alumnado</h6>
                    <p>El profesor que haya sido informado <br> de una oferta pondrá su publicacion.</p>
                </div> 
            </div> 
            <div class="col-md-4 hidden-sm col-xs-12 wow fadeInUp" data-wow-delay="0.150s">
                <div class="single-block tran3s">
                    <img src="{{asset('images/icon/recommended.svg')}}" style="width: 40%;" alt="" class="tran4s">
                    <h6>Mejores ofertas de trabajo por recomendacion</h6>
                    <p>El profesorado recomendará un/os <br> alumno/s para ese puesto de trabajo</p>
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
<!-- /About -->

<!-- Feature -->
<div class="advance-feature">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 wow fadeInRight">
                <div class="feature-warpper">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="destacado fondo_uno voltear">
                                <i class="flaticon-communication"></i>
                                <h5>Comunicacion</h5>
                                <p>Estarás en constante contacto. </p>
                            </div>
                            <div class="destacado fondo_dos voltear">
                                <i class="flaticon-communication"></i>
                                <h5>Trabajo en equipo</h5>
                                <p>Ayudas entre <br>alumnado. </p>
                            </div>
                        </div>
                        
                        <div class="col-xs-6">
                            <div class="destacado fondo_tres voltear">
                                <i class="flaticon-medical"></i>
                                <h5>Nos preocupamos</h5>
                                <p>Nos preocupamos por nuestro alumnado. </p>
                            </div>
                            <div class="destacado fondo_cuatro voltear">
                                <i class="flaticon-shield"></i>
                                <h5>Cursos Gratuitos</h5>
                                <p>Se ofreceran cursos gratuitos para seguiros formando. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12 wow fadeInLeft">
                <div class="feature-text">
                    <div class="theme-title-two">
                        <h2>¡Protegelo!</h2>
                        <p>Tu futuro es importante, preocupate por el.</p>
                    </div> <!-- /.theme-title-two -->
                    </div>
            </div> 
        </div> 
    </div> 
</div> 
<!-- /Feature -->

<!-- Blog -->
<div class="our-blog">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-6">
            <div class="single-blog">
                <div class="image"><img src="{{asset('images/blog/laravel.png')}}" style="height: 50%;" alt=""></div>
                <div class="text">
                    <h5><a  href="https://www.udemy.com/curso-de-laravel-5-desde-cero-apis-restful-y-webapps-angular/?couponCode=LARA-ACADEMY" target="_blank" class="tran3s">Curso Laravel por Victor Robles</a></h5>
                    <p>Curso desde nivel principiante a experto en Laravel.</p>
                </div>
            </div> 
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6">
            <div class="single-blog">
                <div class="image"><img src="{{asset('images/blog/js.png')}}" style="height:  370px;" target="_blank" alt=""></div>
                <div class="text">
                    <h5><a href="https://www.udemy.com/master-en-javascript-aprender-js-jquery-angular-nodejs-y-mas/?couponCode=MASTER-ACADEMY" class="tran3s">Master en JavaScript. Victor Robles</a></h5>
                    <p>Aprende a programar desde cero y desarrollo web con JavaScript, jQuery, JSON, TypeScript, Angular, Node, MEAN, +30 horas.</p>
                </div>
            </div> 
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6">
            <div class="single-blog">
                <div class="image"><img src="{{asset('images/blog/pwa.png')}}" style="height:  370px;" target="_blank" alt=""></div>
                <div class="text">
                    <h5><a href="https://www.udemy.com/curso-de-laravel-5-desde-cero-apis-restful-y-webapps-angular/?couponCode=LARA-ACADEMY" class="tran3s">Curso de Apps Web Progresivas PWA y Responsive + Angular PWA</a></h5>
                    <p>Aprende a desarrollar Aplicaciones Web Progresivas (PWA) y a crear sitios web Responsive adaptables a cualquier móvil.</p>
                </div>
            </div>
        </div>
       
    </div> 
   
</div>
<!-- /Blog -->

<div style="padding-bottom: 10px;"></div>
</div> <!-- /.html-top-content -->

@endsection
