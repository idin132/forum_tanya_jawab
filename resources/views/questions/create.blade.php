@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Question</h1>

    <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control js-example-basic-single" name="category" id="category" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control-file" name="gambar" id="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('questions.index')}}" type="button" class="btn btn-primary">Kembali</a>
    </form>
</div>
@endsection
@section('scripts')
    @parent
    <script>$(document).ready(function() {
        $('.js-example-basic-single').select2();
    });</script>
@endsection