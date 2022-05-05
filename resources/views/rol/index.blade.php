@extends('layouts.app')
@section('content')

<div class="container">
    <td scope="row"><a class="btn btn-outline-dark" rol="button" href="{{url('/rol/'.'create')}}">Nuevo Rol</a><br><br>

        <h2>Listado Rol</h2>
        <table class="table table-striped">
            <thead class="table table table-dark table-striped">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Acciones</th>
                </tr>

            </thead>
            <tbody>
                @foreach($rol as $rol)
                <tr>
                    <td scope="row">{{$rol->Id}}</td>
                    <td scope="row">{{$rol->Nombre}}</td>
                    <td scope="row"><img src="{{ asset('storage').'/'.$rol->Foto }}" width="100px" class="img-fluid rounded-circle border border-5 border-light"></td>
                    <td scope="row"><a class="btn btn-warning" href="{{url('/rol/'.$rol->Id.'/edit')}}">Editar</a>
                    <input type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" 
                    data-nombre="{{$rol->Nombre}}" data-id="{{$rol->Id}}" value="Borrar">
                    </td>
                </tr>
                @endforeach
                @if(Session::has('msg'))
                <div class="alert alert-primary" style="width: 1115px;" role="alert">
                    <strong>
                        {{Session::get('msg')}}
                    </strong>
                </div>
                @endif
            </tbody>
        </table>
        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>¿Desea eliminar la información?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="{{url('/rol',0)}}" id="formDelete" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="submit" class="btn btn-danger" value="Borrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/modal.js') }}" ></script>
</div>
@endsection