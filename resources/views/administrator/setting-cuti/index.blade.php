@extends('layouts.administrator')

@section('title', 'Setting Leave Approval')

@section('page-title', 'Setting Leave Approval')

@section('page-url', route('administrator.setting-cuti.index'))

@section('content')
<h4 class="card-title">Approval Personalia</h4>
<button type="button" class="btn btn-info btn-sm pull-right add-personalia"><i class="la la-plus"></i></button>
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="30" class="text-center">#</th>
                <th>NIK / NAME</th>
                <th>POSITION</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personalia as $no =>  $item)
            <tr>
                <td>{{ ($no + 1) }}</td>
                <td>{{ isset($item->user->name) ? $item->user->nik .' / '. $item->user->name : '' }}</td>
                <td>{{ isset($item->user->organisasi_job_role) ? $item->user->organisasi_job_role : '' }}</td>
                <td>
                    <a href="{{ route('administrator.setting-cuti.delete', $item->id) }}" onclick="return confirm('Delete this data?')"><i class="la la-trash"></i> </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- sample modal content -->
<div id="modal_personalia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control autocomplete-karyawan" />
                                <input type="hidden" class="modal_personalia_id">
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-sm" id="add_modal_personalia">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('footer-script')
<script type="text/javascript">
    $(".autocomplete-karyawan" ).autocomplete({
        minLength:0,
        limit: 25,
        source: function( request, response ) {
            $.ajax({
              url: "{{ route('ajax.get-karyawan-approval') }}",
              method : 'POST',
              data: {
                'name': request.term, 'jenis_form' : 'cuti', '_token' : $("meta[name='csrf-token']").attr('content')
              },
              success: function( data ) {
                response( data );
              }
            });
        },
        select: function( event, ui ) {
            $( ".modal_personalia_id" ).val(ui.item.id);
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    $('.add-atasan').click(function(){
        $('#modal_atasan').modal('show');
    });

    $('#add_modal_atasan').click(function(){

        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-cuti-atasan') }}',
            data: {'id' : $('.modal_atasan_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.add-personalia').click(function(){
        $('#modal_personalia').modal('show');
    });

    $('#add_modal_personalia').click(function(){

        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.add-setting-cuti-personalia') }}',
            data: {'id' : $('.modal_personalia_id').val(), '_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                location.reload();
            }
        });
    });
</script>
<style type="text/css">
    .ui-menu.ui-widget.ui-widget-content.ui-autocomplete.ui-front {
        z-index: 9999;
    }
</style>
@endsection

@endsection
