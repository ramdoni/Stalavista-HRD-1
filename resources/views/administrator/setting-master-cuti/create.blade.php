@extends('layouts.administrator')

@section('title', 'Setting Cuti - PT. Arthaasia Finance')

@section('sidebar')

@endsection

@section('content')

<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Setting Cuti</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">List Setting Cuti</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.setting-master-cuti.store') }}" method="POST">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Tambah Setting Cuti</h3>
                        <hr />
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
                            <label class="col-md-12">Jenis Cuti</label>
                            <div class="col-md-6">
                               <input type="text" name="jenis_cuti" class="form-control" value="{{ old('jenis_cuti') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Kuota</label>
                            <div class="col-md-6">
                               <input type="text" name="kuota" class="form-control" value="{{ old('kuota') }}">
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <br />
                        <div class="form-group">
                            <a href="{{ route('administrator.setting-master-cuti.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Cancel</a>
                            <button type="submit" class="btn btn-sm btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i> Simpan Data</button>
                            <br style="clear: both;" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>    
            </form>                    
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @extends('layouts.footer')
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@endsection
