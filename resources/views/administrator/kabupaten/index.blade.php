@extends('layouts.administrator')

@section('title', 'Kabupaten / Kota')

@section('sidebar')

@endsection

@section('page-title', 'Kabupaten / Kota')

@section('page-url', route('administrator.kabupaten.index'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>PROVINSI</th>
                <th>KABUPATEN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>   
                    <td>{{ isset($item->provinsi->nama) ? $item->provinsi->nama : ''  }}</td>
                    <td>{{ $item->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
