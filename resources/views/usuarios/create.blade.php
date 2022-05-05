@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="width: 35rem;">
        <div class="card-body">
            <h5 class="card-tittle">Registrar Usuario</h5>
            <form action="{{url('/usuarios')}}" method="post" enctype="multipart/form-data" class="p-4">
                @csrf
                @include('usuarios.form')
            </form>
        </div>
    </div>
</div>
@endsection