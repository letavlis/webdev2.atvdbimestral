<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Eixo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    
    public function index(){
        $data = Curso::all();
        $eixo = Eixo::all();
        return view('cursos.index', compact('data','eixo'));
    }

    
    public function create(){
        $eixos = Eixo::all();
        if(!isset($eixos)){return"<h1>ID: Não há eixos cadastradas!</h1>";}
        return view('cursos.create', compact('eixos'));
    }

    
    public function store(Request $request){
        $regras =[
            'nome' => 'required|max:50|min:10',
            'sigla' => 'required|max:8|min:2|',
            'Tempo' => 'required|max:2|min:1|',
            'eixo' => 'required',
        ];

        $msgs =[
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um veterinario cadastrado com esse [:attribute]!"
        ];
        
        $request->validate($regras, $msgs);
       
        Curso::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'sigla' => $request->sigla,
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixos
        ]);

        return redirect()->route('cursos.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
