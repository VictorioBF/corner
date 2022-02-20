@extends('templates.base')
@section('content')
{{-- modal novo comentário --}}
<div class="modal" tabindex="-1" id="addComment">
  <form method="post" action="{{ route('comments.new') }}">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">adicionar comentário</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="content" class="form-label">comentário</label>
            <textarea class="form-control" id="content" name="content"></textarea>
            <input type="number" value="{{$post->id}}" style="display: none" id="post_id" name="post_id">
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
{{-- postagem --}}
<div class="card" style="width: 80%; margin: auto">
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$post->user()->first()->username}}</h6>
    <p class="card-text">{{$post->content}}</p>
    @if(Auth::user())
    @if((Auth::user()->admin == 1) or (Auth::user()->id == $post->user_id))
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePost" style="float: right" href="#">
      apagar
    </button>
    @endif
    @endif
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addComment">
      comentar
    </button>
  </div>
</div>
{{-- modal delete post --}}
<div class="modal" tabindex="-1" id="deletePost">
  <form method="post" action="{{ route('posts.delete', $post) }}">
    @csrf
    @method('delete')
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">apagar postagem?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">cancelar</button>
          <button type="submit" class="btn btn-danger">apagar</button>
        </div>
      </div>
    </div>
  </form>
</div>
{{-- comentários --}}
@if($comments)
@foreach($comments as $comment)
<div class="card" style="width: 75%; margin: auto; margin-top: 0.5rem">
  <div class="card-body">
    <h5 class="card-title">
      {{$comment->user()->first()->name}}
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
      {{$comment->user()->first()->username}}
    </h6>
    <p class="card-text">{{$comment->content}}</p>
    @if(Auth::user())
    @if((Auth::user()->admin == 1) or ($comment->user_id == Auth::user()->id))
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteComment" style="float: right">
      apagar
    </button>
    @endif
    @endif
  </div>
</div>
{{-- modal delete comment --}}
<div class="modal" tabindex="-1" id="deleteComment">
  <form method="post" action="{{ route('comments.delete', $comment) }}">
    @csrf
    @method('delete')
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">apagar comentário?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">cancelar</button>
          <button type="submit" class="btn btn-danger">apagar</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endforeach
@endif
@endsection
