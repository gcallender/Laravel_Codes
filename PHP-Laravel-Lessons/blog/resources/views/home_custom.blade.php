{{--@extends('layouts.app_custom')--}}
@extends("admin.template.main_login")

@section('title', 'Home')

@section('content')

    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        Ya has ingresado!
    </div>

@endsection
