@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $question->title }} ({{ $question->category->name }})</h3>
    <h6>
        <span class="text-black p-1 rounded-circle">
            <i class="fa fa-user"></i>
        </span>
        <span style="color: blue;">{{ $question->user->name }}</span>
    </h6>
    <a href="{{ asset($question->gambar) }}" target="__blank" data-lightbox="gambar" data-title="Gambar">
        <img style="width: 100px; margin:20px; " src="{{ asset($question->gambar) }}" alt="Gambar">
    </a>


    <br>
    <p>{{ $question->content }}</p>
    <br>

    <h3>Jawaban</h3>

    @foreach ($question->answers as $answer)
    <div class="form-group border p-3 mb-3">
        <div class="answer">
            <p>
                <span class="text-black p-1 rounded-circle">
                    <i class="fa fa-user"></i>
                </span>
                <span style="color: blue;">{{ $answer->user->name }}</span>
            </p>
            <p>{{ $answer->content }}</p>
            <div>
                @if ($answer->gambar == null)
                -
                @else
                <img style="width: 100px; margin-bottom:20px; justify-content:end;" src="{{ asset('storage'.$answer->gambar) }}" alt="Gambar">
                @endif
            </div>
        </div>
        @if ($answer->user_id == Auth::user()->id)
        <hr>
        <div class="d-flex">
            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-primary btn-sm">Edit Jawaban</a>
            <form action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this answer?')" class="btn btn-danger btn-sm">Hapus Jawaban</button>
            </form>
        </div>
        @endif
    </div>
    @endforeach


    <h3>Tambahkan Jawaban</h3>

    <form action="{{ route('questions.answers.store', $question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control-file" name="gambar" id="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan Jawaban</button>
        <a href="{{ route('questions.index')}}" type="button" class="btn btn-primary">Kembali</a>
    </form>
</div>
@endsection