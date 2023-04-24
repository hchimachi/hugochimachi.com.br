<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Respcomentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function apagacomentario($id)
    {
        
        $comentario=Comentario::find($id);
        
        $comentario->delete();
        if($comentario)
        {
            return back()->with('status', "Comentário apagado com sucesso");
        }
        return back()->with('error', "Ocorreu um erro na solicitação, tente novamente em algus segundos.");
    }
    public function apagaresposta($id)
    {
        
        $resposta=Respcomentario::find($id);
        
        $resposta->delete();
        if($resposta)
        {
            return back()->with('status', "Resposta ao comentário apagada com sucesso");
        }
        return back()->with('error', "Ocorreu um erro na solicitação, tente novamente em algus segundos.");
    }
}
