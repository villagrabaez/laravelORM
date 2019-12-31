@extends('layout.app')

@section('title', 'Profile')

@section('content')
<div class="row">
  <div class="col-12 my-5 pt-3 shadow">
    <img src=" {{ $user->image->url }} " alt="User Avatar" class="float-left rounded-circle mr-2">
    <h1> Bienvenido: {{ $user->name }} </h1>
    <h5>{{ $user->email }}</h5>
    <p>
      <strong>Instagram:</strong> {{ $user->profile->instagram }} <br>
      <strong>Github:</strong> {{ $user->profile->github }} <br>
      <strong>Web:</strong> {{ $user->profile->web }} <br>
      <strong>País:</strong> {{ $user->location->country }} <br>
      <strong>Nivel:</strong> 
        @if( $user->level ) 
          <a href=" {{ route('level.show', $user->level_id) }} "> {{ $user->level->name }} </a> 
        @else 
          --- 
        @endif
    </p>
    <hr>
    <p>
      <strong>Grupos:</strong>
      @forelse( $user->groups as $group )
        <span class="badge badge-primary"> {{ $group->name }} </span>
      @empty
        <em>No tiene grupo</em>
      @endforelse
    </p>
  </div>
</div>

<div class="row mb-3">
  <div class="col-12">
    <h3>Posts</h3>
  </div>
</div><hr>

<div class="row">

  @foreach($posts as $post)
  <div class="col-md-6">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <span class="d-inline-block mb-2 text-primary">
          Categoria <b>{{ $post->category->name }}</b> |
          {{ $post->comments_count }} {{ Str::plural('comentario', $post->comments_count) }}
        </span>
        <h3 class="mb-0">{{ $post->title }}</h3>
        <div class="mb-1">
          @foreach ($post->tags as $tag)
              <span class="badge badge-warning">
                #{{ $tag->name }}
              </span>
          @endforeach
        </div>
      </div>
      <div class="col-auto d-none d-lg-block">
        <img class="bd-placeholder-img" width="200" src=" {{ $post->image->url }} " alt="">
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="row mb-3">
  <div class="col-12">
    <h3>Videos</h3>
  </div>
</div><hr>

<div class="row">

  @foreach($videos as $video)
  <div class="col-md-6">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <span class="d-inline-block mb-2 text-primary">
          Categoria <b>{{ $video->category->name }}</b> |
          {{ $video->comments_count }} {{ Str::plural('comentario', $video->comments_count) }}
        </span>
        <h3 class="mb-0">{{ $video->title }}</h3>
        <div class="mb-1">
          @forelse ($video->tags as $tag)
              <span class="badge badge-danger">
                #{{ $tag->name }}
              </span>
          @empty
              <em>No hay etiqutas</em>
          @endforelse
        </div>
      </div>
      <div class="col-auto d-none d-lg-block">
        <img class="bd-placeholder-img" width="200" src=" {{ $video->image->url }} " alt="">
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
