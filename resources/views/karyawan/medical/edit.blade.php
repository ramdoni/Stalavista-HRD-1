@extends('layouts.karyawan')

@section('title', 'Medical Reimbursement')

@section('page-url', route('karyawan.medical.index'))

@section('content')
<form class="form-horizontal">

    <h3 class="box-title m-b-0">Form Medical Reimbursement</h3>
    <hr />
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
            <select name="user_id" class="form-control" readonly required>
                <option value="">Pilih Karyawan</option>
                @foreach($karyawan as $item)
                <option value="{{ $item->id }}" {{ $data->user_id == $item->id ? 'selected' : '' }}>{{ $item->nik .' / '.$item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="row">
                <p class="col-md-6">Jabatan</p>
                <p class="col-md-6">Division / Departement</p>
                <div class="col-md-6">
                    <input type="text" readonly="true" class="form-control jabatan" value="{{ $data->user->organisasi_job_role }}">
                </div>
                <div class="col-md-6">
                    <input type="text" readonly="true" class="form-control department" value="{{ $data->user->department->name }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <p class="col-md-12">Tanggal Pengajuan</p>
                <div class="col-md-6">
                    <input type="text" class="form-control" readonly name="tanggal_pengajuan" required value="{{ $data->tanggal_pengajuan }}" />
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>
    <div class="col-md-6 pull-left" style="padding-left:0;">
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
                  <th>JUMLAH DISETUJUI</th>
              </tr>
          </thead>
          <tbody class="table-claim">
            @php($total_pengajuan = 0)
            @php($total_approve = 0)
            @foreach($form as $key => $f)
            @php($total_pengajuan += $f->jumlah)
            @php($total_approve += $f->nominal_approve)
            <tr>
                <td>{{ $key+1 }}</td>
                <td><input type="text" class="form-control datepicker"  readonly="true" name="tanggal_kwitansi[]" value="{{ $f->tanggal_kwitansi }}"  /></td>
                 <td>
                    @if($data->user->id == $f->user_family_id)
                        <input type="text" readonly="true" class="form-control" value="Saya Sendiri">
                    @else
                        <input type="text" readonly="true" class="form-control" value="{{ $f->UserFamily->nama }}">
                    @endif
                </td>
                <td>
                    @if($data->user->id == $f->user_family_id)
                        <input type="text" readonly="true" class="form-control" value="{{ isset($f->user_family->name) ? $f->user_family->name : ''  }}" />
                    @else
                        <input type="text" readonly="true" class="form-control" value="{{ isset($f->UserFamily->nama) ? $f->UserFamily->nama : ''  }}" />
                    @endif
                </td>
                <td>
                    <select class="form-control" readonly>
                        <option value="">Pilih Jenis Klaim</option>
                        @foreach(jenis_claim_medical() as $k => $i)
                        <option value="{{ $k }}" {{ $f->jenis_klaim == $k ? 'selected' : '' }} >{{ $i }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                  <label class="btn btn-info btn-xs" onclick="show_file('{{ asset('storage/file-medical') }}/{{ $f->file_bukti_transaksi }}')"><i class="fa fa-file"></i> view</label>
                </td>
                <td><input type="text" class="form-control" value="{{ number_format($f->jumlah) }}" readonly /></td>
                <td><input type="text" class="form-control" value="{{ number_format($f->nominal_approve) }}" readonly /></td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="6" style="text-align: right">TOTAL</th>
                  <th>Rp. {{ number_format($total_pengajuan) }}</th>
                  <th>Rp. {{ number_format($total_approve) }}</th>
              </tr>
          </tfoot>
      </table>  
    </div>
    <br />
    <br />
    <div class="col-md-12">
        <a href="{{ route('karyawan.medical.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
        <br style="clear: both;" />
    </div>    
</form>    
@section('footer-script')
<script type="text/javascript">
    function show_file(img)
    {
        bootbox.alert('<img src="'+ img +'" style="width: 100%;" />');
    }
</script>

@endsection
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@endsection
