<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Artigo;
use App\Models\Detuser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
 

class ArtigoController extends Controller
{
    public function index()
    {
        $cat= new Categoria();
        $dados=[
            'pagina'=>"artigo",
            'texto'=>"TEXTO",
            'cat'=>$cat->all()
            ];
            
            return view('admin.index', $dados);
    }
    public function grava(Request $request)
    {
        
        if(isset($request->ncategoria) && isset($request->categoria))
        {
            return redirect()->route('cad.artigo')->with('status', "dados duplicados pode cadastrar uma nova categoria ou escolher uma das disponíveis");
        }
        $uid=Auth::user()->id;
        $detid = DB::table('detusers')->where('id', $uid)->first();
        //$detid=DB::select('SELECT detusers.id FROM detusers WHERE detusers.user_id='.$uid);
        
        //testa repetido
        $slug = Str::slug($request['ncategoria'], '-');
        $teste = DB::table('categorias')->where('slug', $slug)->first();
          
        if($teste)
        {
            return redirect()->route('cad.artigo')->with('error', "Categoria já cadastrada");
        }
        
        if(isset($request->ncategoria))
        {
        $request->validate([
            'ncategoria'=>'required',
            'titulo'=>'required',
            'textodg'=>'required',
            'foto'=>'required'
            ]);
       
        $tslug = Str::slug($request['titulo'], '-');
        $autor = Str::slug(Auth::user()->name, '-');
        $diretorio="artigos/".$autor;
        $path=$request->foto->storeAs($diretorio, $tslug.".jpg");
        $cat=new Categoria();
        $cat->categoria=trim($request['ncategoria']);
        $cat->slug=$slug;
        $cat->save();
        $artigo=new Artigo();
        $artigo->titulo=trim($request['titulo']);
        $artigo->categoria_id=$cat->id;
        $artigo->conteudo=trim($request['textodg']);
        $artigo->artslug=$tslug;
        $artigo->datapublica=trim($request['datapub'])." ".trim($request['horapub']);
        $artigo->detuser_id=$detid->id;
        $artigo->foto = $path;
        $artigo->save();
        return redirect()->route('cad.artigo')->with('status', "Novo artigo gravado com sucesso!");
        }
        if(isset($request->categoria))
        {
        $request->validate([
            'categoria'=>'required',
            'titulo'=>'required',
            'textodg'=>'required',
            'foto'=>'required'
            ]);
        
        $tslug = Str::slug($request['titulo'], '-');
        $autor = Str::slug(Auth::user()->name, '-');
        $diretorio="artigos/".$autor;
        $path=$request->foto->storeAs($diretorio, $tslug.".jpg");
        $artigo=new Artigo();
        $artigo->titulo=trim($request['titulo']);
        $artigo->categoria_id=trim($request['categoria']);
        $artigo->conteudo=trim($request['textodg']);
        $artigo->detuser_id=$detid->id;
        $artigo->datapublica=trim($request['datapub'])." ".trim($request['horapub']);
        $artigo->foto = $path;
        $artigo->artslug=$tslug;
        $artigo->save();
        return redirect()->route('cad.artigo')->with('status', "Novo artigo gravado com sucesso!");
        }
        
        
        
    }
}
