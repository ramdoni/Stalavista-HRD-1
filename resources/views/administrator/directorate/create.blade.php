@extends('layouts.administrator')

@section('title', 'Directorate')

@section('page-url', route('administrator.directorate.index'))

@section('content')
<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.directorate.store') }}" method="POST">
    <h4 class="card-title">Create Directorate</h4>
    <br />
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    {{ csrf_field() }}
    <div class="form-group">
        <p>Name</p>
        <input type="text" name="name" class="form-control form-control-line" value="{{ old('name')}}">
    </div>
    <div class="form-group">
            <p>Description</p>
            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
    </div>
    <hr />
    <div class="white-box form-horizontal">
        <a href="{{ route('administrator.directorate.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Cancel</a>
        <button type="submit" class="btn btn-sm btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i> Simpan Data</button>
    </div>    
</form> 
@endsection
