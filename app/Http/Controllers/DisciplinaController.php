<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Curso;
use Illuminate\Http\Request;

class DisciplinaController extends Controller{
    
    public function index(){
        $data = Disciplina::all();
        $curso = Curso::all();
        return view('disciplinas.index', compact('data', 'curso'));
    }

    public function create(){
        $cursos = Curso::all();
        return view('disciplinas.create',compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $regras =[
            'nome' => 'required|max:100|min:10',
            'carga'=> 'required|max:12|min:1'
        ];

        $msgs =[
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        
        $request->validate($regras, $msgs);
        
        Disciplina::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'carga' => $request->carga,
            'curso_id' =>$request->cursos
        ]);

        return redirect()->route('disciplinas.index');
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

    public function edit($id){
        
        $data = Disciplina::find($id);
        $cursos = Curso::all();
        if(!isset($data)){return"<h1>ID: $id não encontrado!</h1>";}

        return view('disciplinas.edit', compact('data', 'cursos'));
    }

    public function update(Request $request, $id){
        
        $regras =[
            'nome' => 'required|max:100|min:10',
            'carga'=> 'required|max:12|min:1'
        ];

        $msgs =[
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        
        $request->validate($regras, $msgs);

        $obj = Disciplina::find($id);
        if(!isset($obj)){return"<h1>ID: $id não encontrado!</h1>";}
        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'carga' => $request->carga,
            'curso_id' =>$request->cursos
        ]);
        $obj->save();
        return redirect()->route('disciplinas.index');
    }

    
    public function destroy($id){
        $obj = Disciplina::find($id);
        if(isset($obj)){
            $obj->delete();
        } else {
            $msg = "Disciplina";
            $link = "disciplinas.index";
            return view('erros.id', compact(['msg', 'link']));
        }
        
        return redirect()->route('disciplinas.index');
    }
}
