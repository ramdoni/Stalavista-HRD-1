@extends('layouts.administrator')

@section('title', 'Internal Memo / Info Marketing')

@section('page-create', route('administrator.internal-memo.create'))

@section('page-url', route('administrator.internal-memo.index'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>TITLE</th>
                <th>FILE</th>
                <th>DATE</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    @if(!empty($item->file))
                        <a href="{{ asset('storage/internal-memo/'.$item->file) }}" target="_blank"><i class="fa fa-link"></i></a></td>
                    @else
                        <label><i>empty</i></label>
                    @endif
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('administrator.internal-memo.edit', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                    <a href="{{ route('administrator.internal-memo.destroy', ['id' => $item->id]) }}"><i class="la la-trash"></i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection
