<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detuser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index($id=null)
    {
        if(!isset($id))
        {
        $lista= DB::select('select * from users where users.id not in (SELECT user_id from detusers)');
        
        $dados=[
            'pagina'=>"usuario",
            'cep'=>"CEP",
            'user'=>$lista,
            ];
                return view('admin.index', $dados);
        }
        
        $lista= DB::select('select users.id, users.name, users.email, detusers.nomecompleto, detusers.rua, detusers.numero, detusers.bairro, detusers.CEP,detusers.cidade,detusers.UF, detusers.tel, detusers.cel, detusers.CPF, detusers.RG, detusers.facebook, detusers.twiter, detusers.instagram, detusers.youtube from users, detusers where detusers.user_id=users.id AND users.id ='.$id);
        
        
        $dados=[
            'pagina'=>"usuario",
            'cep'=>"CEP",
            'upuser'=>$lista[0],
            ];  
          
            return view('admin.index', $dados);
    }
    public function grava(Request $request)
    {
       
        if(isset($request->name) && isset($request->userid))
        {
           
            return redirect()->route('cad.usuario')->with('status', "dados duplicados pode cadastrar um novo usuário ou promover um pré cadastrado");
        }
        $tipo=[
            '0'=>'Administrador',
            '1'=>'Autor',
            '2'=>'Leitor'
        ];
        if(isset($request->name))
        {
             $request->validate([
            'name'=>'required',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'nomec'=> 'required', 'max:255',
            'rua'=> 'required', 'max:255',
            'numero'=> 'required', 'max:255',
            'bairro'=> 'required', 'max:255',
            'cidade'=> 'required', 'max:255',
            'cep'=> 'required', 'max:15',
            'uf'=> 'required', 'max:2',
            'tel'=> 'required', 'max:15',
            'cel'=> 'required', 'max:15',
            'cpf'=> 'required', 'max:255',
            'rg'=> 'required', 'max:255',
            'facebook'=> 'nullable', 'max:255',
            'twiter'=> 'nullable', 'max:255',
            'instagram'=> 'nullable', 'max:255',
            'foto'=>'required',
            
        ]);
            $diretorio="usuarios";      
            $nomefoto=trim($request['cpf'])*5;
            $user=new User();
            $user->name = trim($request['name']);
            $user->email = trim($request['email']);
            $user->password = Hash::make('123456789');
            $user->email_verified_at = now();
            $path=$request->foto->storeAs($diretorio, $nomefoto.".jpg");
            $user->foto = $path;
            $user->save();
            $detuser=new Detuser();
            $detuser->user_id = $user->id;
            $detuser->nomecompleto = trim($request['nomec']);
            $detuser->rua = trim($request['rua']);
            $detuser->numero = trim($request['numero']);
            $detuser->bairro = trim($request['bairro']);
            $detuser->CEP = trim($request['cep']);
            $detuser->cidade = trim($request['cidade']);
            $detuser->UF = trim($request['uf']);
            $detuser->tel = trim($request['tel']);
            $detuser->cel = trim($request['cel']);
            $detuser->CPF = trim($request['cpf']);
            $detuser->RG = trim($request['rg']);
            $detuser->facebook = trim($request['facebook']);
            $detuser->twiter = trim($request['twiter']);
            $detuser->instagram = trim($request['instagram']);
            $detuser->youtube = trim($request['youtube']);
            $detuser->tipousuario=trim($request['tipouser']);
            $detuser->save();
            $mensagem= "Cadastro de novo ". $tipo[$detuser->tipousuario] ." criado com sucesso.";
            
        
        }
        if(isset($request->userid))
        {
            $request->validate([
            'userid'=>'required',
            'nomec'=> 'required', 'max:255',
            'rua'=> 'required', 'max:255',
            'numero'=> 'required', 'max:255',
            'bairro'=> 'required', 'max:255',
            'cidade'=> 'required', 'max:255',
            'cep'=> 'required', 'max:15',
            'uf'=> 'required', 'max:2',
            'tel'=> 'required', 'max:15',
            'cel'=> 'required', 'max:15',
            'cpf'=> 'required', 'max:255',
            'rg'=> 'required', 'max:255',
            'facebook'=> 'nullable', 'max:255',
            'twiter'=> 'nullable', 'max:255',
            'instagram'=> 'nullable', 'max:255',
            
            
        ]);
            $diretorio="usuarios";      
            $nomefoto=trim($request['cpf'])*5;
            $detuser= new Detuser();
            $id=trim($request['userid']);
            $user= User::find($id);
            $path=$request->foto->storeAs($diretorio, $nomefoto.".jpg");
            $user->foto = $path;
            $user->save();
            $detuser->user_id = trim($request['userid']);
            $detuser->nomecompleto = trim($request['nomec']);
            $detuser->rua = trim($request['rua']);
            $detuser->numero = trim($request['numero']);
            $detuser->bairro = trim($request['bairro']);
            $detuser->CEP = trim($request['cep']);
            $detuser->cidade = trim($request['cidade']);
            $detuser->UF = trim($request['uf']);
            $detuser->tel = trim($request['tel']);
            $detuser->cel = trim($request['cel']);
            $detuser->CPF = trim($request['cpf']);
            $detuser->RG = trim($request['rg']);
            $detuser->facebook = trim($request['facebook']);
            $detuser->twiter = trim($request['twiter']);
            $detuser->instagram = trim($request['instagram']);
            $detuser->youtube = trim($request['youtube']);
            $detuser->tipousuario=trim($request['tipouser']);
            $detuser->save();
            $mensagem="Usuário promovido a ". $tipo[$detuser->tipousuario];
            
        }
      
        return redirect()->route('cad.usuario')->with('status', $mensagem);
            
            
    }
    public function atualiza(Request $request)
    {
        $request->validate([
            'userid'=>'required',
            'nomec'=> 'required', 'max:255',
            'rua'=> 'required', 'max:255',
            'numero'=> 'required', 'max:255',
            'bairro'=> 'required', 'max:255',
            'cidade'=> 'required', 'max:255',
            'cep'=> 'required', 'max:15',
            'uf'=> 'required', 'max:2',
            'tel'=> 'required', 'max:15',
            'cel'=> 'required', 'max:15',
            'cpf'=> 'required', 'max:255',
            'rg'=> 'required', 'max:255',
            'facebook'=> 'nullable', 'max:255',
            'twiter'=> 'nullable', 'max:255',
            'instagram'=> 'nullable', 'max:255',
            'foto'=> ['nullable', 'image', 'max:1024' 
            ]
        ]);
        
            $detuser= new Detuser();
            $diretorio="usuarios";      
            $path=$request->foto->storeAs($diretorio, $request['userid'].".jpg");
            $detuser->user_id = trim($request['userid']);
            $detuser->nomecompleto = trim($request['nomec']);
            $detuser->rua = trim($request['rua']);
            $detuser->numero = trim($request['numero']);
            $detuser->bairro = trim($request['bairro']);
            $detuser->CEP = trim($request['cep']);
            $detuser->cidade = trim($request['cidade']);
            $detuser->UF = trim($request['uf']);
            $detuser->tel = trim($request['tel']);
            $detuser->cel = trim($request['cel']);
            $detuser->CPF = trim($request['cpf']);
            $detuser->RG = trim($request['rg']);
            $detuser->facebook = trim($request['facebook']);
            $detuser->twiter = trim($request['twiter']);
            $detuser->instagram = trim($request['instagram']);
            $detuser->instagram = trim($request['youtube']);
            $detuser->instagram = trim($request['instagram']);
            $detuser->foto = $path;
            $detuser->save();
            $mensagem="Usuário promovido a autor.";
            
            return redirect()->route('cad.usuario')->with('status', $mensagem);
    }
}
