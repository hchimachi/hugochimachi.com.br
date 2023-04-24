<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Detuser;
use App\Models\Respcomentario;
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
        
        $categoria= new Categoria();
        $cat1=$cat2=null;

        foreach($categoria->all() as $categoria)
        
        if($categoria->id % 2 == 0)
        {
            $cat1[$categoria->id]['slug']=$categoria->slug;
            $cat1[$categoria->id]['categoria']=$categoria->categoria;
 
        }else
        {
            $cat2[$categoria->id]['slug']=$categoria->slug;
            $cat2[$categoria->id]['categoria']=$categoria->categoria;
        }
        
        $artigo=DB::SELECT("SELECT artigos.id, artigos.titulo, artigos.conteudo, artigos.foto as fotoartigo, artigos.datapublica, artigos.artslug, artigos.updated_at, categorias.categoria, categorias.slug, detusers.nomecompleto, detusers.facebook, detusers.twiter, detusers.instagram, detusers.youtube, users.foto as userfoto, detusers.id as detid, categorias.id as cat FROM artigos, categorias, detusers, users WHERE artigos.categoria_id=categorias.id AND artigos.detuser_id=detusers.id AND detusers.user_id=users.id AND categorias.slug=:cat AND artigos.artslug=:art", $busca);
        $artigos=DB::SELECT("SELECT artigos.titulo, artigos.conteudo, artigos.foto as fotoartigo, artigos.datapublica, artigos.artslug, artigos.updated_at, categorias.categoria, categorias.slug, detusers.nomecompleto, detusers.facebook, detusers.twiter, detusers.instagram, detusers.youtube, users.foto as userfoto FROM artigos, categorias, detusers, users WHERE artigos.categoria_id=categorias.id AND artigos.detuser_id=detusers.id AND detusers.user_id=users.id AND detusers.id=". $artigo[0]->detid);
        $comentarios=DB::SELECT("SELECT comentarios.id, users.name, users.foto, comentarios.conteudo, comentarios.user_id, comentarios.created_at FROM comentarios, users WHERE comentarios.user_id=user_id and comentarios.artigo_id=".$artigo[0]->id);
        $total=DB::select('SELECT COUNT(respcomentarios.id)as total from respcomentarios');
        $resp=DB::SELECT('SELECT respcomentarios.id, respcomentarios.comentario_id, respcomentarios.conteudo as resposta, respcomentarios.created_at as respondido, users.name, users.foto, respcomentarios.user_id FROM respcomentarios, users WHERE respcomentarios.user_id=users.id');
       
        
      
       
       $dados=[
            'artigo'=>$artigo[0],
            'artigos'=>$artigos,
            'pagina'=>'blog',
            'cat1'=>$cat1,
            'cat2'=>$cat2,
            'comentarios'=>$comentarios,
            'resposta'=>$resp,
            'total'=>$total[0],
        ];
        
        
        
        
        return view('home.blog', $dados);
    }
    public function comentario(Request $request )
    {
        $id=Auth::user();
        if($id==null)
        {
            return back()->with('error', "É necessário estra logado para comentar.");
        }
       
        $comentario= new Comentario();
        $comentario->artigo_id=trim($request['artigoid']);
        $comentario->user_id=trim(Auth::user()->id);
        $comentario->conteudo=trim($request['comentario']);
        $comentario->save();
        return back()->with('status', "Comentário gravado com sucesso");
       
        
    }
    public function respcomentario(Request $request)
    {
        $id=Auth::user();
        if($id==null)
        {
            return back()->with('error', "É necessário estar logado para comentar ou responder um comentario.");
        }
       
        $resp=new Respcomentario();
        $resp->comentario_id=trim($request['coment']);
        $resp->user_id=trim(Auth::user()->id);
        $resp->conteudo=trim($request['resposta']);
        $resp->save();
        return back()->with('status', "Comentário Respondido com sucesso");
    }
    
}
