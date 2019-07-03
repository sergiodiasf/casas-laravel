<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Casa;
use App\Tipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CasaController extends Controller
{
  
  
    public function __construct()
    {
        $this->middleware('auth');
    }
  
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // if (!Auth::check()) {
         //   return redirect("/home");       
       // }

                
        // $dados = Casa::all();
        $dados = Casa::paginate(5);

        $soma = Casa::sum('preco');

        return view('admin.casas_list', ['casas' => $dados, 'soma' => $soma]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // informações auxiliares que serão utilizadas no form de cadastro
        $tipos = Tipo::orderBy('nome')->get();        

        return view('admin.casas_form', 
                    ['tipos'=>$tipos, 'acao' => 1]);
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
            'modelo' => 'min:2|max:40',
            'ano' => 'numeric|min:1970|max:2020' 
        ]);

        // obtém todos os campos do formulário
        $dados = $request->all();

        // se o campo foto foi preenchido  e enviado (valido)
        if ($request->hasFile('foto') && $request->file('foto')->isValid()){
        // salva o arquivo e retorna um id unico
        $path = $request->file('foto')->store('fotos');
        $dados['foto'] = $path;
        }

        $inc = Casa::create($dados);

        if ($inc) {
            return redirect()->route('casas.index')
                   ->with('status', $request->modelo . ' cadastrado com sucesso!');     
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // posiciona no registro a ser alterado e obtém seus dados
        $reg = Casa::find($id);

        $tipos = Tipo::orderBy('nome')->get();
      
        return view('admin.casas_form', ['reg' => $reg, 'tipos' => $tipos, 
                                          'acao' => 2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // obtém os dados do form
        $dados = $request->all();

        // posiciona no registo a ser alterado
        $reg = Casa::find($id);

          // se o campo foto foi preenchido  e enviado (valido)
          if ($request->hasFile('foto') && $request->file('foto')->isValid()){
            // salva o arquivo e retorna um id unico
            $path = $request->file('foto')->store('fotos');
            $dados['foto'] = $path;

            if($reg->foto != null){
                Storage::delete($reg->foto);
            }

            }

        // realiza a alteração
        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('casas.index')
                            ->with('status', $request->modelo . ' Alterado!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cas = Casa::find($id);
        $foto = $cas->foto;
        if ($cas->delete()) {
           
            if($foto != null){
                Storage::delete($foto);
            }

            return redirect()->route('casas.index')
                            ->with('status', $cas->modelo . ' Excluído!');
        }
    }

    public function graf(){

        $sql = "select m.nome as tipo, count(c.id) as num from casas c
                inner join tipos m
                on c.tipo_id = m.id
                group by m.nome";

                $dados = DB::select($sql);

        return view('admin.casas_graf', ['dados'=>$dados]);
    }

    
    public function relcasas() {
        $casas = Casa::all();
        return \PDF::loadView('admin.relcasas', 
                            ['casas'=>$casas])->stream();
    }
    
}
