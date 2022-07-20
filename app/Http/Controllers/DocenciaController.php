<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Docencia;
use App\Models\Professor;
use Illuminate\Http\Request;

class DocenciaController extends Controller{
   
    public function index(){
        $disciplinas = Disciplina::orderBy('nome')->get();
        $professores = Professor::orderBy('nome')->get();
        return view('docencias.index', compact('professores', 'disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request){
        

        $prof = $request->PROF;
        $disc = $request->DISC;
        
        $doc = new Docencia();
        
        for ($i = 0; $i < count($prof); $i++) {
            $doc->professor_id = $prof[$i];
            $doc->disciplina_id = $disc[$i];
            $doc->save();
        }
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
