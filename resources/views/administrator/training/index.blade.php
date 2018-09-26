@extends('layouts.administrator')

@section('title', 'Kegiatan Training & Perjalanan Dinas - PT. Arthaasia Finance')

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
                <h4 class="page-title">Dashboard</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Kegiatan Training & Perjalanan Dinas</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Kegiatan Training & Perjalanan Dinas</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NIK</th>
                                    <th>NAME</th>
                                    <th>DEPARTMENT / POSITION</th>
                                    <th>JENIS TRAINING</th>
                                    <th>TOPIK KEGIATAN</th>
                                    <th>TANGGAL KEGIATAN</th>
                                    <th>UANG MUKA</th>
                                    <th>STATUS</th>
                                    <th>BILL</th>
                                    <th width="100">MANAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    @if(isset($item->user->nik))
                                        <tr>
                                            <td class="text-center">{{ $no+1 }}</td>   
                                            <td>{{ $item->user->nik }}</a></td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>
                                                {{ (isset($item->user->department->name) ? $item->user->department->name : '' ) }} / 
                                                {{ (isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name : '')  }}</td>
                                            <td>{{ $item->jenis_training }}</td>
                                            <td>{{ $item->topik_kegiatan }}</td>
                                            <td>{{ date('d F Y', strtotime($item->tanggal_kegiatan_start)) }} - {{ date('d F Y', strtotime($item->tanggal_kegiatan_end)) }}</td>
                                            <td style="text-align: right;">{{ number_format($item->pengambilan_uang_muka) }}</td>
                                            <td>

                                                @if($item->is_approved_atasan != 1 and $item->status != 4)
                                                <label onclick="status_approval_training({{ $item->id }})" class="btn btn-default btn-xs">Waiting Approval Atasan</label>
                                                @else
                                                    
                                                    @if($item->status == 1)
                                                        @if(empty($item->approved_hrd))
                                                            <label onclick="status_approval_training({{ $item->id }})" class="btn btn-warning btn-xs">Waiting Approval</label>
                                                        @endif
                                                        @if($item->approved_hrd == 1)
                                                            <label onclick="status_approval_training({{ $item->id }})" class="btn btn-success btn-xs">Approved</label>
                                                        @endif
                                                    @endif

                                                    @if($item->status == 2)
                                                        <label onclick="status_approval_training({{ $item->id }})" class="btn btn-success btn-xs">Approved</label>
                                                    @endif
                                                @endif

                                                @if($item->status == 3)
                                                    <label onclick="status_approval_training({{ $item->id }})" class="btn btn-danger btn-xs">Denied</label>
                                                @endif

                                                @if($item->status == 4)
                                                    <label class="btn btn-danger btn-xs" onclick="bootbox.alert('<h4>Alasana Pembatalan</h4><hr /><p>{{ $item->note_pembatalan }}</p>')"><i class="fa fa-close"></i>Dibatalkan</label>
                                                @endif
                                            </td>
                                            <td>                                            
                                                @if($item->status == 2)
                                                    <a onclick="status_approval_actual_bill({{ $item->id }})">
                                                    @if($item->status_actual_bill == 2 and $item->is_approve_atasan_actual_bill == "")
                                                        <label class="btn btn-default btn-xs">Waiting Approval Atasan</label>
                                                    @endif

                                                    @if($item->status_actual_bill == 2 and  $item->is_approve_atasan_actual_bill == 1 and $item->is_approve_hrd_actual_bill == "")
                                                        <label class="btn btn-warning btn-xs">Waiting Approval</label>
                                                    @endif

                                                    <!-- ditolak-->
                                                    @if($item->status_actual_bill == 2 and  $item->is_approve_atasan_actual_bill === 0)
                                                        <label class="btn btn-danger btn-xs">Ditolak</label>
                                                    @endif

                                                    <!-- ditolak-->
                                                    @if($item->status_actual_bill === 0 or  $item->status_actual_bill == 1)
                                                        <label class="btn btn-default btn-xs">Not Submited</label>
                                                    @endif

                                                    @if($item->is_approve_hrd_actual_bill == 1)
                                                        <label class="btn btn-success btn-xs">Approved</label>
                                                    @endif

                                                    @if($item->status_actual_bill === null)
                                                        <label class="btn btn-default btn-xs">Open</label>
                                                    @endif
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status == 2 and $item->is_approve_atasan_actual_bill == 1 and $item->is_approve_hrd_actual_bill == "")
                                                <a href="{{ route('administrator.training.biaya', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5">Proses Actual Bill <i class="fa fa-arrow-right"></i></button></a>
                                                @endif

                                                @if($item->is_approve_atasan_actual_bill == 1 and $item->is_approve_hrd_actual_bill == 1)
                                                    <a href="{{ route('administrator.training.biaya', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5">Detail Actual Bill <i class="fa fa-search-plus"></i></button></a>
                                                @endif

                                                @if($item->status == 1)
                                                    @if(empty($item->approved_hrd) and $item->is_approved_atasan == 1)
                                                        <a href="{{ route('administrator.training.detail', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5">proses <i class="fa fa-arrow-right"></i></button></a>
                                                    @endif
                                                    @if($item->approved_hrd == 1)
                                                        <a href="{{ route('administrator.training.detail', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"><i class="fa fa-search-plus"></i> detail</button></a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('administrator.training.detail', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"><i class="fa fa-search-plus"></i> detail</button></a>
                                                @endif

                                                @if($item->status == 1)
                                                <a onclick="batalkan_pengajuan('{{ $item->id }}')" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Batalkan Training</a>
                                                @endif

                                            </td> 
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @include('layouts.footer')
</div>
<!-- sample modal content -->
<div id="modal_history_approval" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">History Approval</h4> </div>
                <div class="modal-body" id="modal_content_history_approval">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- sample modal content -->
<div id="modal_pembatalan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <form class="form-horizontal" id="form-pembatalan" enctype="multipart/form-data" action="{{ route('administrator.training.batal') }}" method="POST">
                    {{ csrf_field() }}
                    <h4 class="modal-title" id="myModalLabel">Pembatalan Form</h4> </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-3">Alasan Pembatalan</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="alasan_pembatalan" name="note"></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" class="id-pembatalan" name="id" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal"> <i class="fa fa-close"></i> Close</button>
                        <button type="button" class="btn btn-info btn-sm" id="proses_pembatalan">Proses Pembatalan <i class="fa fa-arrow-right"></i> </button>
                    </div>
                </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('footer-script')
    <script type="text/javascript">

        $("#proses_pembatalan").click(function(){

            var alasan = $("#alasan_pembatalan").val();

            if(alasan == "")
            {
                bootbox.alert('Alasan pembatalan harus diisi!');
            }
            else
            {
                $("#form-pembatalan").submit();
            }
        });

        function batalkan_pengajuan(id)
        {   
            $('.id-pembatalan').val(id);

            $("#modal_pembatalan").modal('show');
        }
    </script>
@endsection

@endsection
