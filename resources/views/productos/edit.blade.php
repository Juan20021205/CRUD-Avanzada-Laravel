@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="width: 35rem;">
        <div class="card-body">

            <h5 class="card-tittle">Editar Producto</h5>
            <form action="{{url('/productos/'.$productos->Id)}}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                {{method_field('PATCH')}}
                @include('productos.form')
            </form>
        </div>
    </div>
</div>
@endsection