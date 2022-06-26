@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <div class="card mb-5">
            {{Auth::user()->name}}
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $article->auther->email }}</h6>
                <p class="card-text"> {{ $article->content }} </p>
                @can('update', $article)
                    <a href="{{ route('articles.edit', $article->id) }}" class="card-link">Update</a>
                @endcan
                {!! Form::open(['route' => ['articles.destroy', $article->id ], 'method' => 'delete']) !!}
                    <button type="submit" class="btn btn-danger">DELETE</button>
                {!! Form::close() !!}
            </div>
        </div>
    @endforeach
@endsection
