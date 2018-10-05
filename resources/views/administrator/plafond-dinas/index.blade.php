@extends('layouts.administrator')

@section('title', 'Training & Business Trip')

@section('sidebar')

@endsection

@section('page-title', 'Training & Business Trip')

@section('page-url', route('administrator.plafond-dinas.index'))

@section('page-create', route('administrator.plafond-dinas.create'))

@section('custom-button')   
    <buttonv class="btn btn-info round  box-shadow-2 px-2" id="add-import-karyawan"> <i class="la la-upload"></i> Import</button>    
@endsection

@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" aria-controls="domestik" aria-expanded="true" href="#domestik"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Domestik</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" aria-controls="luarnegeri" aria-expanded="false" href="#luarnegeri"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs"> Luar Negeri</span></a>
    </li>
</ul>
<div class="tab-content"    >
    <div role="tabpanel" class="tab-pane active" id="domestik">
        <br />
        <h4 class="card-title">Manage Plafond Dinas Domestik</h4>
        <hr />
        <div class="table-responsive">
            <table class="table table-striped table-bordered data-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th width="70" class="text-center">#</th>
                        <th>LEVEL</th>
                        <th>HOTEL (RP)</th>
                        <th>TUNJANGAN MAKAN/HARI (RP)</th>
                        <th>TUNJANGAN HARIAN/UANG SAKU (RP / HARI)</th>
                        <th>KETERANGAN</th>
                        <th>MANAGE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $no => $item)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ ucfirst( strtolower($item->organisasi_position_text)) }}</td>
                        <td>{{ number_format($item->hotel) }}</td>
                        <td>{{ number_format($item->tunjangan_makanan) }}</td>
                        <td>{{ number_format($item->tunjangan_harian) }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('administrator.plafond-dinas.edit', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                            <a href="{{ route('administrator.plafond-dinas.delete', ['id' => $item->id]) }}"><i class="la la-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="luarnegeri">
        <br />
        <h4 class="card-title">Manage Plafond Dinas Luar Negeri</h4>
        <hr />
        <div class="table-responsive">
            <table class="table table-striped table-bordered data-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th width="70" class="text-center">#</th>
                        <th>LEVEL</th>
                        <th>HOTEL TYPE</th>
                        <th>TUNJANGAN MAKAN/HARI (USD)</th>
                        <th>TUNJANGAN HARIAN/UANG SAKU (USD / HARI)</th>
                        <th>KETERANGAN</th>
                        <th>MANAGE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_luarnegeri as $no => $item)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ ucfirst( strtolower($item->organisasi_position_text)) }}</td>
                        <td>{{ $item->hotel }}</td>
                        <td>{{ number_format($item->tunjangan_makanan) }}</td>
                        <td>{{ number_format($item->tunjangan_harian) }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('administrator.plafond-dinas.edit-luar-negeri', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                            <a href="{{ route('administrator.plafond-dinas.delete', ['id' => $item->id]) }}"><i class="la la-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal content education  -->
<div id="modal_import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Import Data</h4> </div>
                <form method="POST" id="form-upload" enctype="multipart/form-data" class="form-horizontal frm-modal-education" action="{{ route('administrator.plafond-dinas.import') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3">Jenis Perjalanan</label>
                        <div class="col-md-9">
                            <select name="jenis_plafond" class="form-control">
                                <option>Domestik</option>
                                <option>Luar Negeri</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">File (xls)</label>
                        <div class="col-md-9">
                            <input type="file" name="file" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                    <label class="btn btn-info btn-sm" id="btn_import">Import</label>
                </div>
            </form>
            <div style="text-align: center;display: none;" class="div-proses-upload">
                <h3>Proses upload harap menunggu !</h3>
                <h1 class=""><i class="fa fa-spin fa-spinner"></i></h1>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('footer-script')
<script type="text/javascript">
    $("#btn_import").click(function(){

        $("#form-upload").submit();
        $("#form-upload").hide();
        $('.div-proses-upload').show();
    });

    $("#add-import-karyawan").click(function(){
        $("#modal_import").modal("show");
        $('.div-proses-upload').hide();
        $("#form-upload").show();
    })
</script>
@endsection

@endsection
