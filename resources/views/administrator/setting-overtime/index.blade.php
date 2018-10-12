@extends('layouts.administrator')

@section('title', 'Approval Overtime')

@section('page-url', route('administrator.setting-payment-request.index'))

@section('content-2')
<div class="row">
    <div class="col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Direktur</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-manager-hr"><i class="la la-plus"></i></a></li>
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
                             @foreach($manager_hr as $no =>  $item)
                                <tr>
                                    <td>{{ ($no + 1) }}</td>
                                    <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                    <td>{{ isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name : '' }}</td>
                                    <td>
                                        <a href="{{ route('administrator.setting-overtime.destroy', $item->id) }}" class="text-danger"><i class="la la-trash"></i></a>
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
            <h4 class="card-title">HR Benefit</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-hr-operation"><i class="la la-plus"></i></a></li>
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
                                    <th>NAMA</th>
                                    <th>JABATAN</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hr_operation as $no => $item)
                                <tr>
                                    <td>{{ ($no + 1) }}</td>
                                    <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                    <td>{{ isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name : ''  }}</td>
                                    <td>
                                        <a href="{{ route('administrator.setting-overtime.destroy', $item->id) }}" class="text-danger"><i class="la la-trash"></i></a>
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

<!-- sample modal content -->
<div id="modal_hr_operation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah HR Operation Approval</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-hr-operation">
                                <input type="hidden" class="modal_hr_operation_id" />
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_hr_operation">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- sample modal content -->
<div id="modal_manager_hr" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Direktur Approval</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-manager-hr">
                                <input type="hidden" class="modal_manager_hr_id" />
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_manager_hr">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- sample modal content -->
<div id="modal_manager_department" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Manager Department Approval</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <select class="form-control modal_manager_department_id">
                                    <option value="">Pilih </option>
                                    @foreach(get_karyawan() as $item)
                                    <option value="{{ $item->id }}" data-kelamin="{{ $item->jenis_kelamin }}">{{ $item->nik }} / {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_manager_department">Tambah</button>
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
    $(".autocomplete-hr-operation" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term,'jenis_form' : 'overtime','_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_hr_operation_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    $(".autocomplete-manager-hr").autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-manager-up') }}",
              method : 'POST',
              data: {
                'name': request.term, '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_manager_hr_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    $('.add-hr-operation').click(function(){
        $('#modal_hr_operation').modal('show');
    });
    $('#add_modal_hr_operation').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-overtime-hr-operation') }}',
            data: {'id' : $('.modal_hr_operation_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.add-manager-hr').click(function(){
        $('#modal_manager_hr').modal('show');
    });
    $('#add_modal_manager_hr').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-overtime-manager-hr') }}',
            data: {'id' : $('.modal_manager_hr_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.add-manager-department').click(function(){
        $('#modal_manager_department').modal('show');
    });
    $('#add_modal_manager_department').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-overtime-manager-department') }}',
            data: {'id' : $('.modal_manager_department_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });
</script>
@endsection
@endsection
