<?php

namespace Api4LEL\Http\Controllers;

use Illuminate\Http\Request;

use Api4LEL\Http\Requests\EstudianteRequest;

use Api4LEL\Estudiante;
use Api4LEL\Perfil;

class EstudianteController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteRequest $request)
    {
        $resp = null;

        if ($this->validarEstudiante($request->id)) {
            // Código si y existe el estudiante
            $resp = "453";
        } else {
            // Profile
            $profile = null;

            // Get Estudiante
            Estudiante::create($request->all());

            if($request->grado > 5 AND $request->grado < 10){
                $profile = ['id_estudiante' => $request->id, 'id_categoria' => 1];         
            } else {
                if ($request->grado > 9 AND $request->grado < 12) {
                    $profile = ['id_estudiante' => $request->id, 'id_categoria' => 2]; 
                }                        
            }

            Perfil::insert($profile);

            $resp = true;
        }

        return response()->json($resp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteRequest $request, $id)
    {
        //
    }

    /**
	* Iniciar sesión, devuelve el token del Estudiante
	* @param string $identificacion, $paswword
	*/
	public function login($identficacion, $password)
	{
        $resp = Estudiante::where('id', $identficacion)->select('nombre', 'apellidos', 'api_token', 'password')->first();

        if ($resp == null) {
            // Respuesta si el estudiante no existe
            $resp = "0";
        } else {
            if($resp->password != $password) {
                // Respuesta si la contraseña es incorrecta
                $resp = "1";
            }
        }

        return response()->json($resp);
	}

    private function validarEstudiante($identificacion)
    {
        $resp = Estudiante::where('id',$identificacion)->first();

        if ($resp == null) {
            // Respuesta si el estudiante no existe
            $resp = false;
        } else {
            // Respuesta si el estudiante existe
            $resp = true;
        }

        return $resp;
    }
}
