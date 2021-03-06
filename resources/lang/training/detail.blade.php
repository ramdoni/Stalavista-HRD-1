@extends('layouts.administrator')

@section('title', 'Kegiatan Perjalanan Dinas - PT. Arthaasia Finance')

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
                <h4 class="page-title"></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Kegiatan Perjalanan Dinas</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <form class="form-horizontal" id="form-training" {{ ($data->hrd_approved == 1 ? 'onsubmit="return false"' : '') }} enctype="multipart/form-data" action="{{ route('administrator.training.proses') }}" method="POST">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Form Perjalanan Dinas</h3>
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
                        
                        <ul class="nav customtab nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#kegiatan" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Kegiatan</span></a></li>

                            <li role="presentation" class=""><a href="#pesawat" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Perjalanan Menggunakan Pesawat</span></a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="kegiatan">
                                <h4>Form Kegiatan</h4>
                                <hr />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-6">Jenis Perjalanan Dinas</label>
                                        <label class="col-md-6 select-cabang" style="display: none;">Lokasi Cabang</label>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                            <select name="jenis_training" readonly class="form-control">
                                                <option value="">Pilih Jenis Perjalanan Dinas</option>
                                                @foreach(jenis_perjalanan_dinas() as $item)
                                                <option {{ $item == $data->jenis_training ? 'selected' : '' }}>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 select-cabang" style="{{  $data->jenis_training != 'Branch Visit' ? 'display: none;' : '' }}">
                                            <select class="form-control" name="cabang_id" readonly>
                                                <option value="">Pilih Lokasi Cabang </option>
                                                @foreach(get_cabang() as $item)
                                                <option {{ $item->id == $data->cabang_id ? 'selected' : '' }}>{{ $item->name .' - '. $item->alamat  }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 select-others" style="{{ $data->jenis_training == 'Others' ? 'display: block;' : 'display:none;' }}">
                                            <input type="text" class="form-control" value="{{ $data->others }}" name="others" placeholder="Others Perjalanan Dinas">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Lokasi Kegiatan</label>
                                        <div class="col-md-12">
                                            <label style="font-weight: normal;margin-right: 10px;">
                                                <input type="radio" name="lokasi_kegiatan" value="Dalam Negeri" {{ $data->lokasi_kegiatan == 'Dalam Negeri'  ? 'checked' : '' }}> Dalam Negeri
                                            </label>

                                            <label style="font-weight: normal;">
                                                <input type="radio" name="lokasi_kegiatan" value="Luar Negeri" {{ $data->lokasi_kegiatan == 'Luar Negeri' ? 'checked' : '' }}> Luar Negeri
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tempat Tujuan</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" readonly name="tempat_tujuan" value="{{ $data->tempat_tujuan }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Topik Kegiatan</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" readonly name="topik_kegiatan">{{ $data->topik_kegiatan }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tanggal Kegiatan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="tanggal_kegiatan_start" class="form-control datepicker" placeholder="Dari Tanggal" readonly value="{{ $data->tanggal_kegiatan_start}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="tanggal_kegiatan_end" class="form-control datepicker" placeholder="Sampai Tanggal" readonly value="{{ $data->tanggal_kegiatan_end  }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Pengambilan Uang Muka (Rp)</label>
                                        <div class="col-md-6">
                                            <input type="text" readonly class="form-control" name="pengambilan_uang_muka" value="{{ !empty($data->pengambilan_uang_muka) ? number_format($data->pengambilan_uang_muka) : '' }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6">Tanggal Pengajuan</label>
                                        <label class="col-md-6">Tanggal Penyelesaian</label>
                                        <div class="col-md-6">
                                            <input type="text" readonly class="form-control datepicker" value="{{ $data->tanggal_pengajuan }}" name="tanggal_pengajuan" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" readonly class="form-control datepicker" name="tanggal_penyelesain" value="{{ date('Y-m-d', strtotime( $data->tanggal_pengajuan .' +10 day')) }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="pesawat">
                                <h4>Form Pemesanan</h4>
                                <hr />
                                <div class="form-group">
                                    <label class="col-md-12">Pilihan Rute</label>
                                    <div class="col-md-6">
                                        <label style="font-weight: normal;">
                                            <input type="radio" {{ $data->pesawat_perjalanan == 'Sekali Jalan' ? 'checked' : '' }} name="pesawat_perjalanan" value="Sekali Jalan"> Sekali Jalan
                                        </label> &nbsp;&nbsp;
                                        <label style="font-weight: normal;">
                                            <input type="radio" {{ $data->pesawat_perjalanan == 'Sekali Jalan' ? 'checked' : '' }} name="pesawat_perjalanan" value="Pulang Pergi"> Pulang Pergi
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Tanggal / Waktu</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Tanggal Berangkat" value="{{ $data->tanggal_berangkat }}" name="tanggal_berangkat" readonly class="form-control datepicker">
                                    </div>
                                    <div style="float: left; width: 5px;padding-top:10px;"> / </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control time_picker" value="{{ $data->waktu_berangkat }}" placeholder="Waktu" readonly name="waktu_berangkat" />
                                    </div>
                                    <div style="float: left; width: 5px;padding-top:10px;"> - </div>

                                    <div class="col-md-2"><input type="text" placeholder="Tanggal Pulang" name="tanggal_pulang" class="form-control datepicker" readonly value="{{ $data->tanggal_pulangn }}">
                                    </div>
                                    <div style="float: left; width: 5px;padding-top:10px;"> / </div>
                                     <div class="col-md-1">
                                        <input type="text" class="form-control time_picker" value="{{ $data->waktu_pulang }}" placeholder="Waktu" readonly name="waktu_pulang" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Dari Bandara</label>
                                    <label class="col-md-3">Tujuan Bandara</label>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3">
                                        <input type="text" name="pesawat_rute_dari" value="{{ $data->pesawat_rute_dari }}" class="form-control" readonly id="rute_dari" placeholder="Rute Dari">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="pesawat_rute_tujuan" value="{{ $data->pesawat_rute_tujuan }}"  class="form-control" readonly id="rute_tujuan" placeholder="Rute Tujuan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Informasi Penumpang</label>
                                    <div class="col-md-6">
                                        <table class="table table-bordered custome_table">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>NO KTP</th>
                                                    <th>NO Passport</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-penumpang">
                                                <tr>
                                                    <td>{{ $data->user->name .' / '. $data->user->nik }}</td>
                                                    <td>{{ $data->user->ktp_number }}</td>
                                                    <td>{{ $data->user->passport_number }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2">Kelas</label>
                                    <label class="col-md-10">Maskapai</label>
                                    <div class="col-md-2">
                                        <label style="font-weight: normal;">
                                            <input type="radio" name="pesawat_kelas" value="Ekonomi" {{ $data->pesawat_kelas == 'Ekonomi' ? 'checked' : '' }} /> Ekonomi 
                                        </label> 
                                        <label style="font-weight: normal;">
                                            <input type="radio" name="pesawat_kelas" value="Bisnis"  {{ $data->pesawat_kelas == 'Bisnis' ? 'checked' : '' }}/> Bisnis 
                                        </label> 
                                    </div>
                                    <div class="col-md-6"> 
                                        <input type="text" readonly class="form-control" name="pesawat_maskapai" value="{{ $data->pesawat_maskapai }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="status" value="0" />
                        <input type="hidden" name="id" value="{{ $data->id }}">

                        <div class="col-md-12">
                            <a href="{{ route('karyawan.approval.training-atasan.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
                            
                            @if($item->status == 1)
                                @if(empty($data->hrd_approved))
                                <a class="btn btn-sm btn-success waves-effect waves-light m-r-10" id="btn_approved"><i class="fa fa-check"></i> Approved Perjalanan Dinas</a>
                                <a class="btn btn-sm btn-danger waves-effect waves-light m-r-10" id="btn_tolak"><i class="fa fa-close"></i> Tolak Perjalanan Dinas</a>
                                @endif
                            @endif
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
<style type="text/css">
    .custome_table tr th {
        padding-top: 5px !important;
        padding-bottom: 5px !important;
    }
</style>

@section('footer-script')
<script type="text/javascript">

    $("#btn_approved").click(function(){
        bootbox.confirm('Approve Perjalanan Dinas Karyawan ?', function(result){

            $("input[name='status']").val(1);
            if(result)
            {
                $('#form-training').submit();
            }

        });
    });

    $("#btn_tolak").click(function(){
        bootbox.confirm('Tolak Perjalanan Dinas Karyawan ?', function(result){

            if(result)
            {
                $('#form-training').submit();
            }

        });
    });
</script>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@endsection
@endsection
