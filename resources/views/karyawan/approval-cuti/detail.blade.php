@extends('layouts.karyawan')

@section('title', 'Leave Employee')

@section('page-url', route('karyawan.approval.cuti.index'))

@section('content')
<form class="form-horizontal" id="form-cuti" enctype="multipart/form-data" action="{{ route('karyawan.approval.cuti.proses') }}" method="POST">
    <h4 class="card-title">Form  Approval</h4>
    <div class="card-body">
        <div class="row">
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
                    <p>NIK / Nama Karyawan</p>
                    <input type="text" class="form-control" value="{{ $data->karyawan->nik .' / '. $data->karyawan->name }}" readonly="true">
                </div>
                <div class="form-group">
                    <div class="row">
                        <p class="col-md-6">Jabatan</p>
                        <p class="col-md-6">Division / Departement</p>
                        <div class="col-md-6">
                            <input type="text" readonly="true" class="form-control jabatan" value="{{ isset($data->karyawan->organisasiposition->name) ? $data->karyawan->organisasiposition->name : '' }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" readonly="true" class="form-control department" value="{{ isset($data->karyawan->department) ? $data->karyawan->department->name : '' }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <p class="col-md-6">Kuota Cuti</p>
                        <p class="col-md-3">Cuti Terpakai</p>
                        <p class="col-md-3">Sisa Cuti</p>
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
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="noted" placeholder="Catatan"></textarea>
                </div>
                <div class="clearfix"></div>
                <br />
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <p class="col-md-12">Tanggal Cuti</p>
                        <div class="col-md-6">
                            <input type="text" class="form-control datepicker" value="{{ $data->tanggal_cuti_start }}" readonly="true" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control datepicker" value="{{ $data->tanggal_cuti_end }}" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p>Jenis Cuti</p>
                    <input type="text" class="form-control" value="{{ $data->cuti->jenis_cuti }}" readonly="true">
                </div>

                <div class="form-group">
                    <p>Keperluan</p>
                    <textarea class="form-control" readonly="true">{{ $data->keperluan }}</textarea>
                </div>
                <div class="form-group">
                    <p>Selama Cuti, Backup dan Informasi pekerjaan diberikan kepada</p>
                    <input type="text" readonly="true" value="{{ $data->backup_karyawan->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <p class="col-md-6">Jabatan</p>
                        <p class="col-md-6">Division / Departement</p>
                        <div class="col-md-6">
                            <input type="text" readonly="true" class="form-control" value="{{ isset($data->backup_karyawan->organisasiposition->name) ? $data->backup_karyawan->organisasiposition->name : '' }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" readonly="true" class="form-control" value="{{ isset($data->backup_karyawan->department->name) ? $data->backup_karyawan->department->name : '' }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <p class="col-md-6">No Handphone</p>
                        <p class="col-md-6">Email</p>
                        <div class="col-md-6">
                            <input type="text" readonly="true" class="form-control no_handphone" value="{{ isset($data->backup_karyawan->telepon) ? $data->backup_karyawan->telepon : '' }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" readonly="true" class="form-control email" value="{{ isset($data->backup_karyawan->email) ? $data->backup_karyawan->email : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="status" value="0" />
            <input type="hidden" name="id" value="{{ $data->id }}">

            <div class="clearfix"></div>
            <br />
            <div class="col-md-12">
                <a href="{{ route('karyawan.approval.cuti.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
                <button type="button" class="btn btn-sm btn-success waves-effect waves-light m-r-10" id="btn_approved"><i class="fa fa-save"></i> Approve</button>
                <button type="button" class="btn btn-sm btn-danger waves-effect waves-light m-r-10" id="btn_tolak"><i class="fa fa-close"></i> Denied</button>
                <br style="clear: both;" />
            </div>
            <div class="clearfix"></div>
        </div>
    </div>    
</form>
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
