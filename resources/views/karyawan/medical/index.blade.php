@extends('layouts.karyawan')

@section('title', 'Medical Reimbursement')

@section('page-url', route('karyawan.medical.index'))

@if(cek_approval('medical_reimbursement'))
    @section('page-create', route('karyawan.medical.create'))
@endif

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NIK</th>
                <th>NAMA KARYAWAN</th>
                <th>JABATAN</th>
                <th>CABANG  / DEPARTMENT</th>
                <th>TANGGAL PENGAJUAN</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
             @if(isset($item->user->nik))
                <tr>
                    <td class="text-center">{{ $no+1 }}</td> 
                    <td>{{ $item->user->nik }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->nama_jabatan }}</td>
                    <td>{{ isset($item->user->department->name) ? $item->user->department->name : '' }}</td>
                    <td>{{ date('d F Y', strtotime($item->tanggal_pengajuan)) }}</td>
                    <td>
                        <a onclick="status_approval_medical({{ $item->id }})"> 
                        {!! status_medical($item->status) !!}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('karyawan.medical.edit', ['id' => $item->id]) }}"><i class="la la-search-plus"></i></a>
                    </td>
                </tr>
             @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
