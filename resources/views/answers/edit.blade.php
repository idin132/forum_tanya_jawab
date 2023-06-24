@extends('layouts.app')

@section('content')
<h1>Edit Answer</h1>

<form action="{{ route('questions.answers.update', [$answer->question->id, $answer->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <textarea name="content" class="form-control" id="content" required>{{ $answer->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection