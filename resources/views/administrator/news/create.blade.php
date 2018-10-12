@extends('layouts.administrator')

@section('title', 'News')

@section('page-url', route('administrator.news.index'))

@section('content')
<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.news.store') }}" method="POST">
    <h3 class="box-title m-b-0">Form News</h3>
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
        <label class="col-md-12">Title</label>
        <div class="col-md-12">
            <input type="text" required class="form-control" name="title">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Content</label>
        <div class="col-md-12">
            <textarea class="content" name="content" id="ckeditor"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Status</label>
        <div class="col-md-12">
            <select class="form-control" name="status" required>
                <option value=""> - none - </option>
                <option value="1">Publish</option>
                <option value="0">Draft</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Thumbnail</label>
        <div class="col-md-12">
            <input type="file" name="thumbnail" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Image Detail</label>
        <div class="col-md-12">
            <input type="file" name="image" class="form-control">
        </div>
    </div>
    <div class="clearfix"></div>
    <br />

    <a href="{{ route('administrator.news.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
    <button type="submit"  class="btn btn-sm btn-success waves-effect waves-light m-r-10" id="btn_submit"><i class="fa fa-save"></i> Save</button>
    <br style="clear: both;" />
    <div class="clearfix"></div>
</form>                    
@section('js')
    <script src="{{ asset('app-assets/vendors/js/editors/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection

@endsection
