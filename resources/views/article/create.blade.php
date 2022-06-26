@extends('layouts.app')

@section('title')
    New Post
@endsection

@section('content')

@foreach ($errors->all() as $error)
    {{ $error }} <br>
@endforeach

{!! Form::open(['route' => 'articles.store']) !!}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    {{$errors->first('title')}}
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Content</label>
    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 5]) !!}
    {{$errors->first('content')}}
  </div>
  <button type="submit" class="btn btn-primary">ADD</button>
{!! Form::close() !!}
@endsection