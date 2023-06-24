@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Pertanyaan</h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="{{ route('questions.create') }}">Buat Pertanyaan</a>
            </div>
        </div>

        @php
            $selectedCategory = request('category');
        @endphp

        <form action="{{ route('questions.index') }}" method="GET" class="mb-4">
            <div class="form-group">
                <label for="category">Filter berdasarkan kategori:</label>
                <select class="form-control" name="category" id="category">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>



        @foreach ($questions as $question)
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">{{ $question->title }} ({{ $question->category->name }})</h3>
                    <p class="card-text">{{ $question->content }}</p>
                    <p>
                        <span class="text-black p-1 rounded-circle">
                            <i class="fa fa-user"></i>
                        </span>
                        <span style="color: blue;">{{ $question->user->name }}</span>
                    </p>
                    <td>
                        @if ($question->gambar == null)
                            -
                        @else
                            <a href="{{ asset($question->gambar) }}" target="__blank" data-lightbox="gambar"
                                data-title="Gambar">
                                <img style="width: 100px; margin-bottom:20px;" src="{{ asset($question->gambar) }}"
                                    alt="Gambar">
                            </a>
                        @endif
                    </td>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary">Lihat Jawaban</a>
                        @if (auth()->check() && $question->user_id === auth()->id())
                            <div>
                                <a href="{{ route('questions.edit', $question->id) }}"
                                    class="btn btn-secondary mr-2">Edit</a>
                                <form action="{{ route('questions.destroy', $question->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
