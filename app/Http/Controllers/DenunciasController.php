<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use DateTime;
use Illuminate\Support\Facades\Validator;
use App\Denuncia;
use App\Departamento;
use App\Tipo_Empresa;


class DenunciasController extends Controller
{
    public function form_ver_denuncia($id_denuncia){
        $denuncia = Denuncia::find($id_denuncia);
        return view('formularios.form_ver_denuncia')
        ->with('denuncia', $denuncia);
    }

    public function form_register(){
        $direccion = 'General Direction of Control of Tourist Activity';
        $tipo_empresas=Tipo_Empresa::all();
        $departamentos=Departamento::all();
        return view('formularios.form_register')
        ->with("departamentos", $departamentos)
        ->with("tipo_empresas", $tipo_empresas)
        ->with("direccion", $direccion);
    }
    public function form_registro(){
        $direccion = 'Dirección General de Control a la Actividad Turística';
        $tipo_empresas=Tipo_Empresa::all();
        $departamentos=Departamento::all();
        return view('formularios.form_registro')
        ->with("departamentos", $departamentos)
        ->with("tipo_empresas", $tipo_empresas)
        ->with("direccion", $direccion);
    }

    public function registro_denuncia(Request $request){
    //crea un nuevo usuario en el sistema
    $denuncia = new Denuncia;

    $reglas=[  'nombre' => 'required',
        'apellidos' => 'required',
        'ci' => 'required',
        'email' => 'required|email',
        'telefono' => 'required',
        'tipo_empresa' => 'required',
        'razon_social' => 'required',
        'dpto_hecho' => 'required',
        'decripcion' => 'required',
        'archivo'  => 'mimes: pdf,mp4,mov,ogg,wmv,avi,jpg,jpeg,gif,png,application/octet-stream,audio/mpeg,mpga,mp3,wav | max:76800',
        'g-recaptcha-response' => 'required|recaptcha',
    ];
        
    if ($request->input("idioma") == "en") {
        $mensajes=['nombre.required' => 'The name is required',
        'apellidos.required' => 'Last name is required',
        'ci.required' => 'Identity Card or Passport Number is required',
        'email.required' => 'Email is required',
        'telefono.required' => 'Phone is required',
        'tipo_empresa.required' => 'Select a type of company',
        'razon_social.required' => 'Business Name is required',
        'dpto_hecho.required' => 'Select a department or city',
        'decripcion.required' => 'Description is required',
        'archivo.mimes' => 'File must be a formatted file: pdf, mp4, mov, ogg, wmv, avi, jpg, jpeg, gif, png, mpeg, mpga, mp3, wav .',
        'archivo.max' => 'The file exceeds the maximum size allowed (70 MB)',
        'g-recaptcha-response.required' => 'The captcha is required.',
        'g-recaptcha-response.required' => 'The captcha is not correct.'
        ];
    }else{
        $mensajes=['nombre.required' => 'El nombre es obligatorio',
        'apellidos.required' => 'Al menos un apellido es obligatorio',
        'ci.required' => 'El C.I. es obligatorio',
        'email.required' => 'El correo electronico es obligatorio',
        'telefono.required' => 'El telefono es obligatorio',
        'tipo_empresa.required' => 'Selecciona un tipo de Empresa',
        'razon_social.required' => 'La Razón social o nombre es obligatorio',
        'dpto_hecho.required' => 'Selecione un departamento o ciudad del hecho',
        'decripcion.required' => 'La descripción es obligatoria',
        'archivo.mimes' => 'El archivo debe ser un archivo con formato: pdf, mp4, mov, ogg, wmv, avi, jpg, jpeg, gif, png, mpeg, mpga, mp3, wav .',
        'archivo.max' => 'El archivo supera el tamaño máximo permitido (70 MB)',
        'g-recaptcha-response.required' => 'El captcha es obligatorio.',
        'g-recaptcha-response.recaptcha' => 'El captcha no es correcto.'
        ];
    }

    $validator = Validator::make( $request->all(),$reglas,$mensajes );
    if( $validator->fails() ){ 
        $direccion = 'General Direction of Control of Tourist Activity';
        $tipo_empresas=Tipo_Empresa::all();
        $departamentos=Departamento::all();
        if ($request->input("idioma") == "en") {
            return view("formularios.form_register")
            ->with("departamentos", $departamentos)
            ->with("tipo_empresas", $tipo_empresas)
            ->with("direccion", $direccion)
            ->withErrors($validator)  
            ->withInput($request->flash());   
        }
        else{
            $direccion = 'Dirección General de Control a la Actividad Turística';
            return view("formularios.form_registro")
            ->with("departamentos", $departamentos)
            ->with("tipo_empresas", $tipo_empresas)
            ->with("direccion", $direccion)
            ->withErrors($validator)  
            ->withInput($request->flash());   
        }
    
    // ->with('unidades', $unidades)
    // ->with('cargos', $cargos)
      
    }
        // Datos del denunciante
        $denuncia->nombre=ucfirst($request->input("nombre"));
        $denuncia->apellidos=ucwords($request->input("apellidos"));
        $denuncia->ci=$request->input("ci");
        $denuncia->direccion=ucfirst($request->input("direccion"));
        $denuncia->email=$request->input("email");
        $denuncia->dpto_denunciante=$request->input("dpto_denunciante");
        $denuncia->telefono=$request->input("telefono");

        // Datos del Dununciado
        $denuncia->tipo_empresa=$request->input("tipo_empresa");
        $denuncia->link_oferta=$request->input("link_oferta");
        $denuncia->razon_social=$request->input("razon_social");
        $denuncia->nit=$request->input("nit");
        $denuncia->telefono_reportado=$request->input("telefono_reportado");
        $denuncia->dir_compra=$request->input("dir_compra");
        $denuncia->dpto_hecho=$request->input("dpto_hecho");
        $denuncia->lugar_especifico=ucfirst($request->input("lugar_especifico"));
        $denuncia->nombre_reportado=ucfirst($request->input("nombre_reportado"));
        $denuncia->decripcion_hecho=ucfirst($request->input("decripcion"));

        if($request->file('archivo') != ""){
            $tiempo_actual =  date('Y-m-d H:i:s');
            $archivo = $request->file('archivo');
            $mime = $archivo->getMimeType();
            $extension=strtolower($archivo->getClientOriginalExtension());
            $nuevo_nombre=$request->input("ci-").$tiempo_actual.".".$extension;
            $r1=Storage::disk('media')->put($nuevo_nombre, \File::get($archivo) );
            $rutadelaimagen="../storage/media/".$nuevo_nombre;
            if ($r1){
                $denuncia->archivo=$rutadelaimagen;
                $denuncia->extension=$extension;
                $denuncia->mime=$mime;
                // return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
            }
            else
            {
                return view("mensajes.msj_rechazado")->with("msj","Ocurrio un error");
            }
         }
         if($denuncia->save()){
            return view("mensajes.msj_enviado")->with("msj","enviado_denuncia");
        }
        else{
            return "failed";
        }
    }

    public function listado_denuncias(){
        $denuncias = \DB::table('denuncias')->orderBy('id', 'desc')->paginate(7);
        return view("listados.listado_denuncias")->with("denuncias",$denuncias);
    }
}
