<?php

namespace Api4LEL\Http\Controllers;

use Illuminate\Http\Request;

use Api4LEL\Http\Requests;

class GeneralController extends Controller
{
	public function __construct()
	{
		$this->middleware('cors');
	}

    // Datos generales

    public function getMunicipios()
    {
    	$municipios = \DB::table('municipios')->get();

    	return response()->json($municipios);
    }

    public function getColegios($municipio)
    {
    	$colegios = \DB::table('colegios')->select('id', 'colegio')->where('id_municipio', $municipio)->get();

    	return response()->json($colegios);
    }
}
