<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Casa;
use App\Tipo;

class CasaComercialController extends Controller
{
    public function filtros(Request $request) {
        $modelo = $request->modelo;

        $filtro = array();

        if (!empty($modelo)) {
            array_push($filtro, array('modelo','like', '%'.$modelo.'%'));
        }

        $casas = Casa::where($filtro)->orderBy('modelo')
            ->paginate(5);

        return view('site.casas_pesquisa', compact('casas'));
    }
}
