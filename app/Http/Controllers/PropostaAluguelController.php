<?php

namespace App\Http\Controllers;

use App\PropostaAluguel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Casa;
Use App\Tipo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class PropostaAluguelController extends Controller
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
        $propostas = PropostaAluguel::orderBy('id', 'desc')->paginate(8);
        return view('admin.propostas_alugar', compact('propostas'));
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

        PropostaAluguel::create($request->all());

        return redirect()->route('site.index')->with('status', ' Proposta cadastrada com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('site.alugar', ['casa' => Casa::find($id)]);
    }


    public function graf(){

        $sql = "select concat(year(created_at), '-', month(created_at)) as mes,  
        count(*) as num 
        from porposta_aluguel 
        group by concat(year(created_at), '-', month(created_at))";

                $dados = DB::select($sql);

        return view('admin.proposta_graf', ['dados' => $dados]);
    }

    public function relaluga() {

        $propostas = PropostaAluguel::all();
        return \PDF::loadView('admin.relaluga', 
                            ['propostas'=>$propostas])->stream();
    }

}
