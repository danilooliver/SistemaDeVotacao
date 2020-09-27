<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Opcoes extends Model
{
    use SoftDeletes;
    protected $table = "opcoes";

    protected $fillable = [
    'id'
    ,'tema_id'
    ,'opcao'
    ,'qtde'
    ];

    public function ListOpcoes($id){
        return DB::table('opcoes')
            ->join('temas','temas.id','tema_id')
            ->select(
                'opcao'

            )
            ->where('temas.id',$id)
            ->get();
    }
}
