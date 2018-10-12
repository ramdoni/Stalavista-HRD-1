@extends('layouts.karyawan')

@section('title', 'Leave Employee')

@section('page-url', route('karyawan.approval.cuti-atasan.index'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NIK</th>
                <th>NAME</th>
                <th>TANGGAL CUTI</th>
                <th>JENIS CUTI</th>
                <th>LAMA CUTI</th>
                <th>KEPERLUAN</th>
                <th>CREATED</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $no => $item)
          @if(isset($item->karyawan->nik))
            <tr>
                <td class="text-center">{{ $no+1 }}</td>    
                <td>{{ $item->karyawan->nik }}</td>
                <td>{{ $item->karyawan->name }}</td>
                <td>{{ date('d F Y', strtotime($item->tanggal_cuti_start)) }} - {{ date('d F Y', strtotime($item->tanggal_cuti_end)) }}</td>
                <td> 
                    {{ isset($item->cuti) ? $item->cuti->jenis_cuti : '' }}</td>
                </td>
                <td>
                    {{ $item->total_cuti }}
                </td>
                <td>{{ $item->keperluan }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a onclick="detail_approval_cuti({{ $item->id }})">
                        @if($item->is_approved_atasan === NULL)
                            <label class="btn btn-warning btn-sm">Waiting Approval</label>
                        @elseif($item->is_approved_atasan == 0)
                            <label class="btn btn-danger btn-sm">Reject</label>
                        @else 
                            <label class="btn btn-success btn-sm">Approved</label>
                        @endif
                    </a>
                </td>
                <td>
                    @if($item->is_approved_atasan ===NULL)
                        <a href="{{ route('karyawan.approval.cuti-atasan.detail', ['id' => $item->id]) }}"><i class="la la-arrow-right"></i></a>
                    @endif
                </td>
            </tr>
          @endif
        @endforeach
        </tbody>
    </table>
</div>
@endsection
