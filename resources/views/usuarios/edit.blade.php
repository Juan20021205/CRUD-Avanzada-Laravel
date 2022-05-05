@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="width: 35rem;">
        <div class="card-body">

            <h5 class="card-tittle">Editar Usuario</h5>
            <form action="{{url('/usuarios/'.$usuarios->Id)}}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                {{method_field('PATCH')}}
                @include('usuarios.form')
            </form>
        </div>
    </div>
</div>
@endsection