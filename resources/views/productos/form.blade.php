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
        <label for="NombreProduc" class="form-label mt-4">Producto: </label>
        <input type="text" class="form-control" value="{{isset($productos->NombreProduc)?$productos->NombreProduc:' '}}" name="NombreProduc" id="NombreProduc"><br>
        <label for="Costo" class="form-label mt-4">Costo: </label>
        <input type="number" class="form-control" value="{{isset($productos->Costo)?$productos->Costo:' '}}" name="Costo" id="Costo"><br>
        <label for="Precio" class="form-label mt-4">Precio: </label>
        <input type="number" class="form-control" value="{{isset($productos->Precio)?$productos->Precio:' '}}" name="Precio" id="Precio"><br>
        <label for="Cantidad" class="form-label mt-4">Cantidad: </label>
        <input type="number" class="form-control" value="{{isset($productos->Cantidad)?$productos->Cantidad:' '}}" name="Cantidad" id="Cantidad"><br>
        <label for="IdMarca" class="form-label mt-4">Marca: </label>
        <select class="form-select" name="IdMarca" aria-label="Default select example">
            @foreach($marcas as $m)
            <option value="{{isset($m['Id']) ? $m['Id'] : ' '}}" 
            <?=isset($IdMarca)? ($m["Id"]== $IdMarca ? 'selected' : '') : ''?>>{{$m->NombreMarca}}</option>
            @endforeach
        </select>
        <label for="Foto" class="form-label mt-4">Foto: </label>
        {{isset($productos->Foto)?$productos->Foto:' '}}
        <input type="file" value="" name="Foto" class="form-control" id="Foto">
    </div>
</div><br>

<div class="col">
    <input type="submit" class="btn btn-primary " value="Enviar">
    <td scope="row"><a class="btn btn-danger" producto="button" href="{{url('/productos/')}}">Cancelar</a>
</div>