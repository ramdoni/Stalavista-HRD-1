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
                <h4 class="page-title">Dashboard</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                @if(cek_approval('cuti_karyawan'))
                    <a href="{{ route('karyawan.cuti.create') }}" class="btn btn-success btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light" onclick=""> <i class="fa fa-plus"></i> TAMBAH CUTI KARYAWAN</a>
                @else
                    <a class="btn btn-success btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light" onclick="bootbox.alert('Mohon maaf belum dapat melakukan transaksi ini selama transaksi sebelumnya belum complete approved')"> <i class="fa fa-plus"></i> TAMBAH CUTI KARYAWAN</a>
                @endif
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Cuti / Ijin Karyawan</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Manage Cuti / Ijin Karyawan</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>TANGGAL CUTI / IJIN</th>
                                    <th>JENIS CUTI / IJIN</th>
                                    <th>LAMA CUTI</th>
                                    <th>KEPERLUAN</th>
                                    <th>STATUS</th>
                                    <th>CREATED</th>
                                    <th width="100">MANAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>   
                                        <td>{{ date('d F Y', strtotime($item->tanggal_cuti_start)) }} - {{ date('d F Y', strtotime($item->tanggal_cuti_end)) }}</td>
                                        <td>{{ isset($item->cuti) ? $item->cuti->jenis_cuti : '' }}</td>
                                        <td>{{ $item->total_cuti }} Hari</td>
                                        <td>{{ $item->keperluan }}</td>
                                        <td>
                                            <a onclick="detail_approval('cuti', {{ $item->id }})"> 
                                                {!! status_cuti($item->status) !!}
                                            </a>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('karyawan.cuti.edit', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"><i class="fa fa-search-plus"></i> detail</button></a>
                                        </td>
                                    </tr>
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
                <div class="modal-body" id="modal_content_history_approval"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('footer-script')
    <script type="text/javascript">
        function detail_approval(jenis_form, id)
        {
             $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get-history-approval-cuti') }}',
                data: {'foreign_id' : id ,'_token' : $("meta[name='csrf-token']").attr('content')},
                dataType: 'json',
                success: function (data) {

                    var el = '<div class="panel-body">'+
                                        '<div class="steamline">'+
                                            '<div class="sl-item">';

                                            if(data.data.is_approved_atasan == 1){
                                                el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                            }
                                            if(data.data.is_approved_atasan == 0){
                                                el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                            }
                                            if(data.data.is_approved_atasan === null){
                                                el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                            }
                                               
                                                el += '<div class="sl-right">'+
                                                    '<div><a href="#">'+ data.data.atasan +'</a> </div>'+
                                                    '<div class="desc">'+ (data.data.date_approved_atasan != null ? data.data.date_approved_atasan : '' ) +'<p>'+ (data.data.catatan_atasan != null ? data.data.catatan_atasan : '' )  +'</p></div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';

                        el += '<div class="panel-body">'+
                                        '<div class="steamline">'+
                                            '<div class="sl-item">';

                                            if(data.data.is_approved_personalia == 1){
                                                el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                            }
                                            if(data.data.is_approved_personalia == 0){
                                                el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                            }
                                            if(data.data.is_approved_personalia === null){
                                                el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                            }
                                                el += '<div class="sl-right">'+
                                                    '<div><a href="#">Personalia</a> </div>'+
                                                    '<div class="desc"></div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';


                    $("#modal_content_history_approval").html(el);
                }
            });

            $("#modal_history_approval").modal('show');
        }
    </script>
@endsection

@endsection