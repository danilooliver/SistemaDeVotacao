<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Temas extends Model
{
    use SoftDeletes;
    protected $table = "temas";

    protected $fillable = [
    'id'
    ,'user_id'
    ,'titulo'
    ,'descricao'
    ,'duracao'
    ,'slug'
    ];

    public static function DetailTemas()
    {
        return DB::table('temas')
            ->join('users','temas.user_id','users.id')
            ->select(
                'temas.id as idtema'
                ,'titulo'
                ,'descricao'
                ,'duracao'
                ,'slug'
                ,'name'
            )
            ->orderBy('temas.created_at', 'desc')
            ->where('temas.deleted_at',null)
            ->limit(10)
            ->get();
    }

    public static function DetailTemasId($id)
    {
        return DB::table('temas')
            ->join('users','temas.user_id','users.id')
            ->select(
                'temas.id as idtema'
                ,'titulo'
                ,'descricao'
                ,'duracao'
                ,'slug'
                ,'name'
            )
            ->orderBy('temas.created_at', 'desc')
            ->where('temas.user_id',$id)
            ->count();
    }

    public static function ShowTemaIdUser($id, $user_id)
    {
        return DB::table('temas')
            ->join('users','temas.user_id','users.id')
            ->select(
                'temas.id as idtema'
                ,'titulo'
                ,'descricao'
                ,'duracao'
                ,'slug'
            )
            ->where('temas.id',$id)
            ->where('users.id',$user_id)
            ->get();
    }

    public static function UpdateEnquele($data){

        $update = DB::table('temas')
            ->where('temas.id',intval($data[4]))
            ->update([
                'titulo' => $data[0]
                ,'descricao' => $data[1]
                ,'duracao' => $data[2]

            ]);

    }
}
