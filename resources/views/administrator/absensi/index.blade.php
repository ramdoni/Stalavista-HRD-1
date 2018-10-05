@extends('layouts.administrator')

@section('title', 'Attendance')

@section('sidebar')

@endsection

@section('page-title', 'Attendance')

@section('page-url', route('administrator.absensi.index'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>UPLOAD DATE</th>
                <th>MANAGE</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection
