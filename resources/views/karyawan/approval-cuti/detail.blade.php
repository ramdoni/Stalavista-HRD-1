@extends('layouts.karyawan')

@section('title', 'Cuti Karyawan - PT. Arthaasia Finance')

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
                <h4 class="page-title">Form Cuti Karyawan</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Cuti Karyawan</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <form class="form-horizontal" id="form-cuti" enctype="multipart/form-data" action="{{ route('karyawan.approval.cuti.proses') }}" method="POST">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Form Cuti</h3>
                        <hr />
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
                        
                        <div class="col-md-6" style="padding-left: 0;">
                            <div class="form-group">
                                <label class="col-md-12">NIK / Nama Karyawan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{ $data->karyawan->nik .' / '. $data->karyawan->name }}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6">Jabatan</label>
                                <label class="col-md-6">Division / Departement</label>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control jabatan" value="{{ isset($data->karyawan->organisasiposition->name) ? $data->karyawan->organisasiposition->name : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control department" value="{{ isset($data->karyawan->department) ? $data->karyawan->department->name : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6">Kuota Cuti</label>
                                <label class="col-md-3">Cuti Terpakai</label>
                                <label class="col-md-3">Sisa Cuti</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" readonly="true" value="{{ $data->cuti->kuota }}" />
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" readonly="true" value="{{ get_cuti_user($data->jenis_cuti, $data->user_id, 'cuti_terpakai') == "" ? 0 : get_cuti_user($data->jenis_cuti, $data->user_id, 'cuti_terpakai') }}" />
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" readonly="true" value="{{ get_cuti_user($data->jenis_cuti, $data->user_id, 'sisa_cuti') == "" ? 0 : get_cuti_user($data->jenis_cuti, $data->user_id, 'sisa_cuti') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="noted" placeholder="Catatan"></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br />
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12">Tanggal Cuti</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control datepicker" value="{{ $data->tanggal_cuti_start }}" readonly="true" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control datepicker" value="{{ $data->tanggal_cuti_end }}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Jenis Cuti</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{ $data->cuti->jenis_cuti }}" readonly="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Keperluan</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" readonly="true">{{ $data->keperluan }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Selama Cuti, Backup dan Informasi pekerjaan diberikan kepada</label>
                                <div class="col-md-12"> 
                                    <input type="text" readonly="true" value="{{ $data->backup_karyawan->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6">Jabatan</label>
                                <label class="col-md-6">Division / Departement</label>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control" value="{{ isset($data->backup_karyawan->organisasiposition->name) ? $data->backup_karyawan->organisasiposition->name : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control" value="{{ isset($data->backup_karyawan->department->name) ? $data->backup_karyawan->department->name : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6">No Handphone</label>
                                <label class="col-md-6">Email</label>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control no_handphone" value="{{ isset($data->backup_karyawan->telepon) ? $data->backup_karyawan->telepon : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control email" value="{{ isset($data->backup_karyawan->email) ? $data->backup_karyawan->email : '' }}">
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="status" value="0" />
                        <input type="hidden" name="id" value="{{ $data->id }}">

                        <div class="clearfix"></div>
                        <br />
                        <div class="col-md-12">
                            <a href="{{ route('karyawan.approval.cuti.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
                            <a class="btn btn-sm btn-success waves-effect waves-light m-r-10" id="btn_approved"><i class="fa fa-save"></i> Approve</a>
                            <a class="btn btn-sm btn-danger waves-effect waves-light m-r-10" id="btn_tolak"><i class="fa fa-close"></i> Denied</a>
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
    @include('layouts.footer')
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@section('footer-script')
    <script type="text/javascript">
        $("#btn_approved").click(function(){
            bootbox.confirm('Approve Cuti Karyawan ?', function(result){

                $("input[name='status']").val(1);
                if(result)
                {
                    $('#form-cuti').submit();
                }

            });
        });

        $("#btn_tolak").click(function(){
            bootbox.confirm('Tolak Cuti Karyawan ?', function(result){

                if(result)
                {
                    $('#form-cuti').submit();
                }

            });
        });
    </script>
@endsection

@endsection
