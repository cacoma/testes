@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Estado</th>
        <th colspan="2">Opção</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cities as $city)
      <tr>
        <td>{{$city['id']}}</td>
        <td>{{$city['name']}}</td>
        <td>{{$city['uf_id']}}</td>
        <td><a href="{{action('CityController@edit', $city['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('CityController@destroy', $city['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
      </tr>
      @endforeach
	  {{ $cities->links() }}
    </tbody>
  </table>
  </div>
@endsection
