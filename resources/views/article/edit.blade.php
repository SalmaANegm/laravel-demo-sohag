@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
    <button type="submit" class="btn btn-danger">DELETE</button>
    {!! Form::close() !!}

    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
    
    {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT']) !!}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Content</label>
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 5]) !!}
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    {!! Form::close() !!}
@endsection
