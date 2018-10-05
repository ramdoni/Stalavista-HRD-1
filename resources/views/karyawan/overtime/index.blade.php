@extends('layouts.karyawan')

@section('title', 'Overtime Sheet')

@if(cek_approval('overtime_sheet'))
    @section('page-create', route('karyawan.overtime.create'))
@endif

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NIK</th>
                <th>NAME</th>
                <th>TANGGAL OVERTIME</th>
                <th>STATUS</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>  
                    <td>{{ $item->user->nik }}</td>  
                    <td>{{ $item->user->name }}</td>  
                    <td>{{ date('d F Y', strtotime($item->created_at))}}</td>                                                   
                    <td>
                        <a href="javascript:;" onclick="status_approval_overtime({{ $item->id }})"> 
                            {!! status_overtime($item->status) !!}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('karyawan.overtime.edit', $item->id) }}" ><i class="la la-search-plus"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- sample modal content -->
<div id="modal_detail_overtime" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">DETAIL OVERTIME</h4>
            </div>
            <div class="modal-body">
                <form method="POST" class="form_ahli_waris" action="">
                    
                 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@section('footer-script')
<script type="text/javascript">
    function modal_detail_overtime(id)
    {
        $("#modal_detail_overtime").modal('show');
    }
</script>
@endsection

@endsection