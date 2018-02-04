@extends('layout')

@section('content')
<div class="container p-5">
  <form action="/create" method="POST">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $errors->has('title') ?  '' : old('title') }}">
      @if ($errors->has('title'))
        <span class="help-block">
          <p class="alert alert-danger mt-3">{{ $errors->first('title')}}</p>
        </span>
      @endif
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Write here..">
        {{ $errors->has('description') ?  '' : old('description') }}
      </textarea>
      @if ($errors->has('description'))
        <span class="help-block">
          <p class="alert alert-danger mt-3">{{ $errors->first('description')}}</p>
        </span>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
