@extends('layouts.karyawan')

@section('title', 'Exit Interview')

@if(cek_approval('exit_interview'))
    @section('page-create', route('karyawan.exit-interview.create'))
@endif

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>RESIGN DATE</th>
                <th>ALASAN PENGUNDURAN DIRI</th>
                <th>STATUS</th>
                <th>CREATED</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $no => $item)
            <tr>
                <td class="text-center">{{ $no+1 }}</td>    
                <td>{{ $item->resign_date }}</td>
                <td>
                    @if($item->exit_interview_reason == "")
                        {{ $item->other_reason }}
                    @else
                        {!! $item->exitInterviewReason->label !!}
                    @endif
                </td>
                <td><a onclick="status_approval_exit({{ $item->id }})"> {!! status_exit_interview($item->status) !!}</a></td>
                <td>{{ $item->created_at }}</td>
                <td>
                   <a href="{{ route('karyawan.exit-interview.detail', $item->id) }}"><i class="la la-search-plus"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
