

<form method="POST" action="{{Route('g.artigo')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <label>Categoria
                <select class="form-control" name="categoria">
                    <option value=''>--Selecione--</option>
                        @if(isset($cat))
                            @foreach($cat as $cat)
                                <option value="{{$cat->id}}">{{$cat->categoria}}</option>
                            @endforeach
                        @endif
                </select>
            </label>
        </div>
        <div class="col">
            <label>Categoria - Nova
            <input type="text" class="form-control" placeholder="Nova categoria" name="ncategoria"></label>
        </div>
        <div class="col">
            <label>Foto
                <input type="file" class="form-control" name="foto" multiple id="foto"
            </label>
        </div>
        <div class="col">
            <label>Data de Publicação
            <input type="date" class="form-control" placeholder="Quando publicar?" name="datapub"></label>
            </div><div class="col">
            <label>Hora da Publicação
            <input type="time" class="form-control" placeholder="Quando publicar?" name="horapub"></label>
        </div>
    </div>
  
<div class="row">
    <input type="text" class="form-control" name="titulo">
</div>
<div class="row">
    @include('components.tinymce-editor')
</div>
<input type="submit" value="Gravar" class="btn btn-primary">
</form>