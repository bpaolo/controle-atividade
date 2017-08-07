@extends('atividade.default')

@section('content')
<h1>Editar </h1>
<form action="/controleAtividade/public/atividade/{{ $detailatividade->id }}" class="form-horizontal" method="POST">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="nome">Nome :</label>
        <input type="text" name="nome" value="{{ $detailatividade->nome }}" placeholder="nome" maxlength="255">
        {{ ($errors->has('nome')) ? $errors->first('nome') : '' }}
    </div>
    <div class="form-group">    
        <label class="col-sm-2 control-label" for="descricao">Descrição :</label>    
        <textarea name="descricao" rows="8" cols="40" placeholder="descricao"  maxlength="600">{{ $detailatividade->descricao }}</textarea>
        {{ ($errors->has('descricao')) ? $errors->first('descricao') : '' }}
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="data_inicio">Data Início :</label>    
        <input type="text" name="data_inicio" value="{{ Carbon\Carbon::parse($detailatividade->data_inicio)->format('d/m/Y ') }}" placeholder="data início">
        {{ ($errors->has('data_inicio')) ? $errors->first('data_inicio') : '' }}
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="data_fim">Data Fim :</label>    
        <input type="text" name="data_fim" value="{{ Carbon\Carbon::parse($detailatividade->data_fim)->format('d/m/Y ') }}" placeholder="data fim">
        {{ ($errors->has('data_fim')) ? $errors->first('data_fim') : '' }}
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="Status">Status :</label>     
        <select name="status_id" id="status_id">
            <option value="">Selecione status</option>
            @foreach ($todosStatus as $pegaTodosStatus)
                <option value="{{$pegaTodosStatus->id}}">{{$pegaTodosStatus->nome}}</option>
            @endforeach
        </select>
        {{ ($errors->has('status_id')) ? $errors->first('status_id') : '' }}
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="situacao">Situação :</label>     
        <select name="situacao" id="situacao">
            <option value="0">Inativo</option>
            <option value="1">Ativo</option>
        </select>
        {{ ($errors->has('situacao')) ? $errors->first('situacao') : '' }}
    </div>
    <div class="form-group">    
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Save">
    </div>    
</form>
@stop