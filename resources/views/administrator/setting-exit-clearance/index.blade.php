@extends('layouts.administrator')

@section('title', 'Exit Interview & Exit Clearance Approval')

@section('page-url', route('administrator.setting-exit-clearance.index'))

@section('content-2')
<div class="row">
    <div class="col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Check By HRD</h4>
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
                                <th>NAMA</th>
                                <th>JABATAN</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hrd as $no => $item)
                            <tr>
                                <td>{{ ($no + 1) }}</td>
                                <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                <td>{{ isset($item->user->organisasi_job_role) ? $item->user->organisasi_job_role : '' }}</td>
                                <td>
                                    <a href="{{ route('administrator.setting-exit-clearance.destroy', $item->id) }}" class="text-danger" onclick="return confirm('Delete this data ?')"><i class="la la-trash"></i></a>
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
            <h4 class="card-title">Check From General Affair (GA)</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-ga"><i class="la la-plus"></i></a></li>
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
                            @foreach($ga as $no => $item)
                            <tr>
                                <td>{{ ($no + 1) }}</td>
                                <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                <td>{{ isset($item->user->organisasi_job_role) ? $item->user->organisasi_job_role : '' }}</td>
                                <td>
                                    <a href="{{ route('administrator.setting-exit-clearance.destroy', $item->id) }}" class="text-danger" onclick="return confirm('Delete this data ?')"><i class="la la-trash"></i></a>
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
            <h4 class="card-title">Check From IT</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-it"><i class="la la-plus"></i></a></li>
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
                            @foreach($it as $no => $item)
                            <tr>
                                <td>{{ ($no + 1) }}</td>
                                <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                <td>{{ isset($item->user->organisasi_job_role) ? $item->user->organisasi_job_role : '' }}</td>
                                <td>
                                    <a href="{{ route('administrator.setting-exit-clearance.destroy', $item->id) }}" class="text-danger" onclick="return confirm('Delete this data ?')"><i class="la la-trash"></i></a>
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
            <h4 class="card-title">Check From Accounting & Finance</h4>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a class="add-accounting"><i class="la la-plus"></i></a></li>
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
                            @foreach($accounting_finance as $no => $item)
                            <tr>
                                <td>{{ ($no + 1) }}</td>
                                <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                                <td>{{ isset($item->user->organisasi_job_role) ? $item->user->organisasi_job_role : '' }}</td>
                                <td>
                                    <a href="{{ route('administrator.setting-exit-clearance.destroy', $item->id) }}" class="text-danger" onclick="return confirm('Delete this data ?')"><i class="la la-trash"></i></a>
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
<div id="modal_hrd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Check By HRD</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-hrd" >
                                <input type="hidden" class="modal_hrd_id">
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

<!-- sample modal content -->
<div id="modal_ga" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Check From General Affair (GA)</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-ga">
                                <input type="hidden" class="modal_ga_id">
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_ga">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- sample modal content -->
<div id="modal_it" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Check From IT</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-it">
                                <input type="hidden" class="modal_it_id">
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_it">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- sample modal content -->
<div id="modal_accounting" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Check From Accounting & Finance</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal">
                       <div class="form-group">
                            <label class="col-md-3">Pilih </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control autocomplete-accounting" />
                                <input type="hidden" class="modal_accounting_id">
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_accounting">Tambah</button>
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

    $(".autocomplete-ga" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term,'jenis_form' : 'exit_clearance', '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_ga_id" ).val(ui.item.id);
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
                'name': request.term, 'jenis_form' : 'exit_clearance', '_token' : $("meta[name='csrf-token']").attr('content')
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

    $('.add-hrd').click(function(){
        $('#modal_hrd').modal('show');
    });

    $('#add_modal_hrd').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-exit-hrd') }}',
            data: {'id' : $('.modal_hrd_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });


    $('.add-ga').click(function(){
        $('#modal_ga').modal('show');
    });
    $('#add_modal_ga').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-exit-ga') }}',
            data: {'id' : $('.modal_ga_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });

    $(".autocomplete-it" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term, 'jenis_form': 'exit_clearance', '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_it_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });


    $('.add-it').click(function(){
        $('#modal_it').modal('show');
    });
    $('#add_modal_it').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-exit-it') }}',
            data: {'id' : $('.modal_it_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });


    $(".autocomplete-accounting" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term, 'jenis_form': 'exit_clearance', '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_accounting_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });
    $('.add-accounting').click(function(){
        $('#modal_accounting').modal('show');
    });
    $('#add_modal_accounting').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-exit-accounting') }}',
            data: {'id' : $('.modal_accounting_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });

</script>
@endsection

@endsection
