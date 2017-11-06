@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Criar investimento</h2><br  />
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      <form method="post" action="{{ route('invests.store')}}">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="type">Tipo:</label><br>
              <input type="radio" name="type" value="1">Renda Fixa <br>
              <input type="radio" name="type" value="2">Renda Variavel <br>
              <input type="radio" name="type" value="3">Fundos <br>
              <!--
              <label for="type">Tipo:</label>
              <input type="text" class="form-control" name="type"> -->
              @switch(Request::get('type'))
                @case (1)
                  <div class="alert alert-success">
                    <p>Renda fixa!</p>
                  </div>
                  @break
                  @case (2)
                  <div class="alert alert-success">
                    <p>Renda Variavel!</p>
                  </div>
                  @break
                  @case (3)
                  <div class="alert alert-success">
                    <p>fundos!</p>
                  </div>
                  @break
                  @default
                  <div class="alert alert-error">
                    <p>ooops!</p>
                  </div>
                @endswitch
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Adicionar</button>
          </div>
        </div>
      </div>
      </form>
@endsection
