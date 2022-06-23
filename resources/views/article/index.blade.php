@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <div class="card">
            {{Auth::user()->name}}
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                <p class="card-text"> {{ $article->content }} </p>
                <a href="{{ route('articles.edit', $article->id) }}" class="card-link">Update</a>
                {!! Form::open(['route' => ['articles.destroy', $article->id ], 'method' => 'delete']) !!}
                    <button type="submit" class="btn btn-danger">DELETE</button>
                {!! Form::close() !!}
            </div>
        </div>
    @endforeach
@endsection
