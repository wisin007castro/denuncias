 @extends('layouts.auth')
  
@section('content')

  <body class="mybody">      
    <div class="mytop-content" >
        <div class="container" > 
          
          @include('layouts.partials.form_navbar')
                   {{-- <a class="mybtn-social pull-right" href="{{ url('/register') }}">
                       Register
                  </a> --}}

                  <a class="mybtn-social pull-right" href="{{ url('form_registro') }}">
                    Español
                  </a>
               
                </div>
            
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                
                @include('layouts.partials.form_top')
                
                  <div class="col-md-12" >
                    <br>
                    @if (count($errors) > 0)
                     
                        <div class="alert alert-danger">
                            <strong>UPPS!</strong> Registry error<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    
                    @endif
                   </div>

                    <div class="myform-bottom">
                      
                      <form role="form" action="{{ url('/registro_denuncia') }}" method="post" class="" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="idioma" value="en">
                      
                        <label for="" class="">DATA OF COMPLAINANT</label>
                        <div class="form-group">
                          <label for="" class="pull-left">First name (*) :</label>
                            <input type="text" name="nombre" placeholder="" class="form-control" value="{{ old('nombre') }}" >
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Surnames(*) :</label>
                            <input type="text" name="apellidos" placeholder="" class="form-control" value="{{ old('apellidos') }}" >
                        </div>
                    
                        <div class="form-group">
                          <label for="" class="pull-left">Identity Card or Passport Number (*) :</label>
                            <input type="text" class="form-control" id="ci" name="ci" placeholder=""  value="{{ old('ci') }}" >
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Address :</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder=""  value="{{ old('direccion') }}" >
                        </div>
                     
                        <div class="form-group">
                          <label for="" class="pull-left">Email (*) :</label>
                            <input type="text" name="email" placeholder="" class="form-control"  
                            value="{{ old('email') }}" />
                        </div>
                        
                        <div class="form-group">
                          <label for="" class="pull-left">Complainant's Residence :</label>
                          <select class="form-control" name="dpto_denunciante" id="">
                            <option value="" selected>Choose an option</option>
                              @foreach ($departamentos as $dpto)
                              <option value="{{$dpto->departamento}}" {{ old('dpto_denunciante') == $dpto->departamento ? 'selected' : '' }}>{{$dpto->departamento}}</option>
                              @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Phone (*) :</label>
                            <input type="text" name="telefono" placeholder="" class="form-control"  
                            value="{{ old('telefono') }}" />
                        </div>

                        <label for="" class="">INFORMATION OF THE REPORTED</label>
                        
                        <div class="form-group">
                          <label for="" class="pull-left">Type of Company (*) :</label>
                          <select class="form-control" name="tipo_empresa" id="">
                            <option value="" selected>Choose an option</option>
                              @foreach ($tipo_empresas as $tipo)
                              <option value="{{$tipo->type}}" {{ old('tipo_empresa') == $tipo->type ? 'selected' : '' }}>{{$tipo->type}}</option>
                              @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Link to the tourism company on how the purchase was offered :</label>
                            <input type="text" name="link_oferta" placeholder="" class="form-control"  
                            value="{{ old('link_oferta') }}" />
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Business Name (*) :</label>
                            <input type="text" name="razon_social" placeholder="" class="form-control"  
                            value="{{ old('razon_social') }}" />
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">NIT / Tributary Id. Number :</label>
                            <input type="number" name="nit" placeholder="" class="form-control"  
                            value="{{ old('nit') }}" />
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Phone :</label>
                            <input type="text" name="telefono_reportado" placeholder="" class="form-control"  
                            value="{{ old('telefono_reportado') }}" />
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Address where the product was purchased :</label>
                            <input type="text" name="dir_compra" placeholder="" class="form-control"  
                            value="{{ old('dir_compra') }}" />
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">City or Place of the incident (*) :</label>
                          <select class="form-control" name="dpto_hecho" id="dpto_hecho">
                            <option value="" selected>Choose an option</option>
                              @foreach ($departamentos as $dpto)
                              <option value="{{$dpto->departamento}}" {{ old('dpto_hecho') == $dpto->departamento ? 'selected' : '' }}>{{$dpto->departamento}}</option>
                              @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Specific location :</label>
                            <input type="text" name="lugar_especifico" placeholder="" class="form-control"  
                            value="{{ old('lugar_especifico') }}" />
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Name of the Reported service provider :</label>
                            <input type="text" name="nombre_reportado" placeholder="" class="form-control"  
                            value="{{ old('nombre_reportado') }}" />
                        </div>

                        <div class="form-group">
                          <label for="" class="pull-left">Description of the Reported Fact (*) :</label>
                            <input type="text" name="decripcion" placeholder="" class="form-control"  
                            value="{{ old('decripcion') }}" />
                        </div>
                        <br>
                        <div class="form-group" align="left">
                          <blockquote class="pull-left">
                            <p class="">Documentation attached as evidence, with audio or video photograph (no more than 30 sec)</p>
                            {{-- <small>Someone famous in <cite title="Source Title">Source Title</cite></small> --}}
                          </blockquote>
                        </div>
                        <div class="form-group">
                          <input name="archivo" id="archivo" type="file" class=">
                        </div>
                        <div class="form-group" align="left">
                          <blockquote>
                            <p class="">This form does not exclude the possibility of the complainant to formalize the facts reported to other competent authority   to attach documentary evidence to confirm the fact.</p>
                            <small class="text-white">The purpose of this complaint form is to receive accusations regarding illegal tourist activities in the Bolivian territory, in the case from mistreatment or non-compliance to service offered by tourism service providers.</small>
                          </blockquote>
                        </div>

                        <div class="form-group">
                         {!! Recaptcha::render() !!}
                        </div>

                        <button type="submit" class="mybtn">Enviar</button>
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


