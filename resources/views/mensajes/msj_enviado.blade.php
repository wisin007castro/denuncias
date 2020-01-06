@extends('layouts.auth')

<div class="box box-success col-xs-12">


<div class='aprobado' style="margin-top:70px; text-align: center">
  <span class="label label-success">Realizado <i class="fa fa-check"></i></span><br/>
  <label style='color:#177F6B'>
    Formulario enviado correctamente
  </label> 

</div>

 <div class="margin" style="margin-top:50px; text-align:center;margin-bottom: 50px;">
    <div class="btn-group">
        @if ($msj == 'enviado_denuncia')
        <div class="row">
          <div class="col-md-6">
            <a href="{{ url('http://www.minculturas.gob.bo/') }}" class="btn btn-success"    value=""  > Salir</a>
          </div>
          <div class="col-md-6">
            <a href="{{ url('/form_registro') }}" class="btn btn-success"    value=""  > Nuevo</a>
          </div>
        </div>
        @endif
     
    </div>
    {{-- <div class="btn-group" style="margin-left:50px; " >
      <a href="{{ url('http://www.minculturas.gob.bo/') }}" class="btn btn-info"    value=" "  > Salir </a>
    </div> --}}
 </div> 


 

 </div> 

