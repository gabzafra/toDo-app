@extends('layout')

@section('content')
  <h1 id="title">My Todos</h1>
  @if (session('success'))
      <p class="alert alert-success">{{ session('success') }}</p>
  @endif
  @if (count($todos) < 1)
    <p class="alert alert-success">You have no tasks on your list</p>
  @else
    <ul class="list-group mt-3">
      @foreach ($todos as $todo)
        <li class="list-group-item"><a href="#{{ $todo->id }}">{{ $todo->title }}</a>
          </li>
      @endforeach
    </ul>
  @endif
  <a href="/create" class="btn btn-primary mt-3">Add todo</a>
  <hr>
  @foreach ($todos as $todo)
    <div id="{{ $todo->id }}" class="container border rounded mb-3">
      <h2 class="border-bottom">{{ $todo->title }}<a href="#title" style="text-decoration: none; position: absolute; transform: rotate(-90deg);">></a><a href="/remove/{{ $todo->id }}" class="btn btn-sm btn-danger float-right mt-1">Remove from list</a></h2>
      <p>{{ $todo->description }}</p>
    </div>
  @endforeach
@endsection
