@extends('layouts.app')

@section('content')

<a href="{{ route('cat.create')}}" style="font-size: 20px; margin-bottom:10px; margin-top:10px;" class="btn btn-success">
    <i class="fa fa-plus" style="margin-right: 6px;"></i>Tambah Data
</a>

<table id="table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cat as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <form action="{{ route('cat.destroy', $item->id) }} " method="post">
                    @csrf
                    @method('DELETE')
                    <button style="font-size: 12px" type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('table').DataTable();
    });
</script>


@endsection