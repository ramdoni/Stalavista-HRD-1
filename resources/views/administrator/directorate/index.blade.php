@extends('layouts.administrator')

@section('title', 'Directorate')

@section('sidebar')

@endsection

@section('page-title', 'Directorate')

@section('page-url', route('administrator.directorate.index'))

@section('page-create', route('administrator.directorate.create'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>CREATED</th>
                <th>MANAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('administrator.directorate.edit', ['id' => $item->id]) }}"><i class="la la-search-plus"></i></a>
                        <a href="{{ route('administrator.directorate.delete', ['id' => $item->id]) }}"><i class="la la-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
