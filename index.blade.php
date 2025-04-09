@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Create Article</a>

    @foreach ($articles as $article)
        <div class="card mb-3 p-3">
            <h3>{{ $article->title }}</h3>
            <p><strong>Category:</strong> {{ $article->category->name }}</p>
            <p>{{ Str::limit($article->content, 100) }}</p>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
