<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

/**Models**/
use App\Temas;
use App\Opcoes;

class TemaController extends Controller
{
    public function listar_por_usuario()
    {
        $temas = Temas::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('admin.tema.index', compact('temas'));
    }

    public function listar_temas()
    {
        $temas = Temas::orderBy('created_at', 'desc')->get();
        return view('admin.tema.index')->with('temas', $temas)->with('titulo', 'Listar Temas');
    }

    public function listar_removidos()
    {
        $temas = Temas::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('admin.tema.index')->with('temas', $temas)->with('titulo', 'Listar Removidos');
    }

    public function novaenquete()
    {
        return view('admin.tema.create');
    }

    public function criarenquete(Request $request)
    {
        $data = $request->input;

        $tema = new Temas;
        $tema->user_id = Auth::user()->id;
        $tema->titulo = $data[0];
        $tema->descricao = $data[1];
        $tema->duracao = Carbon::parse($data[2]);
        $tema->slug = $this->criar_slug($data[0]);
        $tema->save();

        $opcoes = explode(",", $data[3]);
        foreach ($opcoes as $key => $value) {
            $opcao = new Opcoes;
            $opcao->tema_id = $tema->id;
            $opcao->opcao = $value;
            $opcao->save();
        }

        return back();
    }

    function criar_slug($titulo)
    {
        $procurar = ['ã', 'â', 'ê', 'é', 'í', 'õ', 'ô', 'ú', ' ', '?'];
        $substituir = ['a', 'a', 'e', 'e', 'i', 'o', 'o', 'u', '-', ''];
        return str_replace($procurar, $substituir, mb_strtolower($titulo));
    }

    public function destroy($id)
    {
        Temas::find($id)->delete();
        return back();
    }

    public function ativar($id)
    {
        Temas::withTrashed()->find($id)->restore();
        return back();
    }

    public function showtemaedit($id)
    {
        $tema = Temas::ShowTemaIdUser($id, Auth::user()->id);
        return view('admin.tema.edit', compact('tema'));
    }

    public function ListarOpcoes($id)
    {
        $opcoes = Opcoes::ListOpcoes($id);
        return $opcoes;
    }

    public function updateenquete(Request $request)
    {
        $data = $request->input;

        $tema = Temas::UpdateEnquele($data);

        if ($data[3] !== null) {

            $opcoes = explode(",", $data[3]);
            foreach ($opcoes as $key => $value) {
                $opcao = new Opcoes;
                $opcao->tema_id = intval($data[4]);
                $opcao->opcao = $value;
                $opcao->save();
            }

        }

        return back();
    }
}
