@extends('layouts.administrator')

@section('title', 'Product Information')

@section('page-url', route('administrator.peraturan-perusahaan.index'))

@section('content')
<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.peraturan-perusahaan.store') }}" method="POST">
    <h4 class="card-title">Form Product Information</h4>
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
        <label class="col-md-12">File (PDF)</label>
        <div class="col-md-12">
            <input type="file" name="file" class="form-control" />
        </div>
    </div>
    <div class="clearfix"></div>
    <br />

    <a href="{{ route('administrator.peraturan-perusahaan.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
    <button type="submit"  class="btn btn-sm btn-success waves-effect waves-light m-r-10" id="btn_submit"><i class="fa fa-save"></i> Save</button>
    <br style="clear: both;" />
    <div class="clearfix"></div>
</form>
@section('footer-script')
    <script src="{{ asset('app-assets/vendors/js/editors/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection
@endsection
