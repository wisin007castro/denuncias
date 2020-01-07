 @extends('layouts.auth')
  
@section('content')

  <body class="mybody">      
    <div class="mytop-content" >
        <div class="container" > 
          
                  @include('layouts.partials.form_navbar')
                   {{-- <a class="mybtn-social pull-right" href="{{ url('/register') }}">
                       Register
                  </a> --}}

                  <a class="mybtn-social pull-right" href="{{ url('/form_register') }}">
                    English&nbsp;
                  </a>
               
                </div>
            
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                      
      
                      @include('layouts.partials.form_top')
      
                        <div class="col-md-12" >
                          <br>
                          @if (count($errors) > 0)
                           
                              <div class="alert alert-danger">
                                  <strong>UPPS!</strong> Error al registrar<br>
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          
                          @endif
                         </div  >
      
                          <div class="myform-bottom">
                            
                            <form role="form" action="{{ url('/registro_denuncia') }}" method="post" class="" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="idioma" value="es">
                              <label for="" class="">DATOS DEL DENUNCIANTE</label>
                              <div class="form-group">
                                <label for="" class="pull-left">Nombres (*) :</label>
                                  <input type="text" name="nombre" placeholder="" class="form-control" value="{{ old('nombre') }}" >
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Apellidos (*) :</label>
                                  <input type="text" name="apellidos" placeholder="" class="form-control" value="{{ old('apellidos') }}" >
                              </div>
                          
                              <div class="form-group">
                                <label for="" class="pull-left">Carnet o Pasaporte (*) :</label>
                                  <input type="text" class="form-control" id="ci" name="ci" placeholder=""  value="{{ old('ci') }}" >
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Dirección :</label>
                                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder=""  value="{{ old('direccion') }}" >
                              </div>
                           
                              <div class="form-group">
                                <label for="" class="pull-left">Correo Electrónico (*) :</label>
                                  <input type="text" name="email" placeholder="" class="form-control"  
                                  value="{{ old('email') }}" />
                              </div>
                              
                              <div class="form-group">
                                <label for="" class="pull-left">Lugar de residencia :</label>
                                <select class="form-control" name="dpto_denunciante" id="dpto_denunciante">
                                  <option value="" selected>Elija una opción</option>
                                    @foreach ($departamentos as $dpto)
                                        {{-- <option value="{{$dpto->departamento}}" {{ old('dpto_denunciante', $dpto->departamento) == $dpto->departamento ? 'selected' : '' }}>{{$dpto->departamento}}</option> --}}
                                        <option value="{{$dpto->departamento}}" {{ old('dpto_denunciante') == $dpto->departamento ? 'selected' : '' }}>{{$dpto->departamento}}</option>
                                    @endforeach
                                </select>
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Teléfono (*) :</label>
                                  <input type="text" name="telefono" placeholder="" class="form-control"  
                                  value="{{ old('telefono') }}" />
                              </div>
      
                              <hr>
                              <label for="" class="">DATOS DEL DENUNCIADO</label>
                              
                              <div class="form-group">
                                <label for="" class="pull-left">Tipo de Empresa (*) :</label>
                                <select class="form-control" name="tipo_empresa" id="">
                                  <option value="" selected>Elija una opción</option>
                                    @foreach ($tipo_empresas as $tipo)
                                      <option value="{{$tipo->type}}" {{ old('tipo_empresa') == $tipo->type ? 'selected' : '' }}>{{$tipo->type}}</option>                                     
                                    @endforeach
                                </select>
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Link de la oferta denunciada :</label>
                                  <input type="text" name="link_oferta" placeholder="" class="form-control"  
                                  value="{{ old('link_oferta') }}" />
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Razón social o nombre (*) :</label>
                                  <input type="text" name="razon_social" placeholder="" class="form-control"  
                                  value="{{ old('razon_social') }}" />
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">NIT :</label>
                                  <input type="number" name="nit" placeholder="" class="form-control"  
                                  value="{{ old('nit') }}" />
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Teléfono :</label>
                                  <input type="text" name="telefono_reportado" placeholder="" class="form-control"  
                                  value="{{ old('telefono_reportado') }}" />
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Dirección donde se compró el producto :</label>
                                  <input type="text" name="dir_compra" placeholder="" class="form-control"  
                                  value="{{ old('dir_compra') }}" />
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Ciudad o lugar del hecho (*) :</label>
                                <select class="form-control" name="dpto_hecho" id="dpto_hecho">
                                  <option value="" selected>Elija una opción</option>
                                    @foreach ($departamentos as $dpto)
                                    <option value="{{$dpto->departamento}}" {{ old('dpto_hecho') == $dpto->departamento ? 'selected' : '' }}>{{$dpto->departamento}}</option>
                                    @endforeach
                                </select>
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Localizacón específica :</label>
                                  <input type="text" name="lugar_especifico" placeholder="" class="form-control"  
                                  value="{{ old('lugar_especifico') }}" />
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Nombre del denunciado :</label>
                                  <input type="text" name="nombre_reportado" placeholder="" class="form-control"  
                                  value="{{ old('nombre_reportado') }}" />
                              </div>
      
                              <div class="form-group">
                                <label for="" class="pull-left">Descripción del hecho denunciado (*) :</label>
                                  <input type="text" name="decripcion" placeholder="" class="form-control"  
                                  value="{{ old('decripcion') }}" />
                              </div>
                              <br>
                              <div class="form-group" align="left">
                                <blockquote class="">
                                  <p class="">Documnetación adjunta como evidencia, cuenta con fotografía audio o video (no más de 30 seg)</p>
                                </blockquote>
                              </div>
                              <div class="form-group">
                                <input name="archivo" id="archivo" type="file" class="" />
                              </div>
                              <div class="form-group">
                                <blockquote>
                                  <p class="">El denunciante podrá formalizar los hechos denunciados ante la autoridad competente en turismo adjuntando prueba documental que permita confirmar el hecho..</p>
                                  <small class="text-white">El presente formulario de denuncias tiene la finalidad de recibir acusaciones referentes a actividades turísticas ilegales en el territorio Boliviano, a su vez de malos tratos o incumplimiento de servicios por parte de prestadores de servicios turísticos. </small>
                                </blockquote>
                              </div>
      
                              <div class="form-group">
                               {!! Recaptcha::render() !!}
                              </div>
      
                              <button type="submit" class="mybtn">Send</button>
                            </form>
                          
                          </div>
                    </div>
                  </div>
                  {{-- <div class="row">
                      <div class="col-sm-12 mysocial-login">
                          <h3>...Visitanos en nuestra Pagina</h3>
                          <h1><strong>minculturas.gob.bo</strong>.net</h1>
                      </div>
                  </div> --}}
              </div>
            </div>
       
       </body>
      @endsection
      