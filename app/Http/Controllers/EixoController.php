<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    
    public function index()
    {
        $data = Eixo::all();
        return view('eixos.index', compact('data'));
    }

   
    public function create(){
        return view('eixos.create');
    }

    
    public function store(Request $request){
        $regras =[
            'nome' => 'required|max:50|min:10',
        ];

        $msgs =[
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras, $msgs);

        Eixo::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8')
        ]);

        return redirect()->route('eixos.index');
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
