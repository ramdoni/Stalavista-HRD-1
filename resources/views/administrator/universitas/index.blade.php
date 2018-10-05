@extends('layouts.administrator')

@section('title', 'Perguruan Tinggi')

@section('sidebar')

@endsection

@section('page-title', 'Perguruan Tinggi')

@section('page-url', route('administrator.universitas.index'))

@section('page-create', route('administrator.universitas.create'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NAMA PERGURUAN TINGGI</th>
                <th>KETERANGAN</th>
                <th>CREATED</th>
                <th>MANAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>   
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('administrator.universitas.edit', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                        <a href="{{ route('administrator.universitas.delete', ['id' => $item->id]) }}"><i class="la la-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection