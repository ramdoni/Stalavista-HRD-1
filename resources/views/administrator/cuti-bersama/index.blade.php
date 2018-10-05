@extends('layouts.administrator')

@section('title', 'National Leave')

@section('sidebar')

@endsection

@section('page-title', 'National Leave')

@section('page-url', route('administrator.cuti-bersama.index'))

@section('page-create', route('administrator.cuti-bersama.create'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="30" class="text-center">#</th>
                <th>LEAVE DATE</th>
                <th>TOTAL LEAVE</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>
                    <td>Dari tanggal : <strong>{{ $item->dari_tanggal }}</strong> sampai tanggal <strong>{{ $item->sampai_tanggal }}</strong></td>
                    <td>{{ $item->total_cuti }}</td>
                    <td>
                        <a href="{{ route('administrator.cuti-bersama.delete', $item->id) }}"><i class="la la-trash"></i> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
