@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Question</h1>

    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category" id="category">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $question->category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $question->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" id="content" rows="5">{{ $question->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('questions.index')}}" type="button" class="btn btn-primary">Kembali</a>
    </form>
</div>
@endsection