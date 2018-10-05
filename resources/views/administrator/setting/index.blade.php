@extends('layouts.administrator')

@section('title', 'General Setting')

@section('sidebar')

@endsection

@section('page-title', 'General Setting')

@section('page-url', route('administrator.setting.index'))

@section('page-create', route('administrator.setting.create'))

@section('content')
<div class="table-responsive">
    <table id="data_table" class="table table-striped table-bordered " cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="30" class="text-center">#</th>
                <th>KEY</th>
                <th>VALUE</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>
                    <td>{{ $item->key }}</td>
                    <td>{{ $item->value }}</td>
                    <td>
                        <a href="{{ route('administrator.setting.edit', ['id' => $item->id]) }}"> <i class="la la-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection