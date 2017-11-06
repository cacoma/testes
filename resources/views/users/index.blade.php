@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <!-- <meta name="content" content="{{ csrf_token() }}"> -->
      <userlist></userlist>



  </div>
@endsection
