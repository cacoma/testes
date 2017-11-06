@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registre-se</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Sobrenome</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">Sexo</label>

                            <div class="radio col-md-2">
                              <label><input type="radio" name="sex" value="m">Masculino</label>
                                </div>
                                <div class="radio col-md-2">
                                  <label><input type="radio" name="sex" value="f">Feminino</label>
                                </div>
                                <div class="radio col-md-2 disabled">
                                  <label><input type="radio" name="sex" disabled>LGBT</label>
                                </div>
                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Data de nascimento</label>

                            <div class="col-md-6">
              								<!-- <input type="date" class="col-md-6 form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}"/> -->
                              <!-- <input type="text" name="txtday" placeholder="DD"value=""/>
                              <input type="text" name="txtmonth" placeholder="MM"value=""/>
                              <input type="text" name="txtyear" placeholder="YYYY"value=""/> -->
                              <input type='text' class="form-control" id="birthdate" value="{{old('birthdate')}}" name="birthdate"/>
                             </div>
                           @if ($errors->has('birthdate'))
                           <br>
                               <span class="help-block">
                                   <strong>{{ $errors->first('birthdate') }}</strong>
                               </span>
                           @endif
                   </div>

                        <div class="form-group{{ $errors->has('etnia') ? ' has-error' : '' }}">
                            <label for="etnia" class="col-md-4 control-label">Etnia</label>
                                <div class="col-md-6">
                                    <select class="col-md-6 form-control" name="etnia">
                                      <option></option>
                                      <option value="branca">Branca</option>
                                      <option value="parda">Parda</option>
                                      <option value="preto">Preto</option>
                                      <option value="amarela">Amarela</option>
                                      <option value="indigena">Indígena</option>
                                    </select>
                                  </div>
                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('etnia') }}</strong>
                                    </span>
                                @endif
                        </div>

						<div class="form-group{{ $errors->has('estado_civil') ? ' has-error' : '' }}">
                            <label for="estado_civil" class="col-md-4 control-label">Estado civil</label>
                                <div class="col-md-6">
									<select class="col-md-6 form-control" name="estado_civil">
                                      <option></option>
                                      <option value="Solteiro(a)">Solteiro(a)</option>
                                      <option value="Casado(a)">Casado(a)</option>
                                      <option value="Divorciado(a)">Divorciado(a)</option>
                                      <option value="Viúvo(a)">Viúvo(a)</option>
                                      <option value="Separado(a)">Separado(a)</option>
                                    </select>
                                  </div>
                                @if ($errors->has('estado_civil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('estado_civil') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">

                             <!-- <input class="typeahead form-control col-md-6" type="text" name="cidade" value="{{ old('cidade') }}">
							<input type="text" name="search_text" class="form-control" id="search_text" placeholder="Cidade">
							-->
							<autocompletecities></autocompletecities>

							@if ($errors->has('cidade'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cidade') }}</strong>
                                      </span>
                             @endif
							 @if ($errors->has('uf'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('uf') }}</strong>
                                </span>
                             @endif
								@if ($errors->has('pais'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('pais') }}</strong>
                                </span>
                            @endif
						</div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Endereco de E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme sua senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Aceito os <a href="http://xvideos.com" target="_blank">termos de uso:</a></label>

                              <div class="col-md-6">
                                <label class="radio-inline"><input type="radio" name="optradio" value="S">Sim</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="N">Nao</label>
								@if ($errors->has('optradio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('optradio') }}</strong>
                                    </span>
                                @endif
                                </div>
                              </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registre-se
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
