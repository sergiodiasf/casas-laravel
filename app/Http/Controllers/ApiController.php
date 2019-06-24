<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barco;
use App\Marca;

class ApiController extends Controller
{
    public function index()
    {
       $barcos = Barco::orderBy('modelo')->get();
       return response()
              ->json($barcos, 200, [], JSON_PRETTY_PRINT);        
    }

    public function store(Request $request)
    { 
       $dados = $request->all();
       
       $inc = Barco::create($dados);

       if ($inc) {
           return response()->json($inc, 201, [], JSON_PRETTY_PRINT);
       } else {
           return response()
                  ->json(['erro'=>'error_insert'],500);
       }
    }

    public function show($id)
    {
        $reg = Barco::find($id);

        if ($reg) {
            return response()
                   ->json($reg, 200, [], JSON_PRETTY_PRINT);
        } else {
            return response()
                   ->json(['erro'=>'not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $reg = Barco::find($id);

        if ($reg) {
            $dados = $request->all();

            $alt = $reg->update($dados);

            if ($alt) {
                return response()
                      ->json($reg, 200, [], JSON_PRETTY_PRINT);
            } else {
                return response()
                       ->json(['erro'=>'not update'], 500);
            }          
        } else {
            return response()
                   ->json(['erro'=>'not found'], 404);
        }
    }

    public function destroy($id)
    {
        $reg = Barco::find($id);

        if ($reg) {
            if ($reg->delete()) {
                return response()
                      ->json(['msg' =>'Ok! Excluído'], 200);
            } else {
                return response()
                       ->json(['erro'=>'not delete'], 500);
            }      
        } else {
            return response()
                   ->json(['erro'=>'not found'], 404);
        }
    }
}
