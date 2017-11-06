@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard admin Cacoma</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bem vindo!<br>
                    Investimentos:
                    <li><a href="{{ route('invests.index') }}">Index</a></li>
                    <li><a href="{{ route('invests.create') }}">Criar</a></li>
                    <br>
                    Usuarios:
                    <li><a href="{{ route('users.index') }}">Index</a></li>
                    <li><a href="{{ route('users.create') }}">Criar</a></li>
					<br>
                    Cidades:
                    <li><a href="{{ route('cities.index') }}">Index</a></li>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection