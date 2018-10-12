@extends('layouts.administrator')

@section('title', 'News')

@section('page-url', route('administrator.news.index'))

@section('page-create', route('administrator.news.create'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>TITLE</th>
                <th>DATE</th>
                <th>STATUS</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{!! $item->status == 1 ? '<label class="btn btn-success btn-sm">Publish</label>' : '<label class="btn btn-danger btn-sm">Draft</label>' !!}</td>
                <td>
                    <a href="{{ route('administrator.news.edit', ['id' => $item->id]) }}"> <i class="la la-edit"></i> </a>
                    <a href="{{ route('administrator.news.destroy', ['id' => $item->id]) }}" onclick="return confirm('Delete this data ?')"> <i class="la la-trash"></i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection
