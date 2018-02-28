<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produto;
use App\Http\Requests\Painel\ProdutoFormRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index()
    {
        $produtos = $this->produto->paginate(8);
        $title = "Listagem dos produtos";

        return view('painel.produtos.index',compact('produtos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar Produto";
        $categorias = ['eletronicos'=>'eletronicos','moveis'=>'moveis', 'limpeza'=>'limpeza','banho'=>'banho'];
        return view('painel.produtos.create-edit',compact('title','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoFormRequest $request)
    {
        //dd($request->all());
        //dd($request->only(['name','description']));
        //dd($request->except(['_token']));
        //dd($request->input('name'));
        $dataForm = $request->all();
        if(!isset($dataForm['active']))
            $dataForm['active'] = 0;

        //$this->validate($request,$this->produto->rules);
        $insert = $this->produto->create($dataForm);
        if($insert)
            return redirect()->route('produtos.index');
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);
        $title = "Produto: {$produto->name}";
        return view('painel.produtos.show',compact('produto','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produto->find($id);
        $title = 'Editando Produto';
        $categorias = ['eletronicos'=>'eletronicos','moveis'=>'moveis', 'limpeza'=>'limpeza','banho'=>'banho'];
        return view('painel.produtos.create-edit',compact('title','categorias','produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoFormRequest $request, $id)
    {
        //
        $dataForm = $request->all();
        
        if(!isset($dataForm['active']))
            $dataForm['active'] = 0;

        $update = $this->produto->find($id)->update($dataForm);

        if($update)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.edit', $id)->width(['errors' => 'falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);
        $delete = $produto->delete();
        if($delete)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.show',$produto )->width(['errors' => 'falha ao deletar']);
    }

    public function test()
    {
        /*
        $insert = $this->produto->create([
            'name' => 'nome do produto',
            'number' => 123,
            'active' => 'true', 
            'category' => 'eletronicos', 
            'description' => 'descricao aqui'
        ]);
        if($insert)
            return "inserido com sucesso, ID:{$insert->id}";
        else
            return 'falha ao inserir';
        */
            /*
        $update = $this->produto
                ->where('number',456)
                ->update([
                    'name' => 'nome do produto3',
                    'number' => 789,
                    'active' => 'false'
                ]);
        if($update)
            return "alterado";
        else
            return 'falha ao alterar';
            */

        $delete = $this->produto
                    ->where('number',7)
                    ->delete();
        if($delete)
            return "deletado com sucesso";
        else
            return "falha ao deletar";
    }
}
