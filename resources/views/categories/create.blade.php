@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 40rem;">
                <div class="card-header">
                    <div class="card-body">
                        <form action="{{ route('cat.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="name">{{ __('Nama Kategori') }}</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Tambah</button>
                            <a href="{{ route('cat.index') }}" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection