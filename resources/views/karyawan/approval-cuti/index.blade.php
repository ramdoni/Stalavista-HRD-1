@extends('layouts.karyawan')

@section('title', 'Leave Employee')

@section('page-url', route('karyawan.approval.cuti.index'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NIk</th>
                <th>NAMA</th>
                <th>TANGGAL CUTI</th>
                <th>JENIS CUTI</th>
                <th>LAMA CUTI</th>
                <th>KEPERLUAN</th>
                <th>CREATED</th>
                <th>STATUS</th>
                <th>MANAGE</th>
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
                <td>{{ isset($item->cuti) ? $item->cuti->jenis_cuti : '' }}</td>
                <td>
                    {{ $item->total_cuti }}
                </td>
                <td>{{ $item->keperluan }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a onclick="detail_approval_cuti({{ $item->id }})">
                    @if($item->is_approved_atasan == 1)
                        @if($item->is_approved_personalia === NULL)
                            <label class="btn btn-warning btn-sm">Waiting Approval</label>
                        @endif
                        
                        @if($item->is_approved_personalia === 0) 
                            <label class="btn btn-danger btn-sm">Reject</label>
                        @endif

                        @if($item->is_approved_personalia == 1) 
                            <label class="btn btn-success btn-sm">Approved</label>
                        @endif
                    @else
                        @if($item->status == 1 and $item->is_approved_atasan === NULL)
                            <label class="btn btn-warning btn-sm">Waiting Approval Atasan</label>
                        @endif

                        @if($item->status == 3)
                            <label class="btn btn-danger btn-sm">Reject</label>
                        @endif
                        @if($item->status == 2)
                            <label class="btn btn-danger btn-sm">Approved</label>
                        @endif
                    @endif

                    </a>
                </td>
                <td>
                    @if($item->is_approved_personalia === NULL and $item->is_approved_atasan == 1)
                        <a href="{{ route('karyawan.approval.cuti.detail', ['id' => $item->id]) }}"> <i class="la la-arrow-right"></i> </a>
                    @endif
                </td>
            </tr>
          @endif
        @endforeach
        </tbody>
    </table>
</div>
@endsection
