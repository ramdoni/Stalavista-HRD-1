@extends('layouts.administrator')

@section('title', 'General Setting')

@section('sidebar')

@endsection

@section('page-title', 'General Setting')

@section('page-url', route('administrator.setting.index'))

@section('page-create', route('administrator.setting.create'))

@section('content')
<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.setting.store') }}" method="POST">
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
        <div class="row">
            <p class="col-md-12">Title Website</p>
            <div class="col-md-6">
                <input type="text" class="form-control" name="key[title]" value="{{ get_setting('title') }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <p>Logo</p>
                <input type="file" name="logo" class="form-control">
                @if(!empty(get_setting('logo')))
                <img src="{{ asset('storage/logo') }}/{{ get_setting('logo') }}" style="height: 100px;" />
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <p>Favicon</p>
                <input type="file" name="favicon" class="form-control">
                @if(!empty(get_setting('favicon')))
                <img src="{{ asset('storage/favicon') }}/{{ get_setting('favicon') }}" style="width: 150px;" />
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <p>Footer Title</p>
                <input type="text" name="key[footer-title]" value="{{ get_setting('footer-title') }}" class="form-control" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <p class="col-md-12">Footer Title Right</p>
            <div class="col-md-6">
                <input type="text" name="key[footer-title-right]" value="{{ get_setting('footer-title-right') }}" class="form-control">
            </div>
        </div>
    </div>
    <hr />
    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success"><i class="la la-save"></i> Update Setting</button>
    </div>
</form>
@endsection