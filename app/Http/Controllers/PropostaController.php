<?php

namespace App\Http\Controllers;

use App\Proposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Casa;
Use App\Tipo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class PropostaController extends Controller
{


    public function __construct(){

        $this->middleware('auth')->only('index');
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $propostas = Proposta::orderBy('id', 'desc')->paginate(8);
        return view('admin.propostas_list', compact('propostas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'nome_cliente' => 'required|min:2|max:200',
            'email' => 'required',
            'telefone' => 'min:9|max:40'
        ]);

        Proposta::create($request->all());

        return redirect()->route('site.index')->with('status', ' Proposta inserida com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('site.proposta', ['casa' => Casa::find($id)]);
    }

    public function responder($id)
    {
        $proposta = Proposta::find($id);
        $casa = Casa::find($proposta->casa_id);
        return view("admin.resposta", ["proposta" => $proposta, 
                                                "casa" => $casa]);
    }

    public function graf(){

        $sql = "select concat(year(created_at), '-', month(created_at)) as mes,  
        count(*) as num 
        from propostas
        group by concat(year(created_at), '-', month(created_at))";

                $dados = DB::select($sql);

        return view('admin.proposta_graf', ['dados' => $dados]);
    }

    public function relcompra() {
        $propostas = Proposta::all();
        return \PDF::loadView('admin.relcompra', 
                            ['propostas'=>$propostas])->stream();
    }

}
