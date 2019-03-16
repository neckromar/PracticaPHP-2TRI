@extends('layouts.app2')
@section('title','Configuracion de perfil')
@section('content')


<div class="pricing-plan-section" >
    <div class="row justify-content-center configuracion">
        <div class="col-md-8 ">
            @include('includes.message')
            <div class="card">
                <div class="card-header"> <p class="centrado">  Configuración de mi cuenta </p> </div>

                <div class="card-body ">

                    @if($perfil != null)
                    <form method="POST"   action="{{ route('user.updateotro') }}" enctype="multipart/form-data">
                        @else 
                        <form method="POST"   action="{{  route('user.update') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                @if($perfil != null )
                                <input hidden type="number" name='id' value="{{ $perfil->id }}">
                                @endif

                                <div class="col-md-6">
                                    @if($perfil != null )
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} " name="name" value="{{ $perfil->name }}" required autofocus>
                                    @else
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>
                                    @endif
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __(' First Surname') }}</label>

                                <div class="col-md-6">
                                    @if($perfil != null)
                                    <input id="email" type="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $perfil->surname }}" required>
                                    @else
                                    <input id="email" type="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ Auth::user()->surname }}" required>
                                    @endif
                                    @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname2" class="col-md-4 col-form-label text-md-right">{{ __('Second Surname') }}</label>

                                <div class="col-md-6">
                                    @if($perfil != null)
                                    <input id="surname2" type="surname2" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}" name="surname2" value="{{ $perfil->surname2 }}" >
                                    @else
                                    <input id="surname2" type="surname2" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}" name="surname2" value="{{ Auth::user()->surname2 }}" >
                                    @endif
                                    @if ($errors->has('surname2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="col-md-6">

                                    @if($perfil != null)
                                    <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ $perfil->telefono }}" required autofocus>
                                    @else
                                    <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ Auth::user()->telefono }}" required autofocus>
                                    @endif


                                    @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!--                            <p id="familiaprofesional" >
                                Quiere añadir una familia profesional de GRADO MEDIO, pulseme?
                            </p>
                             <p id="familiaprofesionalsuperior" >
                                Quiere añadir una familia profesional de GRADO SUPERIOR, pulseme?
                            </p>
                            
                         
                            
                            
                            <div class="form-group row" hidden id="selectfamilia" ng-controller="myCtrl">
                                
                                <label for="profesional" class="col-md-4 col-form-label text-md-right">{{ __('Familia Profesional Grado Medio') }}</label>

                                <div class="col-md-6">
                                      <input name="gradomedio" hidden>
                                      
                                     <select name="selectgrados" ng-change="change()" ng-model="familia">
                                        <option value="informatica">F.P. Informatica</option>
                                        <option value="administracion">F.P. Administración y Finanzas</option>
                                    </select>
                                    
                                    <select name="curso" ng-show="gradosMediosInformatica()">
                                        <option value="asir">ASIR</option>
                                        <option value="smr">SMR</option>
                                    </select>
                                    
                                    <select name="curso" ng-show="gradosMediosAdministracion()">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    
                                </div>
                            </div>
                            
                            
                            
                             <div class="form-group row" hidden id="selectfamiliasuperior" ng-controller="myCtrl">
                                
                                <label for="profesional" class="col-md-4 col-form-label text-md-right">{{ __('Familia Profesional Grado Superior') }}</label>

                                <div class="col-md-6">
                                    <input name="gradosuperior" hidden>
                                    
                                     <select name="selectgrados" ng-change="change()" ng-model="familia">
                                        <option value="informatica">F.P. Informatica</option>
                                        <option value="administracion">F.P. Administración y Finanzas</option>
                                    </select>
                                    
                                    <select name="curso" ng-show="gradosSuperiorInformatica()">
                                        <option value="asir">DAW</option>
                                        <option value="smr">DAM</option>
                                    </select>
                                    
                                    <select name="curso" ng-show="gradosSuperiorAdministracion()">
                                        <option value="1">3</option>
                                        <option value="2">4</option>
                                    </select>
                                   
                                </div>
                            </div>
                            
                             <script>
                             var app = angular.module('myApp', []);
                                app.controller('myCtrl', function($scope) {
                                
                                $scope.familia;
                             

                                $scope.gradosMediosInformatica = function() {
                                return $scope.familia == "informatica";
                                }

                                $scope.gradosMediosAdministracion = function() {
                                return $scope.familia == "administracion";
                                }




                                });
                            </script>-->
                            

                            @if($perfil != null)
                            @else
                            <div class="form-group row">
                                <label for="paginaweb" class="col-md-4 col-form-label text-md-right">{{ __('Web Page') }}</label>

                                <div class="col-md-6">
                                    @if($perfil != null)

                                    @else
                                    <input id="paginaweb" type="paginaweb" class="form-control{{ $errors->has('paginaweb') ? ' is-invalid' : '' }}" name="paginaweb" value="{{ Auth::user()->paginaweb }}" >
                                    @endif
                                    @if ($errors->has('paginaweb'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('paginaweb') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             @endif
                            
                            @if($perfil != null)
                            @else
                            <div class="form-group row">
                                <label for="github" class="col-md-4 col-form-label text-md-right">{{ __('GitHub') }}</label>

                                <div class="col-md-6">

                                    <input id="github" type="github" class="form-control{{ $errors->has('github') ? ' is-invalid' : '' }}" name="github" value="{{ Auth::user()->github }}" >

                                    @if ($errors->has('github'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('github') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif


                            @if($perfil != null)
                            <div class="form-group row">
                                <label for="poder" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control{{ $errors->has('poder') ? ' is-invalid' : '' }}" name="poder" value="{{ $perfil->poder }}" required autofocus>

                                    @if ($errors->has('poder'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('poder') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            @endif





                            @if($perfil != null)
                            @else
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">

                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>



                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif

                            @if($perfil)
                            @else
                            <div class="form-group row">

                                <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                                <div class="col-md-6">


                                    @include('includes.avatar')

                                    <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" value="Ingrese foto" />

                                    @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            @endif

                            @if($perfil != null )
                            <div class="form-group row">

                                <label for="activo" class="col-md-4 col-form-label text-md-right">{{ __('Activo?') }}</label>

                                <div class="col-md-6">

                                    <input id="activo" type="text" class="form-control{{ $errors->has('activo') ? ' is-invalid' : '' }}" name="activo" value="{{$perfil ->activo}}" />

                                    @if ($errors->has('activo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('activo') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            @endif


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 alinear">

                                    <button type="submit" class="btn btn-simple btn-primary btn-lg"> Guardar Cambios <i class="material-icons">fingerprint</i></button> 


                                </div>

                            </div>

                            @if($perfil != null)
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 alinear">
                                    <a type="button" class="btn btn-simple btn-success btn-lg" href="{{route('profile',['id' => $perfil ->id ])}}" > Ir al perfil de {{$perfil->name}}</a> 
                                </div>
                            </div>
                            @endif
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection