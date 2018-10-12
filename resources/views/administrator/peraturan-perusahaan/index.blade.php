@extends('layouts.administrator')

@section('title', 'Product Information')

@section('page-url', route('administrator.peraturan-perusahaan.index'))

@section('page-create', route('administrator.peraturan-perusahaan.create'))

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
                        <a href="{{ asset('storage/peraturan-perusahaan/'.$item->file) }}" target="_blank"><i class="fa fa-link"></i></a></td>
                    @else
                        <label><i>empty</i></label>
                    @endif
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('administrator.peraturan-perusahaan.edit', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                    <a href="{{ route('administrator.peraturan-perusahaan.destroy', ['id' => $item->id]) }}" onclick="return confirm('Delete this data ?')"><i class="la la-trash"></i> </a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection
