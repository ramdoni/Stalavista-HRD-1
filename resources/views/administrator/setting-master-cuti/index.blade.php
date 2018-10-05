@extends('layouts.administrator')

@section('title', 'Leave Setting')

@section('sidebar')

@endsection

@section('page-title', 'Cuti / Izin Karyawan')

@section('page-url', route('administrator.setting-master-cuti.index'))

@section('page-create', route('administrator.setting-master-cuti.create'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="30" class="text-center">#</th>
                <th>LEAVE</th>
                <th>KUOTA</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>
                    <td>{{ $item->jenis_cuti }}</td>
                    <td>{{ $item->kuota }}</td>
                    <td>
                        <a href="{{ route('administrator.setting-master-cuti.edit', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                        <a href="{{ route('administrator.setting-master-cuti.delete', ['id' => $item->id]) }}" onclick="return confirm('Hapus data ini?')"><i class="la la-trash"></i></a>                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection