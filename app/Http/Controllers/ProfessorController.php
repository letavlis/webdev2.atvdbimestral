<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    
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
            'email' => 'required|max:250|min:15|',
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
            'ativo' => 1
        ]);

        return redirect()->route('professores.index');
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
