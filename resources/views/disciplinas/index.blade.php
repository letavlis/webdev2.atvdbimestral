<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Disciplinas", 'rota' => "disciplinas.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Disciplinas @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist 
                :title="'Disciplinas'"
                :crud="'disciplinas'"
                :header="['NOME', 'CURSO', 'AÇÕES']" 
                :fields="['nome', 'curso_id']"
                :data="$data"
                :eixo="$curso"
                :hide="[true, false, true, false]" 
                :info="['id', 'nome', 'carga']"
                :remove="'nome'"
            />
        </div>
    </div>
@endsection