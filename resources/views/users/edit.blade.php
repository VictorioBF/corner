@extends('templates.base')
@section('content')

<div class="card" style="width: 80%; margin: auto; margin-bottom: 0.5rem; padding: 1rem">
  <form method="post" action="{{ route('users.update', Auth::user()->id) }}">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="name" class="form-label">nome</label>
      <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">e-mail</label>
      <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">senha</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="mb-3">
      <a type="submit" role="button" class="btn btn-danger" href="{{ route('users.profile', Auth::user()->id) }}">voltar</a>
      <button type="submit" class="btn btn-primary">editar</button>
    </div>
  </form>
</div>
@endsection
