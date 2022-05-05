@extends('layouts.app')
@section('content')

<div class="container">
    <td scope="row"><a class="btn btn-outline-dark" productos="button" href="{{url('/usuarios/'.'create')}}">Nuevo Usuario</a><br><br>
        <h2>Listado de Usuarioss</h2>
        <table class="table table-striped">
            <thead class="table table table-dark table-striped">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Acciones</th>
                </tr>

            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td scope="row">{{$usuario->Id}}</td>
                    <td scope="row">{{$usuario->Email}}</td>
                    <td scope="row">{{$usuario->Nombre}}</td>
                    <td scope="row">{{$usuario->Rol}}</td>
                    <td scope="row">{{$usuario->Estado}}</td>
                    <td scope="row"><img src="{{ asset('storage').'/'.$usuario->Foto }}" width="100px" class="img-fluid rounded-circle border border-5 border-light"></td>
                    <td scope="row"><a class="btn btn-warning" href="{{url('/usuarios/'.$usuario->Id.'/edit')}}">Editar</a>
                        <input type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" data-nombre="{{$usuario->Nombre}}" data-id="{{$usuario->Id}}" value="Borrar">
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
                                <form action="{{url('/usuarios',1)}}" id="formDelete" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" class="btn btn-danger" value="Borrar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="{{ asset('js/modal.js') }}"></script>
            </tbody>
        </table>
</div>
@endsection