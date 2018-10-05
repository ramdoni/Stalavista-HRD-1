@extends('layouts.administrator')

@section('title', 'Directorate')

@section('sidebar')

@endsection

@section('content')
<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.directorate.update', $data->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <h4 class="card-title">Edit Directorate</h4>
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
        <label class="col-md-12">Name</label>
        <div class="col-md-12">
            <input type="text" name="name" class="form-control form-control-line" value="{{ $data->name }}"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Description</label>
        <div class="col-md-12">
            <textarea class="form-control" name="description">{{ $data->description }}</textarea>
        </div>
    </div>
    <hr />
    <div class="white-box form-horizontal">
        <a href="{{ route('administrator.directorate.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Cancel</a>
        <button type="submit" class="btn btn-sm btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i> Simpan Data</button>
    </div>    
</form>        
@endsection
