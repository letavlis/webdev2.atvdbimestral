<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller{
    
    public function index(){
        $data = Professor::all();
        $eixo = Eixo::all();
        return view('professores.index', compact('data', 'eixo'));
    }

    
    public function create(){
        $eixos = Eixo::all();
        return view('professores.create',compact('eixos'));
    }

    
    public function store(Request $request){

        $regras =[
            'nome' => 'required|max:100|min:10',
            'email' => 'required|max:250|min:15|unique:professores',
            'siape' => 'required|max:10|min:8|',
            'ativo' => 'required'
            
        ];

        $msgs =[
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        
        $request->validate($regras, $msgs);
        
        Professor::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'email' => $request->email,
            'siape' => $request->siape,
            'eixo_id' => $request->eixos,
            'ativo' => $request->ativo
        ]);

        return redirect()->route('professores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    public function edit($id){
        $data = Professor::find($id);
        $eixos = Eixo::all();
        if(!isset($data)){return"<h1>ID: $id não encontrado!</h1>";}
        return view('professores.edit', compact('data', 'eixos'));
    }

    public function update(Request $request, $id){
        $regras =[
            'nome' => 'required|max:100|min:10',
            'email' => 'required|max:250|min:15',
        ];

        $msgs =[
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um veterinario cadastrado com esse [:attribute]!"
        ];
        
        $request->validate($regras, $msgs);

        $obj = Professor::find($id);
        if(!isset($obj)){return"<h1>ID: $id não encontrado!</h1>";}
        $obj -> fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'email' => mb_strtolower($request->email, 'UTF-8'),
            'eixo_id' => $request->eixos
        ]);
        $obj -> save();
        return redirect()->route('professores.index');
    }

    public function destroy($id){
        $obj = Professor::find($id);
        if(!isset($obj)){return"<h1>ID: $id não encontrado!</h1>";}
        $obj -> delete();
        return redirect()->route('professores.index');
    }
}
