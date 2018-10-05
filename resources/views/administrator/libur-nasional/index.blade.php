@extends('layouts.administrator')

@section('title', 'National Holiday')

@section('sidebar')

@endsection

@section('page-title', 'National Holiday')

@section('page-url', route('administrator.libur-nasional.index'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>TANGGAL</th>
                <th>KETERANGAN</th>
                <th>CREATED</th>
                <th>MANAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>   
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('administrator.libur-nasional.edit', ['id' => $item->id]) }}"><i class="la la-edit"></i></a>
                        <a href="{{ route('administrator.libur-nasional.delete', ['id' => $item->id]) }}"><i class="la la-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- modal content education  -->
<div id="modal_import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <form method="POST" enctype="multipart/form-data" class="form-horizontal frm-modal-education" action="{{ route('administrator.libur-nasional.import') }}">
                    {{ csrf_field() }}
                    <h4 class="modal-title" id="myModalLabel">Import Data</h4> </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-3">File (xls)</label>
                            <div class="col-md-9">
                                <input type="file" name="file" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info btn-sm">Import</button>
                    </div>
                </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@section('footer-script')
<script type="text/javascript">
    $("#add-import-libur-nasional").click(function(){
        $("#modal_import").modal("show");
    })
</script>
@endsection

@endsection
