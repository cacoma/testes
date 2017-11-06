@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Cacoma</div>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
