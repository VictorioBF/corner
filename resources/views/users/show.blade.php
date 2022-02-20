@extends('templates.base')
@section('content')
{{-- alert --}}
@if(isset($msg))
<div class="alert alert-danger" role="alert">
  {{$msg}}
</div>
@endif
{{-- modal delete user --}}
<div class="modal" tabindex="-1" id="deleteUser">
  <form method="post" action="{{ route('users.delete', Auth::user()->id) }}">
    @csrf
    @method('delete')
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">apagar usuário?</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="password" class="form-label">senha</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">cancelar</button>
          <button type="submit" class="btn btn-danger">apagar</button>
        </div>
      </div>
    </div>
  </form>
</div>
{{-- info perfil --}}
<div class="card" style="width: 80%; margin: auto; margin-bottom: 0.5rem">
  <div class="card-body container">
    <div class="row">
      <div class="col-10">
        <h5 class="card-title">Nome: {{$user->name}} @if($user->admin == 1) ADMIN @endif</h5>
        <h6 class="card-subtitle mb-2 text-muted">Username: {{$user->username}}</h6>
        <h6 class="card-subtitle mb-2 text-muted">E-mail: {{$user->email}}</h6>
      </div>
      <div class="col-2">
        @if(Auth::user()->id == $user->id)
        <a class="btn btn-primary btn-sm" role="button" href="{{ route('users.edit', Auth::user()->id) }}" style="float: right">editar</a>
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUser" style="float: right">
          apagar
        </button>
        @endif
      </div>
    </div>
  </div>
</div>
{{-- posts --}}
@if($posts)
@foreach($posts as $post)
<a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: inherit">
  <div class="card" style="width: 75%; margin: auto; margin-bottom: 0.5rem">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{$post->user_id}}</h6>
      <p class="card-text">{{$post->content}}</p>
      @if(Auth::user())
      @if((Auth::user()->admin == 1) or (Auth::user()->id == $post->user_id))
      <a href="{{ route('posts.delete', $post) }}" class="btn btn-danger btn-sm" role="button"><i class="bi bi-trash"></i>apagar</a>
      @endif
      @endif
    </div>
  </div>
</a>
@endforeach
@endif
@endsection
