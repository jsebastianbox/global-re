@extends('admin.layout')
@section('content')

<!-- Lista -->

<div id="list_view" style="display: none">
    @include('admin.cartera.borderaux.listado')
</div>

<!-- Manejo -->

<div id="management_view" style="display: initial">
    @include('admin.cartera.borderaux.manejo')
</div>

@endsection
