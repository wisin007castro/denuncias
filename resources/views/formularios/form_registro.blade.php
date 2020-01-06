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
                              <label for="" class="text-white">Datos del denunciante</label>
                              <div class="form-group">
                                  <input type="text" name="nombre" placeholder="Nombres *" class="form-control" value="{{ old('nombre') }}" >
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="apellidos" placeholder="Apellidos *" class="form-control" value="{{ old('apellidos') }}" >
                              </div>
                          
                              <div class="form-group">
                                  <input type="text" class="form-control" id="ci" name="ci" placeholder="Carnet o Pasaporte *"  value="{{ old('ci') }}" >
                              </div>
      
                              <div class="form-group">
                                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección"  value="{{ old('direccion') }}" >
                              </div>
                           
                              <div class="form-group">
                                  <input type="text" name="email" placeholder="Correo Electrónico *" class="form-control"  
                                  value="{{ old('email') }}" />
                              </div>
                              
                              <div class="form-group">
                                <select class="form-control" name="dpto_denunciante" id="">
                                  <option value="" selected>Lugar de residencia</option>
                                    @foreach ($departamentos as $dpto)
                                        <option value="{{$dpto->departamento}}" {{ old('dpto_denunciante', $dpto->departamento) == $dpto->departamento ? 'selected' : '' }}>{{$dpto->departamento}}</option>
                                    @endforeach
                                </select>
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="telefono" placeholder="Teléfono *" class="form-control"  
                                  value="{{ old('telefono') }}" />
                              </div>
      
                              <label for="" class="text-white">Datos del denunciado</label>
                              
                              <div class="form-group">
                                <select class="form-control" name="tipo_empresa" id="">
                                  <option value="" selected>Tipo de Empresa *</option>
                                    @foreach ($tipo_empresas as $tipo)
                                      <option value="{{$tipo->type}}" {{ old('tipo_empresa', $tipo->type) == $tipo->type ? 'selected' : '' }}>{{$tipo->type}}</option>
                                    @endforeach
                                </select>
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="link_oferta" placeholder="Link de la oferta realizada" class="form-control"  
                                  value="{{ old('link_oferta') }}" />
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="razon_social" placeholder="Razón social o nombre *" class="form-control"  
                                  value="{{ old('razon_social') }}" />
                              </div>
      
                              <div class="form-group">
                                  <input type="number" name="nit" placeholder="NIT" class="form-control"  
                                  value="{{ old('nit') }}" />
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="telefono_reportado" placeholder="Teléfono" class="form-control"  
                                  value="{{ old('telefono_reportado') }}" />
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="dir_compra" placeholder="Dirección donde se compró el producto" class="form-control"  
                                  value="{{ old('dir_compra') }}" />
                              </div>
      
                              <div class="form-group">
                                <select class="form-control" name="dpto_hecho" id="dpto_hecho">
                                  <option value="" selected>Ciudad o lugar del hecho *</option>
                                    @foreach ($departamentos as $dpto)
                                      <option value="{{$dpto->departamento}}" {{ old('dpto_hecho', $dpto->departamento) == $dpto->departamento ? 'selected' : '' }}>{{$dpto->departamento}}</option>
                                    @endforeach
                                </select>
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="lugar_especifico" placeholder="Localizacón específica" class="form-control"  
                                  value="{{ old('lugar_especifico') }}" />
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="nombre_reportado" placeholder="Nombre del denunciado" class="form-control"  
                                  value="{{ old('nombre_reportado') }}" />
                              </div>
      
                              <div class="form-group">
                                  <input type="text" name="decripcion" placeholder="Descripción del hecho denunciado *" class="form-control"  
                                  value="{{ old('decripcion') }}" />
                              </div>
                              <br>
                              <div class="form-group" align="left">
                                <blockquote class="">
                                  <p class="text-white">Documnetación adjunta como evidencia, cuenta con fotografía audio o video (no más de 30 seg)</p>
                                </blockquote>
                              </div>
                              <div class="form-group">
                                <input name="archivo" id="archivo" type="file" class="text-white" />
                              </div>
                              <div class="form-group">
                                <blockquote>
                                  <p class="text-white">El denunciante podrá formalizar los hechos denunciados ante la autoridad competente en turismo adjuntando prueba documental que permita confirmar el hecho..</p>
                                  <small class="text-white">El presente formulario de denuncias tiene la finalidad de recibir acusaciones referentes a actividades turísticas ilegales en el territorio Boliviano, a su vez de malos tratos o incumplimiento de servicios por parte de prestadores de servicios turísticos. </small>
                                </blockquote>
                              </div>
      {{-- 
                              <div class="form-group">
                               {!! Recaptcha::render() !!}
                              </div> --}}
      
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
      