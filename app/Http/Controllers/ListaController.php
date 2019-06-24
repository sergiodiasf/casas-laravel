<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Barco;
Use App\Marca;
 
class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barcos = Barco::all();
        return view('site.barcos_lista', ['barcos' => $barcos]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Barco::find($id);

        return view('site.barcos_show', ['barco' => $dados]);
    }


}
