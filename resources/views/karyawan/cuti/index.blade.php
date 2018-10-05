@extends('layouts.karyawan')

@section('title', 'Leave Employee')

@if(cek_approval('cuti_karyawan'))
    @section('page-create', route('karyawan.cuti.create'))
@endif

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>TANGGAL CUTI / IJIN</th>
                <th>JENIS CUTI / IJIN</th>
                <th>LAMA CUTI</th>
                <th>KEPERLUAN</th>
                <th>STATUS</th>
                <th>CREATED</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>   
                    <td>{{ date('d F Y', strtotime($item->tanggal_cuti_start)) }} - {{ date('d F Y', strtotime($item->tanggal_cuti_end)) }}</td>
                    <td>{{ isset($item->cuti) ? $item->cuti->jenis_cuti : '' }}</td>
                    <td>{{ $item->total_cuti }} Hari</td>
                    <td>{{ $item->keperluan }}</td>
                    <td>
                        <a onclick="detail_approval_cuti('cuti', {{ $item->id }})"> 
                            {!! status_cuti($item->status) !!}
                        </a>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('karyawan.cuti.edit', ['id' => $item->id]) }}"> <i class="la la-search-plus"></i> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection