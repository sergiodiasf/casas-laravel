<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barco;
use App\Marca;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BarcoController extends Controller
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

                
        // $dados = Barco::all();
        $dados = Barco::paginate(5);

        $soma = Barco::sum('preco');

        return view('admin.barcos_list', ['barcos' => $dados, 'soma' => $soma]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // informações auxiliares que serão utilizadas no form de cadastro
        $marcas = Marca::orderBy('nome')->get();        

        return view('admin.barcos_form', 
                    ['marcas'=>$marcas, 'acao' => 1]);
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

        $inc = Barco::create($dados);

        if ($inc) {
            return redirect()->route('barcos.index')
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
        $reg = Barco::find($id);

        $marcas = Marca::orderBy('nome')->get();
      
        return view('admin.barcos_form', ['reg' => $reg, 'marcas' => $marcas, 
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
        $reg = Barco::find($id);

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
            return redirect()->route('barcos.index')
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
        $bar = Barco::find($id);
        $foto = $bar->foto;
        if ($bar->delete()) {
           
            if($foto != null){
                Storage::delete($foto);
            }

            return redirect()->route('barcos.index')
                            ->with('status', $bar->modelo . ' Excluído!');
        }
    }

    public function graf(){

        $sql = "select m.nome as marca, count(c.id) as num from barcos c
                inner join marcas m
                on c.marca_id = m.id
                group by m.nome";

                $dados = DB::select($sql);

        return view('admin.barcos_graf', ['dados'=>$dados]);
    }

    
    public function relbarcos() {
        $barcos = Barco::all();
        return \PDF::loadView('admin.relbarcos', 
                            ['barcos'=>$barcos])->stream();
    }
    
}
