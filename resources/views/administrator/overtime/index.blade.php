@extends('layouts.administrator')

@section('title', 'Overtime Sheet - PT. Arthaasia Finance')

@section('sidebar')
@endsection

@section('page-title', 'Overtime Sheet')
@section('page-url', route('administrator.overtime.index'))

@section('content')
<div class="table-responsive">
    <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NIK</th> 
                <th>NAME</th> 
                <th>JABATAN</th>
                <th>DEPARTMENT</th>
                <th>STATUS</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
              @if(isset($item->user->nik))
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>
                    <td>{{ $item->user->nik }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->organisasi_job_role }}</td>
                    <td>{{ isset($item->user->department) ? $item->user->department->name : '' }}</td>
                    <td> 
                        @if($item->status == 1)
                            <a  onclick="status_approval_overtime({{ $item->id }})" class="btn btn-warning btn-xs">Proses</a>
                        @endif
                        @if($item->status == 2)
                            <a  onclick="status_approval_overtime({{ $item->id }})" class="btn btn-success btn-xs">Approved</a>
                        @endif
                        @if($item->status == 3)
                            <a  onclick="status_approval_overtime({{ $item->id }})" class="btn btn-danger btn-xs">Denied</a>
                        @endif
                    </td>
                    <td>
                        @if($item->is_approved_atasan === NULL)
                            <a href="{{ route('administrator.overtime.edit', $item->id) }}" class="btn btn-info btn-xs">proses <i class="fa fa-arrow-right"></i></a>
                        @else
                            <a href="{{ route('administrator.overtime.edit', $item->id) }}" class="btn btn-default btn-xs">detail <i class="fa fa-search-plus"></i></a>
                        @endif
                    </td>
                </tr>
              @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
