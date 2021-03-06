@extends('layouts.administrator')

@section('title', 'Payment Request Approval')

@section('page-url', route('administrator.setting-payment-request.index'))

@section('content-2')
<div class="row">
    <div class="col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Proposal Approval</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-approval"><i class="la la-plus"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="card-text">
                <section class="cd-horizontal-timeline loaded">
                     <table class="table display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="30" class="text-center">#</th>
                                <th>NIK / NAMA</th>
                                <th>JABATAN / DEPARTMENT</th>
                                <th>#</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach($approval as $no =>  $item)
                            <tr>
                                <td>{{ ($no + 1) }}</td>
                                <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                <td>{{ isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name . ' / '. $item->user->department->name : '' }}</td>
                                <td>
                                    <a href="{{ route('administrator.setting-payment-request.destroy', $item->id) }}" onclick="return confirm('Delete this data ?')" class="text-danger"><i class="la la-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Proposal Verification</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-verification"><i class="la la-plus"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="card-text">
                <section class="cd-horizontal-timeline loaded">
                     <table class="table display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="30" class="text-center">#</th>
                                <th>NIK / NAMA</th>
                                <th>JABATAN / DEPARTMENT</th>
                                <th>#</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach($verification as $no =>  $item)
                            <tr>
                                <td>{{ ($no + 1) }}</td>
                                <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                <td>{{ isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name . ' / '. $item->user->department->name : '' }}</td>
                                <td>
                                    <a href="{{ route('administrator.setting-payment-request.destroy', $item->id) }}" onclick="return confirm('Delete this data ?')" class="text-danger"><i class="la la-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Payment Approval</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-payment"><i class="la la-plus"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="card-text">
                <section class="cd-horizontal-timeline loaded">
                    <table class="table display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="30" class="text-center">#</th>
                                <th>NIK / NAMA</th>
                                <th>JABATAN / DEPARTMENT</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payment as $no =>  $item)
                            <tr>
                                <td>{{ ($no + 1) }}</td>
                                <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                <td>{{ isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name . ' / '. $item->user->department->name : '' }}</td>
                                <td>
                                    <a href="route('administrator.setting-payment-request.destroy', $item->id)" onclick="return confirm('Delete this data ?')" class="text-danger"><i class="la la-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
<!-- sample modal content -->
<div id="modal_approval" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Proposal Approval</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <div class="row">
                                <label class="col-md-3">Pilih </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control autocomplete-approval">
                                    <input type="hidden" class="modal_approval_id" />
                                </div>
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_approval">Add</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- sample modal content -->
<div id="modal_verification" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Proposal Verification</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-verification">
                                <input type="hidden" class="modal_verification_id" />
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_verification">Add</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- sample modal content -->
<div id="modal_payment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add Payment Approval</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-payment">
                                <input type="hidden" class="modal_payment_id" />
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_payment">Add</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('footer-script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
    .ui-menu.ui-widget.ui-widget-content.ui-autocomplete.ui-front {
        z-index: 9999;
    }
</style>
<script type="text/javascript">

    $(".autocomplete-approval" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term, 'jenis_form' : 'payment_request', '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_approval_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });


    $(".autocomplete-verification").autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term,'jenis_form' : 'payment_request','_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_verification_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    $(".autocomplete-payment").autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term,'jenis_form' : 'payment_request','_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_payment_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    

    $('.add-approval').click(function(){
        $('#modal_approval').modal('show');
    });

    $('#add_modal_approval').click(function(){

        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-payment-request-approval') }}',
            data: {'id' : $('.modal_approval_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.add-verification').click(function(){
        $('#modal_verification').modal('show');
    });

    $('#add_modal_verification').click(function(){

        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-payment-request-verification') }}',
            data: {'id' : $('.modal_verification_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.add-payment').click(function(){
        $('#modal_payment').modal('show');
    });

    $('#add_modal_payment').click(function(){

        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-payment-request-payment') }}',
            data: {'id' : $('.modal_payment_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });
</script>
@endsection
@endsection

