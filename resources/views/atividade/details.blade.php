@extends('atividade.default')

@section('content')
<h1>Detalhe da atividade</h1>
   
   			<label>Nome : </label>{{ $detailatividade->nome}}<br>
    		<label>Descrição : </label>{{ $detailatividade->descricao}}<br>
    		<label>Data Fim : </label>{{ Carbon\Carbon::parse($detailatividade->data_inicio)->format('d/m/Y ') }}<br>
            <label>Data Início : </label>{{ $detailatividade->data_inicio}}<br>
    		<label>Data Fim : </label>{{ Carbon\Carbon::parse($detailatividade->data_fim)->format('d/m/Y ') }}<br>
            <label>Status : </label>{{ $status->nome}}<br>
    		<label>Situação : </label>{{ $situacao}}<br>
    <a href="/controleAtividade/public/atividade">Cancel</a>
@stop