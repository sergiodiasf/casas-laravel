<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barco;
use App\Marca;

class BarcoComercialController extends Controller
{
    public function filtros(Request $request) {
        $modelo = $request->modelo;

        $filtro = array();

        if (!empty($modelo)) {
            array_push($filtro, array('modelo','like', '%'.$modelo.'%'));
        }

        $barcos = Barco::where($filtro)->orderBy('modelo')
            ->paginate(5);

        return view('site.barcos_pesquisa', compact('barcos'));
    }
}
