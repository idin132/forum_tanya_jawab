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

  
@endsection