@extends('layouts.karyawan')

@section('title', 'Overtime Sheet')

@section('page-url', route('karyawan.overtime.index'))

@section('content')
<form class="form-horizontal" enctype="multipart/form-data" id="form-overtime" method="POST">
    <h3 class="box-title m-b-0">Form Overtime Sheet</h3>
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
        <div class="row">
            <p class="col-md-6">NIK / Nama Karyawan</p>
            <p class="col-md-6">Department</p>
            <div class="col-md-6">
                <input type="text" class="form-control" value="{{ $data->user->nik .' - '. $data->user->name  }}" readonly="true" />
            </div>
            <div class="col-md-6">
                <input type="text" readonly="true" class="form-control" value="{{ isset($data->user->department->name) ? $data->user->department->name : '' }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <p class="col-md-12">Jabatan</p>
            <div class="col-md-6">
                <input type="text" readonly="true" class="form-control" value="{{ $data->user->organisasi_job_role }}">
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="table-responsive">
        <table class="table table-hover manage-u-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>DESCRIPTION</th>
                    <th>AWAL</th>
                    <th>AKHIR</th>
                    <th>TOTAL LEMBUR (JAM)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-content-lembur">
                @foreach($data->overtime_form as $no => $item)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td><input type="text" readonly="true" value="{{ $item->tanggal }}" class="form-control"></td>
                    <td><input type="text" readonly="true" class="form-control" value="{{ $item->description }}"></td>
                    <td><input type="text" readonly="true" class="form-control" value="{{ $item->awal }}" /></td>
                    <td><input type="text" readonly="true" class="form-control" value="{{ $item->akhir }}" /></td>
                    <td><input type="text" readonly="true" class="form-control" value="{{ $item->total_lembur }}" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" name="status" value="0" />
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="clearfix"></div>
    <br />
    <a href="{{ route('karyawan.overtime.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>  
</form>
@section('footer-script')
<script type="text/javascript">
    $("#btn_approved").click(function(){
        bootbox.confirm('Approve Overtime Karyawan ?', function(result){

            $("input[name='status']").val(1);
            if(result)
            {
                $('#form-overtime').submit();
            }
        });
    });

    $("#btn_tolak").click(function(){
        bootbox.confirm('Tolak Overtime Karyawan ?', function(result){

            if(result)
            {
                $('#form-overtime').submit();
            }

        });
    });
</script>
@endsection
@endsection
