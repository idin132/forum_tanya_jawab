@extends('layouts.app')

@section('content')
<h1>Edit Answer</h1>

<form action="{{ route('questions.answers.update', [$answer->question->id, $answer->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="content">Answer</label>
        <textarea name="content" class="form-control" id="content" required>{{ $answer->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control-file" name="gambar" id="gambar">
        <small>*Upload untuk mengganti gambar</small>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection