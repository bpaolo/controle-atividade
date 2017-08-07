@extends('atividade.default')
@section('content')
<h1>Cadastrar</h1>
<form class="" action="/controleAtividade/public/atividade" class="form-horizontal" method="POST">
	<div class="form-group">
		<label class="col-sm-2 control-label" for="nome">Nome :</label>
		<input type="text" name="nome" value="" placeholder="nome" maxlength="255">
		{{ ($errors->has('nome')) ? $errors->first('nome') : '' }}
	</div>
	<div class="form-group">	
		<label class="col-sm-2 control-label" for="descricao">Descrição :</label>
		<textarea name="descricao" rows="8" cols="40" placeholder="descricao" maxlength="600"></textarea>
		{{ ($errors->has('descricao')) ? $errors->first('descricao') : '' }}
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="data_inicio" >Data Início :</label>
		<input type="text" name="data_inicio" value="" placeholder="dd/mm/yyyy">
		{{ ($errors->has('data_inicio')) ? $errors->first('data_inicio') : '' }}
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="data_fim">Data Fim :</label>
		<input type="text" name="data_fim" value="" placeholder="dd/mm/yyyy">
		{{ ($errors->has('data_fim')) ? $errors->first('data_fim') : '' }}
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="Status">Status :</label>	
		<select name="status_id" id="status_id">
		    <option value="0">Selecione status</option>
		    @foreach ($allStatus as $i => $getAllStatus)
		    	<option value="{{$getAllStatus['id']}}">{{$getAllStatus['nome']}}</option>
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
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" value="Save">
</form>

@stop
