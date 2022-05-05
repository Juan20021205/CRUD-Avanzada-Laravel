@if(count($errors)>0)
@foreach($errors->all() as $e)
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        {{$e}}
    </div>
</div>
@endforeach
@endif
<div class="row">
    <div class="col">
        <label for="Nombre" class="form-label mt-4">Nombre marca: </label>
        <input type="text" class="form-control" value="{{isset($marca->NombreMarca)?$marca->NombreMarca:' '}}" name="NombreMarca" id="NombreMarca"><br>
        <label for="Descripcion" class="form-label mt-4">Descripcion: </label>
        <input type="text" class="form-control" value="{{isset($marca->Descripcion)?$marca->Descripcion:' '}}" name="Descripcion" id="Descripcion"><br><br>
        <label for="Foto" class="form-label mt-4">Foto: </label>
        {{isset($marca->Foto)?$marca->Foto:' '}}
        <input type="file" value="" name="Foto" class="form-control" id="Foto">
    </div>
</div><br>
<div class="col">
    <input type="submit" class="btn btn-primary " value="Enviar">
    <td scope="row"><a class="btn btn-danger" marca="button" href="{{url('/marca/')}}">Cancelar</a>
</div>