<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtividadeModel extends Model
{
	public $timestamps = false;
    protected $fillable = ['nome','descricao','data_inicio','data_fim','status_id', 'situacao'];
    protected $guarded = ['id'];
    protected $table = 'atividades';
}
