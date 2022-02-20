@extends('templates.base')

@section('navbar')
<button type="button" class="btn btn-light btn-sm nav-link active" data-bs-toggle="modal" data-bs-target="#addPost">
  nova postagem
</button>
@endsection

@section('content')
{{-- Modal add post --}}
<div class="modal" tabindex="-1" id="addPost">
  <form method="post" action="{{ route('posts.new') }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">adicionar postagem</h5>
        </div>
        <div class="modal-body">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">título</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>

          <div class="mb-3">
            <label for="content" class="form-label">postagem</label>
            <textarea class="form-control" id="content" name="content"></textarea>
          </div>

          <div class="mb-3">
            <label for="subject" class="form-label">assunto</label>
            <select class="form-control" id="subject" name="subject">
              @foreach($subjects as $subject)
              <option value="{{ $subject->id }}"> {{$subject->name}}</li>
                @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
          <button type="submit" class="btn btn-primary">postar</button>
        </div>
      </div>
    </div>
  </form>
</div>

{{-- Gera os cards das postagens --}}
@if(isset($posts))
@foreach($posts as $post)
<a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: inherit">
  <div class="card" style="width: 80%; margin: auto; margin-bottom: 0.5rem">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{$post->user()->first()->username}}</h6>
      <h6 class="card-subtitle mb-2 text-muted">{{$post->subject()->first()->name}}</h6>
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
