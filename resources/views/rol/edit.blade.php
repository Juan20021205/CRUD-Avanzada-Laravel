@extends('layouts.app')
@section('content')  
<div class="container">
    <div class="card" style="width: 35rem;">
        <div class="card-body">
            <h5 class="card-tittle">Editar rol</h5>
            <form action="{{url('/rol/'.$rol->Id)}}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                {{method_field('PATCH')}}
                @include('rol.form')                
            </form>
        </div>   
    </div>
</div>
@endsection