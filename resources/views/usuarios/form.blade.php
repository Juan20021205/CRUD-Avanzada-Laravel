<div class="row">
    <div class="col">
        <label for="Email" class="form-label mt-4">Email: </label>
        <input type="email" class="form-control" value="{{isset($usuarios->Email)?$usuarios->Email:' '}}" name="Email" id="Email"><br>
        <label for="Contraseña" class="form-label mt-4">Contraseña: </label>
        <input type="password" class="form-control" value="{{isset($usuarios->Contraseña)?$usuarios->Contraseña:''}}" name="Contraseña" id="Contraseña"><br>
        <label for="Nombre" class="form-label mt-4">Nombre: </label>
        <input type="text" class="form-control" value="{{isset($usuarios->Nombre)?$usuarios->Nombre:' '}}" name="Nombre" id="Nombre"><br>
        <label for="IdRol" class="form-label mt-4">Rol: </label>
        <select class="form-select" name="IdRol" aria-label="Default select example">
            @foreach($rol as $r)
            <option value="{{isset($r['Id']) ? $r['Id'] : ' '}}"
            <?=isset($IdRol)? ($r["Id"]== $IdRol ? 'selected' : '') : ''?>
            >{{$r->Nombre}}</option>
            @endforeach
        </select>
        <label for="IdEstado" class="form-label mt-4">Estado: </label>
        <select class="form-select" name="IdEstado" aria-label="Default select example">
            @foreach($estado as $e)
                <option value="{{isset($e['Id']) ? $e['Id'] : ' '}}"
                <?=isset($IdEstado)? ($e["Id"]== $IdEstado ? 'selected' : '') : ''?>
                >{{$e->Estado}}</option>
            @endforeach
        </select>   
        <label for="Foto" class="form-label mt-4">Foto: </label>
        {{isset($usuarios->Foto)?$usuarios->Foto:' '}}
        <input type="file" value="" name="Foto" class="form-control" id="Foto">
    </div>
</div><br>

<div class="col">
    <input type="submit" class="btn btn-primary " value="Enviar">
    <td scope="row"><a class="btn btn-danger" usuario="button" href="{{url('/usuarios/')}}">Cancelar</a>
