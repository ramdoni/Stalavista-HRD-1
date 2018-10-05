@extends('layouts.administrator')

@section('title', 'Employee')

@section('sidebar')

@endsection

@section('page-title', 'Employee')

@section('page-url', route('administrator.karyawan.index'))

@section('content')
    <div class="row">
        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.karyawan.store') }}" method="POST">
            <div class="col-md-12">
                <div class="white-box">
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
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" data-toggle="tab" aria-controls="biodata" aria-expanded="true" href="#biodata"><i class="la la-home"></i> Biodata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" aria-controls="dependent" aria-expanded="true" href="#dependent"><i class="la la-users"></i> Dependent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" aria-controls="education" aria-expanded="true" href="#education"><i class="la la-book"></i> Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" aria-controls="department" aria-expanded="true" href="#department"><i class="la la-sitemap"></i> Department / Division</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" data-toggle="tab" aria-controls="rekening_bank" aria-expanded="true" href="#rekening_bank"><i class="la la-bank"></i> Data Rekening Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" aria-controls="inventaris" aria-expanded="true"  href="#inventaris"><i class="la la-automobile"></i> Inventaris</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" data-toggle="tab" aria-controls="cuti" aria-expanded="true" href="#cuti"><i class="la la-calendar"></i> Cuti</a>
                        </li>                       
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="cuti">
                            <div class="card-body">
                                <div class="row" style="position: relative;">
                                    <button  type="button" class="btn btn-info btn-sm" id="add_cuti"><i class="fa fa-plus"></i> Add</button>
                                    <table class="table data-table-no-search">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Jenis Cuti</th>
                                                <th>Kuota</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_cuti"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="inventaris">
                            <div class="card-body">
                                <div class="row" style="position: relative;">
                                    <h4 class="card-title">Mobil</h4> 
                                    <button type="button" class="btn btn-info btn-sm" id="add_inventaris_mobil" style="position: absolute;right:10px;top:0;">Add</button>
                                    <table class="table data-table-no-search">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipe Mobil</th>
                                                <th>Tahun</th>
                                                <th>No Polisi</th>
                                                <th>Status Mobil</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_mobil"></tbody>
                                    </table>
                                </div>
                                <hr />
                                <div class="row" style="position: relative;">
                                    <h4 class="card-title">Lainnya</h4>
                                    <button type="button" class="btn btn-info btn-sm" style="position: absolute;right: 10px;top: 0;" id="add_inventaris_lainnya"><i class="fa fa-plus"></i> Add </button>
                                    <table class="table data-table-no-search">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Inventaris</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_inventaris_lainnya"></tbody>
                                    </table><br />
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="rekening_bank">
                            <div class="card-body">
                                <div class="form-group">
                                    <p>Nama Pemilik Rekening / Name of Account</p>
                                    <input type="text" name="nama_rekening" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <p>Nomor Rekening / Account Number</p>
                                    <input type="text" name="nomor_rekening" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <p>Nama Bank / Name of Bank</p>
                                    <select class="form-control" name="bank_id">
                                        <option value="">Pilih Bank</option>
                                        @foreach(get_bank() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="department">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <p>Branch Type</p>
                                        <select class="form-control" name="branch_type">
                                            <option value="">Pilih Branch Type</option>
                                            @foreach(['HO', 'BRANCH'] as $item)
                                            <option>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="section-cabang" style="display:none; width: 100%;">  
                                            <p>Cabang</p>
                                            <select class="form-control" name="cabang_id">
                                                <option value="">Pilih Cabang</option>
                                                @foreach(get_cabang() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select><br />
                                            <p> <label><input type="checkbox" name="is_pic_cabang" value="1"> PIC Cabang</label></p>
                                            <hr />
                                        </div>
                                    </div>
                                </div>

                                <div class="section-ho">
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Division</p>
                                            <select class="form-control" name="division_id">
                                                <option value="">Change Division</option>
                                                @foreach(get_organisasi_division() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Department</p>
                                            <select class="form-control" name="department_id">
                                                <option value="">Change Department</option>
                                               <!--  @foreach(get_organisasi_department() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach -->
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Unit / Section</p>
                                            <select class="form-control" name="section_id">
                                                <option value="">Change Section</option>
                                                <!-- @foreach(get_organisasi_unit() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach -->
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Position</p>
                                            <select class="form-control" name="organisasi_position">
                                                <option value="">Change Position</option>
                                               @foreach(get_organisasi_position() as $item)
                                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p>Job Rule</p>
                                            <input type="text" name="organisasi_job_role" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane active" id="biodata">
                            <br />
                            <div class="card-body">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <div class="col-md-6 pull-left" style="padding-left: 0">
                                        <div class="form-group">
                                            <p>Name</p>
                                            <input type="text" name="name" style="text-transform: uppercase"  class="form-control" value="{{ old('name')}}">
                                        </div>
                                        <div class="form-group">
                                            <p>Employee Number</p>
                                            <input type="text" name="employee_number" class="form-control" value="{{ old('employee_number')}}">
                                        </div>
                                        <div class="form-group">
                                            <p>Absensi Number</p>
                                            <input type="text" name="absensi_number" class="form-control" value="{{ old('employee_number')}}">
                                        </div>
                                        <div class="form-group">
                                            <p>NIK</p>
                                            <input type="text" name="nik" value="{{ old('nik')}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>LDAP</p>
                                            <input type="number" name="ldap" value="{{ old('ldap')}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>Place of Birth</p>
                                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir')}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>Date of Birth</p>
                                            <input type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir')}}" class="form-control datepicker">
                                        </div>
                                        <div class="form-group">
                                            <p>Marital Status</p>
                                            <input type="text" name="marital_status" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>Gender</p>
                                            <select class="form-control" name="jenis_kelamin" required>
                                                <option value=""> - Jenis Kelamin - </option>
                                                @foreach(['Laki-laki', 'Perempuan'] as $item)
                                                    <option>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p>Blood Type</p>
                                            <input type="text" class="form-control" name="blood_type">
                                        </div>
                                        <div class="form-group">
                                            <p>Email</p>
                                            <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="example-email">
                                        </div>
                                        <div class="form-group">
                                            <p>Password</p>
                                            <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>Confirm Password</p>
                                            <input type="password" name="confirm" value="{{ old('confirm') }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>Join Date</p>
                                            <input type="text" name="join_date" value="{{ old('join_date') }}" class="form-control datepicker">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-6">Employee Status</label>
                                                <label class="col-md-6">Status Login</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="organisasi_status">
                                                        <option value="">- selectd - </option>
                                                        @foreach(['Permanent', 'Contract'] as $item)
                                                        <option {{ old('organisasi_status') == $item ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pull-left" style="padding-left: 0">
                                        <div class="form-group">
                                            <p>NPWP Number</p>
                                            <input type="text" name="npwp_number" value="{{ old('npwp_number') }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>BPJS Number</p>
                                            <input type="text" name="no_bpjs_number" value="{{ old('no_bpjs_number') }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>ID Number</p>
                                            <input type="text" name="ktp_number" value="{{ old('ktp_number') }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>Passport Number</p>
                                            <input type="text" name="passport_number" value="{{ old('passport_number') }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>KK Number</p>
                                            <input type="text" name="kk_number" value="{{ old('kk_number') }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>Telepon</p>
                                            <input type="number" value="{{ old('telepon') }}" name="telepon" class="form-control">
                                        </div>
                                         <div class="form-group">
                                            <p>Mobile 1</p>
                                            <input type="number" name="mobile_1" value="{{ old('mobile_1') }}"  value="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <p>Mobile 2</p>
                                            <input type="number" name="mobile_2" value="{{ old('mobile_2') }}" class="form-control">
                                        </div>
                                       <div class="form-group">
                                            <p>Religion</p>
                                            <select class="form-control" name="agama">
                                                <option value=""> - Religion - </option>
                                                @foreach(agama() as $item)
                                                    <option value="{{ $item }}" {{ old('agama') == $item ? 'selected' : '' }}> {{ $item }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p>Current Address</p>
                                            <textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <p>ID Addres</p>
                                            <textarea class="form-control" name="id_address">{{ old('id_address') }}</textarea>
                                        </div>
                                       <div class="form-group">
                                            <p>ID City</p>
                                            <select class="form-control" name="id_city">
                                                <option value="">- none - </option>
                                                @foreach(get_kabupaten() as $item)
                                                <option value="{{ $item->id }}" {{ old('id_city') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p>ID Zip Code</p>
                                            <input type="text" name="id_zip_code" value="{{ old('id_zip_code') }}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <p>Foto</p>
                                            <input type="file" name="foto" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="dependent">
                            <div class="card-body">
                                <div class="row">
                                    <button type="button" class="btn btn-info btn-sm" id="btn_modal_dependent"> Add</button>
                                    <div class="table-responsive">
                                        <table class="data-table-no-filter table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nama</th>
                                                    <th>Hubungan</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Tanggal Meninggal</th>
                                                    <th>Jenjang Pendidikan</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Tertanggung</th>
                                                </tr>
                                            </thead>
                                            <tbody class="dependent_table"></tbody>
                                        </table><br /><br />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="education">
                            <div class="card-body">
                                <div class="row">
                                    <button class="btn btn-info btn-sm" id="btn_modal_education"><i class="fa fa-plus"></i> Add</button>
                                    <div class="table-responsive">
                                        <table class="table data-table-no-search">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Pendidikan</th>
                                                    <th>Tahun Awal</th>
                                                    <th>Tahun Akhir</th>
                                                    <th>Nama Sekolah / Fakultas</th>
                                                    <th>Jurusan</th>
                                                    <th>Nilai</th>
                                                    <th>City</th>
                                                </tr>
                                            </thead>
                                            <tbody class="education_table"></tbody>
                                        </table><br /><br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <a href="{{ route('administrator.karyawan.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Cancel</a>
                    <button type="submit" class="btn btn-sm btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i> Simpan Data Karyawan</button>
                    <br style="clear: both;" />
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>                    
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->

<!-- modal content dependent  -->
<div id="modal_dependent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Dependent</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal frm-modal-dependent">
                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control modal-nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Hubungan</label>
                            <div class="col-md-12">
                                <select class="form-control modal-hubungan">
                                    <option value="">Pilih Hubungan</option>
                                    <option value="Suami">Suami</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Ayah Kandung">Ayah Kandung</option>
                                    <option value="Ibu Kandung">Ibu Kandung</option>
                                    <option value="Anak 1">Anak 1</option>
                                    <option value="Anak 2">Anak 2</option>
                                    <option value="Anak 3">Anak 3</option>
                                    <option value="Anak 4">Anak 4</option>
                                    <option value="Anak 5">Anak 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tempat Lahir</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control modal-tempat_lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tanggal Lahir</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control datepicker modal-tanggal_lahir">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-12">Tanggal Meninggal</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control datepicker modal-tanggal_meninggal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Jenjang Pendidikan</label>
                            <div class="col-md-12">
                                <select class="form-control modal-jenjang_pendidikan">
                                    <option value="">Pilih Jenjang Pendidikan</option>
                                    <option value="TK">TK</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA / SMK">SMA / SMK</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Pekerjaan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control modal-pekerjaan" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tertanggung</label>
                            <div class="col-md-12">
                                <select class="form-control modal-tertanggung">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_dependent">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- modal content education  -->
<div id="modal_education" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Education</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal frm-modal-education">
                        <div class="form-group">
                            <label class="col-md-3">Pendidikan</label>
                            <div class="col-md-9">
                                <select class="form-control modal-pendidikan">
                                    <option value="">Pilih Pendidikan</option>
                                    <option>SMA</option>
                                    <option>D3</option>
                                    <option>S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Tahun Awal</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control modal-tahun_awal" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Tahun Akhir</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control modal-tahun_akhir" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Nama Sekolah / Fakultas</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control modal-fakultas" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Jurusan</label>
                            <div class="col-md-9">
                                <select class="form-control modal-jurusan">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach(get_program_studi() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Nilai</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control modal-nilai" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Kota</label>
                            <div class="col-md-9">
                                <select class="form-control" onchange="get_kabupaten(this)">
                                    <option>Pilih Provinsi</option>
                                    @foreach(get_provinsi() as $item)
                                    <option value="{{ $item->id_prov }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control modal-kota">
                                    <option>Pilih Kabupaten / Kota</option>
                                </select>
                            </div>
                        </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_education">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal content education  -->
<div id="modal_inventaris_mobil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Inventaris Mobil</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal frm-modal-inventaris">
                        <div class="form-group">
                            <label class="col-md-12">Tipe Mobil</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control modal-tipe_mobil">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tahun</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control modal-tahun">
                            </div>
                       </div>
                       <div class="form-group">
                            <label class="col-md-12">No Polisi</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control modal-no_polisi">
                            </div>
                       </div>
                       <div class="form-group">
                            <label class="col-md-12">Status Mobil</label>
                            <div class="col-md-12">
                                <select class="form-control modal-status_mobil">
                                    <option value="">- none -</option>
                                    <option>Rental</option>
                                    <option>Perusahaan</option>
                                </select>
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_inventaris_mobil">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal content education  -->
<div id="modal_inventaris_lainnya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Inventaris Lainnya</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal frm-modal-inventaris">
                        <div class="form-group">
                            <label class="col-md-12">Jenis Inventaris</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control modal-inventaris-jenis">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Keterangan</label>
                            <div class="col-md-12">
                                <textarea class="form-control modal-inventaris-description"></textarea>
                            </div>
                       </div>
                      
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_inventaris_lainnya">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal content education  -->
<div id="modal_cuti" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Jenis Cuti</h4> </div>
                <div class="modal-body">
                   <form class="form-horizontal frm-modal-cuti">
                        <div class="form-group">
                            <label class="col-md-12">Jenis Cuti</label>
                            <div class="col-md-12">
                                <select class="form-control modal-jenis_cuti">
                                    <option value="">- none -</option>
                                    @foreach(get_master_cuti() as $i)
                                    <option value="{{ $i->id }}">{{ $i->jenis_cuti }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Kuota</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control modal-kuota">
                            </div>
                       </div>
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_cuti">Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('footer-script')
    <style type="text/css">
        .staff-branch-select, .head-branch-select {
            display: none;
        }
    </style>
    <!-- Date picker plugins css -->
    <script type="text/javascript">

         $("select[name='jabatan_cabang']").on('change', function(){

            if($(this).val() =='Staff')
            {
                $('.head-branch-select').hide();
                $('.staff-branch-select').show();
            }
            else if($(this).val() =='Head')
            {
                $('.head-branch-select').show();
                $('.staff-branch-select').hide();   
            }
            else
            {
                $('.head-branch-select').hide();
                $('.staff-branch-select').hide();
            }

        });

        $("select[name='branch_type']").on('change', function(){

            if($(this).val() == 'BRANCH')
            {
                $(".section-cabang").show();
            }
            else
            {
                $(".section-cabang").hide();
            }
        });


        $("#add_inventaris_lainnya").click(function(){

            $("#modal_inventaris_lainnya").modal('show');
        });

        $("#add_modal_inventaris_lainnya").click(function(){

            var el = '<tr>';
            var modal_jenis            = $('.modal-inventaris-jenis').val();
            var modal_description                 = $('.modal-inventaris-description').val();
            
            el += '<td>'+ (parseInt($('.table_mobil tr').length) + 1)  +'</td>';
            el +='<td>'+ modal_jenis +'</td>';
            el +='<td>'+ modal_description +'</td>';;
            el +='<input type="hidden" name="inventaris_lainnya[jenis][]" value="'+ modal_jenis +'" />';
            el +='<input type="hidden" name="inventaris_lainnya[description][]" value="'+ modal_description +'" />';

            $('.table_inventaris_lainnya').append(el);
            $('#modal_inventaris_lainnya').modal('hide');
        });

        $("#add_cuti").click(function(){
            $("#modal_cuti").modal('show');
        });

        $("#add_modal_cuti").click(function(){

            var jenis_cuti = $('.modal-jenis_cuti :selected');
            var kuota = $('.modal-kuota').val();

            var el = '<tr><td>'+ (parseInt($('.table_cuti tr').length) + 1) +'</td><td>'+ jenis_cuti.text() +'</td><td>'+ kuota +'</td></tr>';
            
            el += '<input type="hidden" name="cuti[cuti_id][]" value="'+ jenis_cuti.val() +'" />';
            el += '<input type="hidden" name="cuti[kuota][]" value="'+ kuota +'" />';

            $("form.frm-modal-cuti").trigger('reset');

            $('.table_cuti').append(el);

            $("#modal_cuti").modal('hide');
        });

        $("#add_inventaris_mobil").click(function(){

            $("#modal_inventaris_mobil").modal('show');
        });

        $("#add_modal_inventaris_mobil").click(function(){

            var el = '<tr>';
            var modal_tipe_mobil            = $('.modal-tipe_mobil').val();
            var modal_tahun                 = $('.modal-tahun').val();
            var modal_no_polisi             = $('.modal-no_polisi').val();
            var modal_status_mobil          = $('.modal-status_mobil').val();
            
            el += '<td>'+ (parseInt($('.table_mobil tr').length) + 1)  +'</td>';
            el +='<td>'+ modal_tipe_mobil +'</td>';
            el +='<td>'+ modal_tahun +'</td>';
            el +='<td>'+ modal_no_polisi +'</td>';
            el +='<td>'+ modal_status_mobil +'</td>';
            el +='<input type="hidden" name="inventaris_mobil[tipe_mobil][]" value="'+ modal_tipe_mobil +'" />';
            el +='<input type="hidden" name="inventaris_mobil[tahun][]" value="'+ modal_tahun +'" />';
            el +='<input type="hidden" name="inventaris_mobil[no_polisi][]" value="'+ modal_no_polisi +'" />';
            el +='<input type="hidden" name="inventaris_mobil[status_mobil][]" value="'+ modal_status_mobil +'" />';

            $('.table_mobil').append(el);
            $('#modal_inventaris_mobil').modal('hide');
        });


        $("#add_modal_dependent").click(function(){

            var el = '<tr>';
            var modal_nama                  = $('.modal-nama').val();
            var modal_hubungan              = $('.modal-hubungan').val();
            var modal_tempat_lahir          = $('.modal-tempat_lahir').val();
            var modal_tanggal_lahir         = $('.modal-tanggal_lahir').val();
            var modal_tanggal_meninggal     = $('.modal-tanggal_meninggal').val();
            var modal_jenjang_pendidikan    = $('.modal-jenjang_pendidikan').val();
            var modal_pekerjaan             = $('.modal-pekerjaan').val();
            var modal_tertanggung           = $('.modal-tertanggung').val();
            
            el += '<td>'+ parseInt($('.dependent_table tr').length) + 1  +'</td>';
            el +='<td>'+ modal_nama +'</td>';
            el +='<td>'+ modal_hubungan +'</td>';
            el +='<td>'+ modal_tempat_lahir +'</td>';
            el +='<td>'+ modal_tanggal_lahir +'</td>';
            el +='<td>'+ modal_tanggal_meninggal +'</td>';
            el +='<td>'+ modal_jenjang_pendidikan +'</td>';
            el +='<td>'+ modal_pekerjaan +'</td>';
            el +='<td>'+ modal_tertanggung +'</td>';
            el +='<input type="hidden" name="dependent[nama][]" value="'+ modal_nama +'" />';
            el +='<input type="hidden" name="dependent[hubungan][]" value="'+ modal_hubungan +'" />';
            el +='<input type="hidden" name="dependent[tempat_lahir][]" value="'+ modal_tempat_lahir +'" />';
            el +='<input type="hidden" name="dependent[tanggal_lahir][]" value="'+ modal_tanggal_lahir +'" />';
            el +='<input type="hidden" name="dependent[tanggal_meninggal][]" value="'+ modal_tanggal_meninggal +'" />';
            el +='<input type="hidden" name="dependent[jenjang_pendidikan][]" value="'+ modal_tanggal_meninggal +'" />';
            el +='<input type="hidden" name="dependent[pekerjaan][]" value="'+ modal_pekerjaan +'" />';
            el +='<input type="hidden" name="dependent[tertanggung][]" value="'+ modal_tertanggung +'" />';

            $('.dependent_table').append(el);
            $('.frm-modal-dependent').trigger('reset');
            $('#modal_dependent').modal('hide');
        });

        $("#add_modal_education").click(function(){

            var el = '<tr>';
            var modal_pendidikan            = $('.modal-pendidikan').val();
            var modal_tahun_awal            = $('.modal-tahun_awal').val();
            var modal_tahun_akhir           = $('.modal-tahun_akhir').val();
            var modal_fakultas              = $('.modal-fakultas').val();
            var modal_jurusan               = $('.modal-jurusan').val();
            var modal_nilai                 = $('.modal-nilai').val();
            var modal_kota                  = $('.modal-kota').val();
            
            el += '<td>'+ (parseInt($('.education_table tr').length) + 1 )  +'</td>';
            el +='<td>'+ modal_pendidikan +'</td>';
            el +='<td>'+ modal_tahun_awal +'</td>';
            el +='<td>'+ modal_tahun_akhir +'</td>';
            el +='<td>'+ modal_fakultas +'</td>';
            el +='<td>'+ modal_jurusan +'</td>';
            el +='<td>'+ modal_nilai +'</td>';
            el +='<td>'+ modal_kota +'</td>';
            el +='<input type="hidden" name="education[pendidikan][]" value="'+ modal_pendidikan +'" />';
            el +='<input type="hidden" name="education[tahun_awal][]" value="'+ modal_tahun_awal +'" />';
            el +='<input type="hidden" name="education[tahun_akhir][]" value="'+ modal_tahun_akhir +'" />';
            el +='<input type="hidden" name="education[fakultas][]" value="'+ modal_fakultas +'" />';
            el +='<input type="hidden" name="education[jurusan][]" value="'+ modal_jurusan +'" />';
            el +='<input type="hidden" name="education[nilai][]" value="'+ modal_nilai +'" />';
            el +='<input type="hidden" name="education[kota][]" value="'+ modal_kota +'" />';

            $('.education_table').append(el);

            $('#modal_education').modal('hide');
            $('form.frm-modal-education').reset();
        });

        $("#btn_modal_dependent").click(function(){

            $('#modal_dependent').modal('show');

        });

         $("#btn_modal_education").click(function(){

            $('#modal_education').modal('show');

        });

        function get_kabupaten(el)
        {
            var id = $(el).val();

            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get-kabupaten-by-provinsi') }}',
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType: 'json',
                success: function (data) {

                    var html_ = '<option value="">Pilih Kabupaten</option>';

                    $(data.data).each(function(k, v){
                        html_ += "<option value=\""+ v.id_kab +"\">"+ v.nama +"</option>";
                    });

                    $(el).parent().find('select').html(html_);
                }
            });
        }

        $("select[name='provinsi_id']").on('change', function(){

            var id = $(this).val();

            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get-kabupaten-by-provinsi') }}',
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType: 'json',
                success: function (data) {

                    var html_ = '<option value="">Pilih Kabupaten</option>';

                    $(data.data).each(function(k, v){
                        html_ += "<option value=\""+ v.id_kab +"\">"+ v.nama +"</option>";
                    });

                    $("select[name='kabupaten_id'").html(html_);
                }
            });
        });

        $("select[name='kabupaten_id']").on('change', function(){

            var id = $(this).val();

            $.ajax({
                    type: 'POST',
                    url: '{{ route('ajax.get-kecamatan-by-kabupaten') }}',
                    data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                    dataType: 'json',
                    success: function (data) {

                        var html_ = '<option value=""> Pilih Kecamatan</option>';

                        $(data.data).each(function(k, v){
                            html_ += "<option value=\""+ v.id_kec +"\">"+ v.nama +"</option>";
                        });

                        $("select[name='kecamatan_id'").html(html_);
                    }
            });
        });

        $("select[name='kecamatan_id']").on('change', function(){

            var id = $(this).val();

            $.ajax({
                    type: 'POST',
                    url: '{{ route('ajax.get-kelurahan-by-kecamatan') }}',
                    data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                    dataType: 'json',
                    success: function (data) {

                        var html_ = '<option value=""> Pilih Kelurahan</option>';

                        $(data.data).each(function(k, v){
                            html_ += "<option value=\""+ v.id_kel +"\">"+ v.nama +"</option>";
                        });

                        $("select[name='kelurahan_id'").html(html_);
                    }
            });
        });

        $("select[name='division_id']").on('change', function(){

            var id = $(this).val();

            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get-department-by-division') }}',
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType: 'json',
                success: function (data) {

                    var html_ = '<option value=""> Pilih Department</option>';

                    $(data.data).each(function(k, v){
                        html_ += "<option value=\""+ v.id +"\">"+ v.name +"</option>";
                    });

                    $("select[name='department_id'").html(html_);
                }
            });
        });

        $("select[name='department_id']").on('change', function(){

            var id = $(this).val();

            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get-section-by-department') }}',
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType: 'json',
                success: function (data) {

                    var html_ = '<option value=""> Pilih Section</option>';

                    $(data.data).each(function(k, v){
                        html_ += "<option value=\""+ v.id +"\">"+ v.name +"</option>";
                    });

                    $("select[name='section_id'").html(html_);
                }
            });
        });
    </script>
@endsection

@endsection
