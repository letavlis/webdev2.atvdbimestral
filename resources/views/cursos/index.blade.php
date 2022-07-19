<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Cursos", 'rota' => "cursos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Cursos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">        
            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist 
                :title="'Cursos'"
                :crud="'cursos'"
                :header="['ID', 'NOME', 'ABREVIATURA', 'ÁREA/EIXO', 'AÇÕES']" 
                :fields="['id', 'nome', 'sigla', 'eixo_id']"
                :data="$data"
                :eixo="$eixo"
                :hide="[true, false, true, false, true]" 
                :info="['id', 'nome', 'email']"
                :remove="'nome'"
            />
        </div>
    </div>
@endsection