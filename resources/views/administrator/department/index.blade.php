@extends('layouts.administrator')

@section('title', 'Department')

@section('sidebar')

@endsection

@section('page-title', 'Department')

@section('page-url', route('administrator.department.index'))

@section('page-create', route('administrator.department.create'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>DIRECTORATE</th>
                <th>DIVISION</th>
                <th>DEPARTMENT</th>
                <th>DESCRIPTION</th>
                <th>CREATED</th>
                <th>MANAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>    
                    <td>{{ (isset($item->directorate->name) ? $item->directorate->name : '-')  }}</td>                                                   
                    <td>{{ (isset($item->division->name) ? $item->division->name : '-') }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('administrator.department.edit', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                        <a href="{{ route('administrator.department.delete', ['id' => $item->id]) }}" onclick="return confirm('Delete this data ?')"><i class="la la-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
