@extends('layouts.administrator')

@section('title', 'Exit Interview - PT. Arthaasia Finance')

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
                <th>DEPARTMENT / POSITION</th>
                <th>RESIGN DATE</th>
                <th>ALASAN PENGUNDURAN DIRI</th>
                <th>STATUS</th>
                <th width="100">MANAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
              @if(isset($item->user->name))
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>    
                    <td>{{ $item->user->nik }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ (isset($item->user->department->name) ? $item->user->department->name : '')  .' / '. (isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name : '') }}</td> 
                    <td>{{ $item->resign_date }}</td>
                    <td>
                        @if($item->exit_interview_reason == "")
                            {{ $item->other_reason }}
                        @else
                            {!! $item->exitInterviewReason->label !!}
                        @endif
                    </td>
                    <td>
                        <a onclick="status_exit_interview({{ $item->id }})"> 
                            @if($item->status == 1)
                                <label class="btn btn-warning btn-xs">Waiting Approval</label>
                            @endif
                            @if($item->status == 2)
                                <label class="btn btn-success btn-xs">Approved</label>
                            @endif
                            @if($item->status == 3)
                                <label class="btn btn-danger btn-xs">Denied</label>
                            @endif
                        </a>
                    </td>
                    <td>
                        @if($item->status == 1)
                        <a href="{{ route('administrator.exit-interview.detail', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"><i class="fa fa-arrow-right"></i> proses</button></a>
                        @else
                        <a href="{{ route('administrator.exit-interview.detail', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"><i class="fa fa-arrow-right"></i> detail</button></a>
                        @endif
                    </td>
                </tr>
              @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
