@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card" style="width: 35rem;">
        <div class="card-body">

            <h5 class="card-tittle">Registrar marca</h5>
            <form action="{{url('/marca')}}" method="post" enctype="multipart/form-data" class="p-4">
                @csrf
                @include('marca.form')
            </form>
        </div>

    </div>

</div>
@endsection