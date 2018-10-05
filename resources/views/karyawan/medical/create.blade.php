@extends('layouts.karyawan')

@section('title', 'Medical Reimbursement')

@section('page-url', route('karyawan.medical.index'))

@section('content')
<form enctype="multipart/form-data" action="{{ route('karyawan.medical.store') }}" id="form-medical" method="POST"  autocomplete="off">

    <h3 class="box-title m-b-0">Form Medical Reimbursement</h3>
    <br />
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    {{ csrf_field() }}
    <div class="col-md-6 pull-left" style="padding-left: 0;">
        <div class="form-group">
            <p>NIK / Nama Karyawan</p>
            <input type="text" readonly="" class="form-control" value="{{ Auth::user()->nik .' - '. Auth::user()->name }}">
        </div>
        <div class="form-group">
            <div class="row">
                <p class="col-md-6">Jabatan</p>
                <p class="col-md-6">Division / Departement</p>
                <div class="col-md-6">
                    <input type="text" readonly="true" class="form-control jabatan" value="{{ Auth::user()->organisasi_job_role }}">
                </div>
                <div class="col-md-6">
                    <input type="text" readonly="true" class="form-control department" value="{{ isset(Auth::user()->department->name) ? Auth::user()->department->name : '' }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <p class="col-md-12">Tanggal Pengajuan</p>
                <div class="col-md-6">
                    <input type="text" class="form-control" readonly="true" name="tanggal_pengajuan" value="{{ date('Y-m-d') }}" required />
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>
    <div class="col-md-6 pull-left" style="padding-left:0;">
        <br />
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Rawat Jalan</td>
                    <td>Kuitansi Asli/Struk, Diagnosa, Copy Resep, Copy, Hasil scan (jika ada), kode Gigi (jika klaim gigi)</td>
                </tr>
                <tr>
                    <td>Rawat Inap</td>
                    <td>Kuitansi asli, Diagnosa, Copy Resep, Copy hasil scan (jika ada)</td>
                </tr>
                <tr>
                    <td>Melahirkan</td>
                    <td>Kuitansi Asli, Surat Keterangan Lahir</td>
                </tr>
                <tr>
                    <td>Kacamata</td>
                    <td>Kuitansi Asli, Pemerikasaan Dokter Mata (untuk permata kali)</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
    <div>
      <table class="table table-hover">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>TANGGAL KWITANSI</th>
                  <th>HUBUNGAN</th>
                  <th>NAMA PASIEN</th>
                  <th>JENIS KLAIM</th>
                  <th>FILE BUKTI TRANSAKSI</th>
                  <th>JUMLAH</th>
                  <th></th>
              </tr>
          </thead>
          <tbody class="table-claim">
            <tr class="oninput">
                <td>1</td>
                <td><input type="text" class="form-control datepicker-ui input-medical" required name="tanggal_kwitansi[]"  /></td>
                <td>
                    <select name="user_family_id[]" class="form-control input-medical" onchange="select_hubungan(this)" required>
                        <option value="">Pilih Hubungan</option>
                        <option value="{{ \Auth::user()->id }}" data-nama="{{ \Auth::user()->name }}">Saya Sendiri</option>
                        @foreach(Auth::user()->userFamily as $item)
                        <option value="{{ $item->id }}" data-nama="{{ $item->nama }}">{{ $item->hubungan }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" readonly="true" class="form-control nama_hubungan" /></td>
                <td>
                    <select name="jenis_klaim[]" class="form-control input" required>
                        <option value="">Pilih Jenis Klaim</option>
                        @foreach(jenis_claim_medical() as $k => $i)
                        <option value="{{ $k }}">{{ $i }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="file" class="form-control input-medical" name="file_bukti_transaksi[]" required /></td>
                <td><input type="text" class="form-control input-medical price_format" name="jumlah[]" required /></td>
            </tr>
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="6" style="text-align: right;">TOTAL : </th>
                  <th class="th-total"></th>
              </tr>
          </tfoot>
      </table>
      <span class="btn btn-light btn-sm pull-right" id="add"><i class="la la-plus"></i></span>
    </div>
    <div class="clearfix"></div>
    <br />
    <hr />
    <div class="form-group">
        <div class="col-md-12">
            <a href="{{ route('administrator.overtime.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Cancel</a>
            <button type="button" class="btn btn-sm btn-success waves-effect waves-light m-r-10" id="btn_submit"><i class="fa fa-save"></i> Submit Medical Reimbursement</button>
            <br style="clear: both;" />
        </div>
    </div>
</form>
@section('footer-script')
<script type="text/javascript">
    var list_atasan = [];

    @foreach(get_atasan_langsung() as $item)
        list_atasan.push({id : {{ $item->id }}, value : '{{ $item->nik .' - '. $item->name.' - '. $item->job_rule }}',  });
    @endforeach
</script>
<script type="text/javascript">

    validate_form = true;

    show_hide_add();
    cek_button_add();

    $(".autcomplete-atasan" ).autocomplete({
        source: list_atasan,
        minLength:0,
        select: function( event, ui ) {
            $( "input[name='atasan_user_id']" ).val(ui.item.id);

            var id = ui.item.id;

            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get-karyawan-by-id') }}',
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType: 'json',
                success: function (data) {

                    $('.jabatan_atasan').val(data.data.organisasi_job_role);
                    $('.department_atasan').val(data.data.department_name);
                    $('.no_handphone_atasan').val(data.data.telepon);
                    $('.email_atasan').val(data.data.email);
                }
            });
        }
    }).on('focus', function () {
            $(this).autocomplete("search", "");
    });

    var data_dependent = [];

    $("#btn_submit").click(function(){

        if(!validate_form)
        {
            bootbox.alert('Form harus diisi semua ?');

            return false;
        }

        bootbox.confirm('Proses Form Medical Reimbursement ?', function(result){
            if(result)
            {
                $("#form-medical").submit();
            }
        });
    });

    function select_hubungan(el)
    {
        var nama_hubungan = $(el).find(":selected").data('nama');

        if(nama_hubungan == "") return false;

        $(el).parent().parent().find('.nama_hubungan').val(nama_hubungan);
    }


    $("#add").click(function(){

        var no = $('.table-claim tr').length;

        var html =  '<tr class="oninput">'+
                        '<td>'+(no+1)+'</td>'+
                        '<td><input type="text" class="form-control datepicker input-medical" required name="tanggal_kwitansi[]" /></td>'+
                        '<td>'+
                            '<select name="user_family_id[]" class="form-control input-medical" onchange="select_hubungan(this)" required>'+
                                '<option value="">Pilih Hubungan</option><option value="{{ \Auth::user()->id }}" data-nama="{{ \Auth::user()->name }}">Saya Sendiri</option>@foreach(Auth::user()->userFamily as $item)<option value="{{ $item->id }}" data-nama="{{ $item->nama }}">{{ $item->hubungan }}</option>@endforeach'+
                            '</select>'+
                        '</td>'+
                        '<td><input type="text" readonly="true" class="form-control nama_hubungan" /></td>'+
                        '<td>'+
                            '<select name="jenis_klaim[]" class="form-control input-medical" required>'+
                                '<option value="">Pilih Jenis Klaim</option>@foreach(jenis_claim_medical() as $k => $i)<option value="{{ $k }}">{{ $i }}</option>@endforeach'+
                            '</select>'+
                        '</td>'+
                        '<td><input type="file" class="form-control input-medical" name="file_bukti_transaksi[]" required /></td>'+
                        '<td><input type="text" class="form-control input-medical price_format" name="jumlah[]" required /></td>'+
                        '<td><a class="btn btn-danger btn-xs" onclick="hapus_item(this)"><i class="fa fa-trash"></i></a></td>'+
                        '</tr>';

        $('.table-claim').append(html);

        init_datepicker();

        cek_button_add();
        show_hide_add();
        start_price_format();
    });

function show_hide_add()
{
    $("#add").show();
    validate_form = true;
    $('.oninput .input-medical').each(function(){

        if($(this).val() == "")
        {
            $("#add").hide();
            validate_form = false;
        }
    });

    var total_nominal = 0;
    $(".oninput input[name='jumlah[]']").each(function(){
        if($(this).val() != "")
        {
            total_nominal += parseInt($(this).val().replace(',','').replace(',', ''));
        }
    });

    $('.th-total').html(numberWithComma(total_nominal));

}

function cek_button_add() 
{
    $('.oninput input').on('keyup',function(){
        show_hide_add();
    });

    $('.oninput select').on('change',function(){
        show_hide_add();
    });
}

function hapus_item(el)
{
    if(confirm("Hapus item ?"))
    {
        $(el).parent().parent().remove();
        cek_button_add()
    }
}

</script>

@endsection
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@endsection
