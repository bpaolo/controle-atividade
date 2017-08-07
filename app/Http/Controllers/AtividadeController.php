<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\AtividadeModel;
use App\StatusModel;


class AtividadeController extends Controller
{
    public function index()
    {
        $atividade = AtividadeModel::all();
        $todosStatus  = StatusModel::all();

        return view('atividade.index',['atividades' => $atividade])->with('todosStatus' , $todosStatus);
    }
  
    public function create()
    {
        $status = StatusModel::all();
        return view('atividade.create')->with('allStatus', $status);
    }
  
    public function store(Request $request)
    {
    	$this->validate($request, ['nome' => 'required','descricao' => 'required','data_inicio' =>
         'required','status_id' => 'required','situacao' => 'required']);

        $atividade = new AtividadeModel;

        $data_fim                  = $this->dateFormat($request->data_fim);
        $atividade->nome           = $request->nome;
        $atividade->descricao 	   = $request->descricao;
        $atividade->data_inicio    = $this->dateFormat($request->data_inicio);
        $atividade->data_fim       = (!empty($request->data_fim) ? $data_fim : null);
        $atividade->status_id      = $request->status_id;
        $atividade->situacao       = $request->situacao;

        #o campo data_fim deve ser obrigatório caso o status esteja concluido
        if($atividade->status_id == 4 && empty($atividade->data_fim)){
            $this->validate($request, ['data_fim' => 'required']);            
        }

        $atividade->save();
        return redirect()->route('atividade.index')->with('message', 'Atividade cadastrada com sucesso!');
    }

    public function show($id)
    {
        $atividade = AtividadeModel::findOrFail($id);
        if(!$$atividade){
        	abort(404);
        }
        return view('atividade.details')->with('detailatividade', $atividade);
    }
  
    public function edit($id)
    {
        $atividade  = AtividadeModel::findOrFail($id);
        $statusId   = StatusModel::findOrFail($atividade->status_id);
        $todosStatus  = StatusModel::all();
        $situacao    = $this->activityStatus($atividade->situacao);
        
        if(!$atividade){
        	abort(404);
        }

        if($atividade->status_id == 4){
            return view('atividade.details')->with('detailatividade', $atividade)->with('status', $statusId)->with('situacao', $situacao);
        }

        return view('atividade.edit')->with('detailatividade', $atividade)->with('todosStatus', $todosStatus);
    }
  
    public function update(Request $request, $id)
    {
        $this->validate($request, ['nome' => 'required','descricao' => 'required','data_inicio' =>
        'required','status_id' => 'required','situacao' => 'required']);

        $atividade = AtividadeModel::findOrFail($id);

        $data_fim                  = $this->dateFormat($request->data_fim);
        $atividade->nome           = $request->nome;
        $atividade->descricao      = $request->descricao;
        $atividade->data_inicio    = $this->dateFormat($request->data_inicio);
        $atividade->data_fim       = (!empty($request->data_fim) ? $data_fim : null);
        $atividade->status_id      = $request->status_id;
        $atividade->situacao       = $request->situacao;

        #o campo data_fim deve ser obrigatório caso o status esteja concluido
        if($atividade->status_id == 4 && empty($atividade->data_fim)){
            $this->validate($request, ['data_fim' => 'required']);            
        }
        $atividade->save();
        return redirect()->route('atividade.index')->with('message', 'Atividade salva!');
    }
  
    public function destroy($id)
    {
        $atividade = AtividadeModel::findOrFail($id);
        $atividade->delete();
        return redirect()->route('atividade.index')->with('alert-success','Atividade deletada!');
    }

    private function dateFormat($dateRequest){
        $resultDate = implode("-", array_reverse(explode("/", trim($dateRequest))));
        return $resultDate;
    }

    private function activityStatus($situacao){
        switch ($situacao) {
            case 0:
                $result = 'Inativo';
                break;
            case 1:
                $result = 'Ativo';
                break;
            
            default:
                $result = null;
                break;
        }
        return $result;
    }
}
