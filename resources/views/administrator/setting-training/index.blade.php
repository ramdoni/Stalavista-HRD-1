@extends('layouts.administrator')

@section('title', 'Approval Training & Business Trip')

@section('page-url', route('administrator.setting-training.index'))

@section('content-2')
<div class="row">
    <div class="col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Approval HRD</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-hrd"><i class="la la-plus"></i></a></li>
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
                            @foreach($hrd as $no =>  $item)
                                <tr>
                                    <td>{{ ($no + 1) }}</td>
                                    <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                    <td>{{ isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name : '' }}</td>
                                    <td>
                                        <a href="{{ route('administrator.setting-training.destroy', $item->id) }}" class="text-danger"><i class="la la-trash"></i></a>
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
            <h4 class="card-title">Mengetahui GA Department / Head Ops</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-ga-department"><i class="la la-plus"></i></a></li>
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
                            @foreach($ga_department as $no =>  $item)
                                <tr>
                                    <td>{{ ($no + 1) }}</td>
                                    <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                    <td>{{ isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name : '' }}</td>
                                    <td>
                                        <a href="{{ route('administrator.setting-training.destroy', $item->id) }}" class="text-danger"><i class="la la-trash"></i></a>
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
            <h4 class="card-title">Approval Finance</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-finance"><i class="la la-plus"></i></a></li>
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
                            @foreach($finance as $no =>  $item)
                                <tr>
                                    <td>{{ ($no + 1) }}</td>
                                    <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                    <td>{{ isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name : '' }}</td>
                                    <td>
                                        <a href="{{ route('administrator.setting-training.destroy', $item->id) }}" class="text-danger"><i class="la la-trash"></i></a>
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
<div id="modal_finance" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Approval Finance</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-finance" />
                                <input type="hidden" class="modal_finance_id" />
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_finance">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- sample modal content -->
<div id="modal_ga_department" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Approval Personalia</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-ga-department" />
                                <input type="hidden" class="modal_ga_department_id" />
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_ga_department">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- sample modal content -->
<div id="modal_hrd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Approval HR</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-hrd" />
                                <input type="hidden" class="modal_hrd_id" />
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_hrd">Tambah</button>
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
    $(".autocomplete-finance" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term, 'jenis_form': 'training', '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_finance_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    $(".autocomplete-ga-department" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term, 'jenis_form': 'training', '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_ga_department_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    $(".autocomplete-hrd" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term, 'jenis_form' : 'training', '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_hrd_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });


    $('.add-finance').click(function(){
        $('#modal_finance').modal('show');
    });
    $('#add_modal_finance').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-training-finance') }}',
            data: {'id' : $('.modal_finance_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.add-hrd').click(function(){
        $('#modal_hrd').modal('show');
    });
    $('#add_modal_hrd').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-training-hrd') }}',
            data: {'id' : $('.modal_hrd_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });


    $('.add-ga-department').click(function(){
        $('#modal_ga_department').modal('show');
    });
    $('#add_modal_ga_department').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-training-ga-department-mengetahui') }}',
            data: {'id' : $('.modal_ga_department_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });
</script>
@endsection
@endsection

