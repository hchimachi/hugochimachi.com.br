<?php

namespace App\Http\Controllers;

use App\Models\Detuser;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function home()
    {
        
        $art= DB::SELECT('SELECT artigos.id, artigos.titulo, artigos.foto, categorias.categoria, categorias.slug, artigos.artslug, artigos.conteudo, artigos.datapublica, detusers.nomecompleto, detusers.facebook, detusers.twiter, detusers.instagram, detusers.youtube FROM artigos, categorias, detusers WHERE artigos.categoria_id=categorias.id AND artigos.detuser_id=detusers.id ORDER BY artigos.id desc LIMIT 3');
        $autor= DB::SELECT('SELECT users.id,  users.name, users.foto, detusers.nomecompleto, detusers.facebook, detusers.twiter, detusers.instagram, detusers.youtube from users, detusers WHERE users.id=detusers.user_id ORDER BY users.id desc LIMIT 3');
           
        $dados=[
            'artigo'=>$art,
            'autor'=>$autor,
            
        ];
       
        
        return view('welcome',$dados);
    }
    
    public function index()
    {   
        $id=Auth::user()->id;
        $tipousuario= DB::select('SELECT * FROM detusers WHERE detusers.user_id='.$id);        
        
        
        $dados=[
            'tipousuario'=>$tipousuario
        ];
        return view('admin.index',$dados);
    }
    public function artigo($cat, $art)
    {
        $busca=[
            'cat'=>$cat,
            'art'=>$art
        ];
        $artigo=DB::SELECT("SELECT artigos.titulo, artigos.conteudo, artigos.foto as fotoartigo, artigos.datapublica, artigos.artslug, artigos.updated_at, categorias.categoria, categorias.slug, detusers.nomecompleto, detusers.facebook, detusers.twiter, detusers.instagram, detusers.youtube, users.foto as userfoto FROM artigos, categorias, detusers, users WHERE artigos.categoria_id=categorias.id AND artigos.detuser_id=detusers.id AND detusers.user_id=users.id AND categorias.slug=:cat AND artigos.artslug=:art", $busca);
      
        $dados=[
            'artigo'=>$artigo[0],
            'pagina'=>'blog'
        ];
        
        
        
        
        return view('home.blog', $dados);
    }
}
