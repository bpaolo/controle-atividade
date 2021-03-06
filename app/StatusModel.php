<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    public $timestamps = false;
    public $fillable = ['nome'];
    protected $guarded = ['id'];
    protected $table = 'status';
}
