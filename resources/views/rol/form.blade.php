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
        <label for="Nombre" class="form-label mt-4">Nombre rol: </label>
        <input type="text" class="form-control" value="{{isset($rol->Nombre)?$rol->Nombre:' '}}" name="Nombre" id="Nombre"><br><br>
        <div>
            <label for="Foto" class="form-label mt-4">Foto: </label>
            {{isset($rol->Foto)?$rol->Foto:' '}}
            <input type="file" value="" name="Foto" class="form-control" id="Foto">
        </div>
    </div>
</div><br>
<div class="col">
    <input type="submit" class="btn btn-primary " value="Enviar">
    <td scope="row"><a class="btn btn-danger" marca="button" href="{{url('/rol/')}}">Cancelar</a>
</div>