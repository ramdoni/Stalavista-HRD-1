@extends('layouts.administrator')

@section('title', 'Reasons for Resignation')

@section('sidebar')

@endsection

@section('page-title', 'Reasons for Resignation')

@section('page-url', route('administrator.alasan-pengunduran-diri.index'))

@section('page-create', route('administrator.alasan-pengunduran-diri.create'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>LABEL</th>
                <th>CREATED</th>
                <th>MANAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>   
                    <td>{{ $item->label }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('administrator.alasan-pengunduran-diri.edit', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                        <a href="{{ route('administrator.alasan-pengunduran-diri.delete', ['id' => $item->id]) }}"><i class="la la-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
