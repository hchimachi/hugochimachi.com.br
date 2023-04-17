<div class="container">
    <form action="{{ route('g.usuario')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(isset($upuser))
        <h2>Atualizar Cadastro</h2>
        {{$upuser->id}}
        <div class="row">
            <div class="col">
                <label>Usuário
                    <select class="form-control" name="userid">
                        <option value="{{$upuser->id}}">{{$upuser->name}}</option>
                    </select>

                </label>
            </div>
            <div class="col">
                <label>Nome Completo
                <input type="text" class="form-control" placeholder="Nome Completo" name="nomec" value="{{$upuser->nomecompleto}}"></label>
            </div>
        </div>
        
        @include('partes.cep')
        <div class="row">
            <div class="col">
                <label>Telefone
                <input type="text" class="form-control" placeholder="Telefone" name="tel" value="{{$upuser->tel}}" ></label>
            </div>
            <div class="col">
                <label>Celular
                <input type="text" class="form-control" placeholder="Celular" name="cel" value="{{$upuser->cel}}" ></label>
            </div>
            <div class="col">
                <label>CPF
                <input type="text" class="form-control" placeholder="CPF" name="cpf" value="{{$upuser->CPF}}" ></label>
            </div>
            <div class="col">
                <label>RG
                <input type="text" class="form-control" placeholder="RG" name="rg" value="{{$upuser->RG}}" ></label>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <label>Facebook
                <input type="text" class="form-control" placeholder="Facebook" name="facebook" value="{{$upuser->facebook}}" ></label>
            </div>
            <div class="col">
                <label>Twiter
                <input type="text" class="form-control" placeholder="Twiter" name="twiter" value="{{$upuser->twiter}}"></label>
            </div>
            <div class="col">
                <label>Instagram
                <input type="text" class="form-control" placeholder="Instagram" name="instagram" value="{{$upuser->instagram}}"></label>
            </div>
            <div class="col">
                <label>Youtube
                <input type="text" class="form-control" placeholder="Youtube" name="youtube" value="{{$upuser->name}}"></label>
            </div>
            
        </div>
        <div class="col">
                <label>Foto
                <input type="file" class="form-control" name="foto" multiple id="foto"
                </label>
               
        </div>
        <div class="col">
                <label>Tipo de usuário
                <select name="tipousuario">
                    <option value="">--Selecione--</option>
                </select>
                </label>
        </div>
        <input class="btn btn-primary" type="submit" value="Gravar">
    </form>
        @else
        <div class="bg-secondary rounded h-100 p-4">
        <h2>Novo Usuário</h2>
        <div class="row">
            <div class="col">
                Usuário pré cadastado?
                <div class="form-floating mb-3">
                    <select class="form-select" name="userid" aria-label="Floating label select example">
                        <option selected></option>
                            @if(isset($user))
                            @foreach($user as $user)
                                <option value="{{$user->id}}">{{$user->name}} email {{$user->email}}</option>
                            @endforeach
                            @endif    
                    </select>
                <label>--Selecione--</label>
                </div>
                
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="João">
                        <label>Nome</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                    <label>Email address</label>
                </div>
            </div>
            <div class="col">
                 <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Nome Completo" name="nomec">
                        <label>Nome Completo</label>
                </div>
            </div>
            
        </div>
        
        @include('partes.cep')
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Telefone" name="tel">
                        <label>Telefone</label>
                </div>
                
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Celular" name="cel">
                        <label>Celular</label>
                </div>
                
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="CPF" name="cpf">
                        <label>CPF</label>
                </div>
                
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="RG" name="rg">
                        <label>RG</label>
                </div>
                
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Facebook" name="facebook">
                        <label>Facebook</label>
                </div>
                
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Twiter" name="twiter">
                        <label>Twiter</label>
                </div>
               
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Instagram" name="instagram">
                        <label>Instagram</label>
                </div>
                
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"  placeholder="Youtube" name="youtube">
                        <label>Youtube</label>
                </div>
                
            </div>
            
        </div>
        <div class="row">
        <div class="col">
        <div class="form-floating mb-3">
                    <select class="form-select" name="tipouser" aria-label="Floating label select example">
                        <option selected></option>
                        <option value="0">Admin</option>
                        <option value="1">Autor</option>
                        <option value="2">Leitor</option>
                            
                    </select>
                <label>--Tipo de Usuario--</label>
                </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                    <input class="form-control form-control-sm bg-dark" type="file"name="foto" id="foto">
            </div>
                
        </div>
     
        </div>
        <input class="btn btn-primary" type="submit" value="Gravar">
    </form>
    </div>
        @endif
        
        
</div