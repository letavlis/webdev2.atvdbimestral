<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Professores", 'rota' => "professores.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist 
                :title="'Professores'"
                :crud="'professores'"
                :header="['ID', 'NOME', 'EIXO', 'STATUS', 'AÇÕES']" 
                :fields="['id', 'nome', 'eixo_id', 'ativo']"
                :data="$data"
                :eixo="$eixo"
                :hide="[true, false, true, false, true]" 
                :info="['id', 'nome', 'email']"
                :remove="'nome'"
            />
        </div>
    </div>
@endsection