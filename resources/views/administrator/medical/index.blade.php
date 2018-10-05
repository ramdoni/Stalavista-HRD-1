@extends('layouts.administrator')

@section('title', 'Medical Reimbursement')

@section('sidebar')

@endsection

@section('page-title', 'Medical Reimbursement')

@section('page-url', route('administrator.medical.index'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NIK</th>
                <th>NAME</th>
                <th>JABATAN</th>
                <th>CABANG  / DEPARTMENT</th>
                <th>TANGGAL PENGAJUAN</th>
                <th>STATUS</th>
                <th>MANAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
             @if(isset($item->user->name))
                <tr>
                    <td class="text-center">{{ $no+1 }}</td> 
                    <td>{{ $item->user->nik }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->organisasi_job_role }}</td>
                    <td>{{ (isset($item->user->department->name) ? $item->user->department->name : '') }}</td>
                    <td>{{ date('d F Y', strtotime($item->tanggal_pengajuan)) }}</td>
                    <td>
                        <a onclick="status_approval_medical({{ $item->id }})"> 
                        {!! status_medical($item->status) !!}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('administrator.medical.edit', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"><i class="fa fa-search-plus"></i> detail</button></a>
                        <form action="{{ route('administrator.medical.destroy', $item->id) }}" onsubmit="return confirm('Hapus data ini?')" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}                                               
                            <button type="submit" class="btn btn-danger btn-xs m-r-5"><i class="ti-trash"></i> delete</button>
                        </form>
                    </td>
                </tr>
              @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
