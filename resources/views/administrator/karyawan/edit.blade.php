@extends('layouts.administrator')

@section('title', 'Karyawan - PT. Arthaasia Finance')

@section('sidebar')

@endsection

@section('content')

<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Karyawan</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Karyawan</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
    <div class="row">
        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.karyawan.update', $data->id ) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
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

                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#biodata" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Biodata</span></a></li>

                        <li role="presentation" class=""><a href="#dependent" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Dependent</span></a></li>
                        
                        <li role="presentation" class=""><a href="#education" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Education</span></a></li>

                        <li role="presentation" class=""><a href="#department" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Department / Division</span></a></li>

                        <li role="presentation" class=""><a href="#rekening_bank" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Data Rekening Bank</span></a></li>

                        <li role="presentation" class=""><a href="#inventaris" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Inventaris</span></a></li>

                        <li role="presentation" class=""><a href="#cuti" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Cuti</span></a></li>
                    </ul>

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade" id="cuti">
                            <h3>Cuti</h3>
                            <a class="btn btn-info btn-xs" id="add_cuti"><i class="fa fa-plus"></i> Tambah</a>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Jenis Cuti / Ijin</th>
                                            <th>Kuota</th>
                                            <th>Terpakai</th>
                                            <th>Sisa Cuti</th>
                                            <td>#</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table_cuti">
                                        @foreach($data->cuti as $no => $item)
                                        <tr>
                                            <td>{{ $no+1 }}</td>
                                            <td>{{ isset($item->cuti->jenis_cuti) ? $item->cuti->jenis_cuti : '' }}</td>
                                            <td>{{ $item->kuota }}</td>
                                            <td>{{ $item->cuti_terpakai }}</td>
                                            <td>{{ $item->sisa_cuti }}</td>
                                            <td>
                                                <a onclick="edit_cuti({{ $item->id }}, {{ $item->cuti_id }}, {{ empty($item->kuota) ? 0 : $item->kuota  }}, {{ empty($item->cuti_terpakai) ? 0 :$item->cuti_terpakai }})" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> </a>
                                                <a href="{{ route('administrator.karyawan.delete-cuti', $item->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="inventaris">
                            <h3>Mobil</h3>
                            <a class="btn btn-info btn-xs" id="add_inventaris_mobil"><i class="fa fa-plus"></i> Tambah</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipe Mobil</th>
                                        <th>Tahun</th>
                                        <th>No Polisi</th>
                                        <th>Status Mobil</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table_mobil">
                                    @foreach($data->inventaris_mobil as $no => $item)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $item->tipe_mobil }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->no_polisi }}</td>
                                        <td>{{ $item->status_mobil }}</td>
                                        <td>
                                            <a class="btn btn-default btn-xs" onclick="edit_inventaris_mobil({{ $item->id }}, '{{ $item->tipe_mobil }}','{{ $item->tahun }}', '{{ $item->no_polisi }}', '{{ $item->status_mobil }}')"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('administrator.karyawan.delete-inventaris-mobil', $item->id) }}" onclick="return confirm('Hapus data ini ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br />

                            <br />
                            <h3>Lainnya</h3>
                            <a class="btn btn-info btn-xs" id="add_inventaris_lainnya"><i class="fa fa-plus"></i> Tambah</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Inventaris</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table_inventaris_lainnya">
                                    @foreach($data->inventaris as $no => $item)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a class="btn btn-default btn-xs" onclick="edit_inventaris_lainnya({{ $item->id }}, '{{ $item->jenis }}', '{{ $item->description }}')"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('administrator.karyawan.delete-inventaris-lainnya', $item->id) }}" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table><br />
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="rekening_bank">
                            <div class="form-group">
                                <label class="col-md-12">Nama Pemilik Rekening / Name of Account</label>
                                <div class="col-md-6">
                                    <input type="text" name="nama_rekening" class="form-control" value="{{ $data->nama_rekening }}"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nomor Rekening / Account Number</label>
                                <div class="col-md-6">
                                   <input type="text" name="nomor_rekening" class="form-control" value="{{ $data->nomor_rekening }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama Bank / Name of Bank</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="bank_id">
                                        <option value="">Pilih Bank</option>
                                        @foreach(get_bank() as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $data->bank_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="department">
                            <div class="form-group">
                                <label class="col-md-12">Branch Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="branch_type">
                                        <option value=""> - none - </option>
                                        @foreach(['HO', 'BRANCH', 'VSBD'] as $item)
                                        <option {{ $data->branch_type == $item ? ' selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                           
                            <div class="form-group section-cabang" style="{{ $data->branch_type == "HO" ? 'display:none' : ''  }}">
                                <label class="col-md-3">Cabang</label>
                                <div class="clearfix"></div>
                                <div class="col-md-3">
                                    <select class="form-control" name="cabang_id">
                                        <option value="">Pilih Cabang</option>
                                        @foreach(get_cabang() as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $data->cabang_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="clearfix" /></div>
                                <br class="clearfix" />
                                <br>
                                <div class="col-md-12">
                                    <label><input type="checkbox" name="is_pic_cabang" value="1" {{ $data->is_pic_cabang == 1 ? 'checked' : '' }}> PIC Cabang</label>
                                </div>
                                <div class="clearfix"></div>
                                <hr />
                            </div>

                            <div class="section-ho">
                                <div class="form-group">
                                    <label class="col-md-12">Division</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="division_id">
                                            <option value="">Pilih Division</option>
                                            @foreach(get_organisasi_division() as $item)
                                            <option value="{{ $item->id }}" {{ $data->division_id == $item->id ? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Department</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="department_id">
                                            <option value="">Pilih Department</option>
                                            @if(!empty($data->division_id)) 
                                                @if(isset($data->department->name))
                                                    @foreach(get_organisasi_department($data->division_id) as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $data->department_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Unit / Section</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="section_id">
                                            <option value="">Pilih Section</option>
                                            @if(!empty($data->department_id))
                                                @if(isset($data->section->name))
                                                    @foreach(get_organisasi_unit($data->department_id) as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $data->section_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Position</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="organisasi_position">
                                            @foreach(get_organisasi_position() as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $data->organisasi_position ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Job Rule</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{ $data->organisasi_job_role }}" name="organisasi_job_role" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade active in" id="biodata">
                            <h3 class="box-title m-b-0">Biodata</h3>
                            <br />
                            <br />
                            {{ csrf_field() }}
                            <div class="col-md-6" style="padding-left: 0">
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" style="text-transform: uppercase" class="form-control" value="{{ $data->name }}"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Employee Number</label>
                                    <div class="col-md-10">
                                        <input type="text" name="employee_number" class="form-control" value="{{ $data->employee_number }}"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Absensi Number</label>
                                    <div class="col-md-10">
                                        <input type="text" name="absensi_number" class="form-control" value="{{ $data->employee_number }}"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">NIK</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nik" value="{{ $data->nik }}" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Ext</label>
                                    <div class="col-md-10">
                                        <input type="text" name="ext" value="{{ $data->ext }}" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">LDAP</label>
                                    <div class="col-md-10">
                                        <input type="number" name="ldap" value="{{ $data->ldap }}" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Place of Birth</label>
                                    <div class="col-md-10">
                                        <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir }}" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date of Birth</label>
                                    <div class="col-md-10">
                                        <input type="text" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" class="form-control datepicker"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Marital Status</label>
                                    <div class="col-md-10">
                                        <input type="text" name="marital_status" value="{{ $data->marital_status }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Gender</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value=""> - Gender - </option>
                                            @foreach(['Laki-laki', 'Perempuan'] as $item)
                                                <option {{ $data->jenis_kelamin == $item ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Blood Type</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{ $data->blood_type }}" name="blood_type"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" value="{{ $data->email }}" class="form-control" name="email" id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Confirm Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="confirm" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Join Date</label>
                                    <div class="col-md-12">
                                        <input type="text" name="join_date" class="form-control datepicker" value="{{ ($data->join_date == '0000-00-00' ? '' : $data->join_date) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">Employee Status</label>
                                    <label class="col-md-6">Status Login</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="organisasi_status">
                                            <option value="">- select - </option>
                                            @foreach(['Permanent', 'Contract'] as $item)
                                            <option {{ $data->organisasi_status == $item ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-left: 0">
                                <div class="form-group">
                                    <label class="col-md-12">Telepon</label>
                                    <div class="col-md-12">
                                        <input type="number" value="{{ $data->telepon }}" name="telepon" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Mobile 1</label>
                                    <div class="col-md-12">
                                        <input type="number" value="{{ $data->mobile_1 }}" name="telepon" class="form-control"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Mobile 2</label>
                                    <div class="col-md-12">
                                        <input type="number" value="{{ $data->mobile_2 }}" name="telepon" class="form-control"> </div>
                                </div>
                               <div class="form-group">
                                    <label class="col-md-12">Religion</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="agama">
                                            <option value=""> - Religion - </option>
                                            @foreach(agama() as $item)
                                                <option value="{{ $item }}" {{ $data->agama == $item ? 'selected' : '' }}> {{ $item }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Current Address</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="alamat">{{ $data->current_address }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">ID Addres</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="id_address">{{ $data->id_address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">ID City</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="id_city">
                                            <option value="">- none - </option>
                                            @foreach(get_kabupaten() as $item)
                                            <option value="{{ $item->id_city }}" {{ $data->id_city == $item->id_kab ? 'selected' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">ID Zip Code</label>
                                    <div class="col-md-12">
                                        <input type="text" name="id_zip_code" class="form-control" value="{{ $data->id_zip_code }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Foto</label>
                                    <div class="col-md-12">
                                        <input type="file" name="foto" class="form-control" />
                                        @if(!empty($data->foto))
                                        <img src="{{ asset('storage/foto/'. $data->foto) }}" style="width: 200px;" />
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">KTP Number</label>
                                    <div class="col-md-10">
                                        <input type="text" name="ktp_number" value="{{ $data->ktp_number }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Passport Number</label>
                                    <div class="col-md-10">
                                        <input type="text" name="passport_number" value="{{ $data->passport_number }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">KK Number</label>
                                    <div class="col-md-10">
                                        <input type="text" name="kk_number" class="form-control" value="{{ $data->ktp_number }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">NPWP Number</label>
                                    <div class="col-md-10">
                                        <input type="text" name="npwp_number" class="form-control"  value="{{ $data->npwp_number }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">No BPJS Number</label>
                                    <div class="col-md-10">
                                        <input type="text" name="no_bpjs_number" value="{{ $data->bpjs_number }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="dependent">
                            <h3 class="box-title m-b-0">Dependent</h3><a class="btn btn-info btn-sm" id="btn_modal_dependent"><i class="fa fa-plus"></i> Tambah</a>
                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="dependent_table">
                                        @foreach($data->userFamily as $no => $item)
                                        <tr>
                                            <td>{{ $no+1 }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->hubungan }}</td>
                                            <td>{{ $item->tempat_lahir }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->tanggal_meninggal }}</td>
                                            <td>{{ $item->jenjang_pendidikan }}</td>
                                            <td>{{ $item->pekerjaan }}</td>
                                            <td>
                                                <a href="javascript:;" onclick="edit_dependent({{ $item->id }}, '{{ $item->nama }}', '{{ $item->hubungan }}', '{{ $item->tempat_lahir }}', '{{ $item->tanggal_lahir }}', '{{ $item->tanggal_meninggal }}', '{{ $item->jenjang_pendidikan }}', '{{ $item->pekerjaan }}', '{{ $item->tertanggung }}')" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> </a>
                                                    <a href="{{ route('administrator.karyawan.delete-dependent', $item->id) }}" onclick="return confirm('Hapus data ini ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                         <div role="tabpanel" class="tab-pane fade" id="education">
                            <h3 class="box-title m-b-0">Education</h3><a class="btn btn-info btn-sm" id="btn_modal_education"><i class="fa fa-plus"></i> Tambah</a>
                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table">
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="education_table">
                                        @foreach($data->userEducation as $no => $item)
                                        <tr>
                                            <td>{{ $no+1 }}</td>
                                            <td>{{ $item->pendidikan }}</td>
                                            <td>{{ $item->tahun_awal }}</td>
                                            <td>{{ $item->tahun_akhir }}</td>
                                            <td>{{ $item->fakultas }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->nilai }}</td>
                                            <td>{{ $item->kota }}</td>
                                            <td>
                                                <a class="btn btn-default btn-xs" onclick="edit_education({{ $item->id }}, '{{ $item->pendidikan }}', '{{ $item->tahun_awal }}', '{{ $item->tahun_akhir }}', '{{ $item->fakultas }}', '{{ $item->jurusan }}', '{{ $item->nilai }}', '{{ $item->kota }}')"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('administrator.karyawan.delete-education', $item->id) }}" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table><br /><br />
                            </div>
                        </div>

                    </div>

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
</div>
    <!-- /.container-fluid -->
    @extends('layouts.footer')
</div>


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
                                <select class="form-control">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="action_dependent" value="insert">
                        <input type="hidden" name="id_dependent">
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_dependent">Save</button>
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
                                    @foreach(get_jurusan() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
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
                                <input type="text" class="form-control modal-kota" >
                            </div>
                        </div>
                        <input type="hidden" name="action_education" value="insert" />
                        <input type="hidden" name="id_education" value="" />
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_education">Save</button>
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
                   <form class="form-horizontal frm-modal-inventaris-mobil">
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
                       <input type="hidden" name="id_inventaris_mobil">
                       <input type="hidden" name="action_inventaris_mobil" value="insert">
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_inventaris_mobil">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal content cuti  -->
<div id="modal_cuti" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Jenis Cuti / Izin</h4> </div>
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
                       <div class="form-group">
                            <label class="col-md-12">Cuti Terpakai</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control modal-terpakai">
                            </div>
                       </div>
                       <div class="form-group">
                            <label class="col-md-12">Sisa Cuti</label>
                            <div class="col-md-12">
                                <input type="text" readonly="true" class="form-control modal-sisa_cuti">
                            </div>
                       </div>
                       <input type="hidden" name="action_cuti" value="insert" />
                       <input type="hidden" name="cuti_id" />
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_cuti">Save</button>
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
                   <form class="form-horizontal frm-modal-inventaris-lainnya">
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
                        <input type="hidden" name="id_inventaris_lainnya">
                        <input type="hidden" name="action_inventaris_lainnya" value="insert">
                   </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info btn-sm" id="add_modal_inventaris_lainnya">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@section('footer-script')
    <style type="text/css">
        .staff-branch-select, .head-branch-select {
            display: none;
        }

        @if($data->jabatan_cabang == 'Head')
        .head-branch-select { display: block; }
        @endif

        @if($data->jabatan_cabang == 'Staff')
        .staff-branch-select { display: block; }
        @endif
        
    </style>
    <!-- Date picker plugins css -->
    <link href="{{ asset('admin-css/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{ asset('admin-css/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        
        var el_dependent;
        var el_education;
        var el_cuti;
                
        $(".modal-terpakai, .modal-kuota").on("input", function(){

            if($('.modal-terpakai').val() == "" || $('.modal-terpakai').val() == 0)
            {
                $('.modal-sisa_cuti').val($('.modal-kuota').val());    
            }
            else
            {
                $('.modal-sisa_cuti').val(parseInt($('.modal-kuota').val()) - parseInt($(".modal-terpakai").val()) );
            }
        });

        function edit_inventaris_mobil(id, tipe_mobil, tahun, no_polisi, status_mobil)
        {
            $('.modal-tipe_mobil').val(tipe_mobil);
            $('.modal-tahun').val(tahun);
            $('.modal-no_polisi').val(no_polisi);
            $('.modal-status_mobil').val(status_mobil);

            $("#modal_inventaris_mobil").modal('show');
            $("input[name='id_inventaris_mobil']").val(id);
        }

        function edit_cuti(id, jenis_cuti, kuota, terpakai)
        {
            $('.modal-jenis_cuti').val(jenis_cuti);
            $('.modal-kuota').val(kuota);
            $('.modal-terpakai').val(terpakai);
            $('.modal-sisa_cuti').val(parseInt(kuota) - parseInt(terpakai));

            $("input[name='cuti_id']").val(id);

            $("#modal_cuti").modal('show');
        }

        function edit_row_cuti(el, jenis_cuti, kuota, terpakai)
        {
            el_cuti = el;

            $('.modal-jenis_cuti').val(jenis_cuti);
            $('.modal-kuota').val(kuota);
            $('.modal-terpakai').val(terpakai);
            $('.modal-sisa_cuti').val(parseInt(kuota) - parseInt(terpakai));

            $("input[name='action_cuti']").val('update');
            $("#modal_cuti").modal('show');
        }

        function edit_education(id, pendidikan, tahun_awal, tahun_akhir, fakultas, jurusan, nilai, kota)
        {
            $('.modal-pendidikan').val(pendidikan);
            $('.modal-tahun_awal').val(tahun_awal);
            $('.modal-tahun_akhir').val(tahun_akhir);
            $('.modal-fakultas').val(fakultas);
            $('.modal-jurusan').val(jurusan);
            $('.modal-nilai').val(nilai);
            $('.modal-kota').val(kota);

            $("#modal_education").modal("show");

            $("input[name='action_education']").val('update');
            $("input[name='id_education']").val(id);
        }

        function update_row_education(el, pendidikan, tahun_awal, tahun_akhir, fakultas, jurusan, nilai, kota)
        {
            el_education = el;

            $('.modal-pendidikan').val(pendidikan);
            $('.modal-tahun_awal').val(tahun_awal);
            $('.modal-tahun_akhir').val(tahun_akhir);
            $('.modal-fakultas').val(fakultas);
            $('.modal-jurusan').val(jurusan);
            $('.modal-nilai').val(nilai);
            $('.modal-kota').val(kota);

            $("#modal_education").modal("show");

            $("input[name='action_education']").val('update');
        }

        function update_row_dependent(el, nama, hubungan, tempat_lahir, tanggal_lahir, tanggal_meninggal, jenjang_pendidikan, pekerjaan, tertanggung)
        {
            $("input[name='action_dependent']").val('update');
            
            $('.modal-nama').val(nama);
            $('.modal-hubungan').val(hubungan);
            $('.modal-tempat_lahir').val(tempat_lahir);
            $('.modal-tanggal_lahir').val(tanggal_lahir);
            $('.modal-tanggal_meninggal').val(tanggal_meninggal);
            $('.modal-jenjang_pendidikan').val(jenjang_pendidikan);
            $('.modal-pekerjaan').val(pekerjaan);
            $('.modal-tertanggung').val(tertanggung);

            $('#modal_dependent').modal('show');

            el_dependent = el;
        }

        function edit_dependent(id, nama, hubungan, tempat_lahir, tanggal_lahir, tanggal_meninggal, jenjang_pendidikan, pekerjaan, tertanggung)
        {
            $("input[name='id_dependent']").val(id);

            $('.modal-nama').val(nama);
            $('.modal-hubungan').val(hubungan);
            $('.modal-tempat_lahir').val(tempat_lahir);
            $('.modal-tanggal_lahir').val(tanggal_lahir);
            $('.modal-tanggal_meninggal').val(tanggal_meninggal);
            $('.modal-jenjang_pendidikan').val(jenjang_pendidikan);
            $('.modal-pekerjaan').val(pekerjaan);
            $('.modal-tertanggung').val(tertanggung);

            $('#modal_dependent').modal('show');
        }

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


        /**
         * Inventaris Lainnya
         *
         */
        var el_inventaris_lainnya;
        $("#add_inventaris_lainnya").click(function(){

            $("#modal_inventaris_lainnya").modal('show');
        });

        $("#add_modal_inventaris_lainnya").click(function(){

            var el = '<tr>';
            var modal_jenis         = $('.modal-inventaris-jenis').val();
            var modal_description   = $('.modal-inventaris-description').val();
            
            el +='<td>'+ (parseInt($('.table_inventaris_lainnya tr').length) + 1)  +'</td>';
            el +='<td>'+ modal_jenis +'</td>';
            el +='<td>'+ modal_description +'</td>';
            el +='<td><a class="btn btn-default btn-xs" onclick="update_row_inventaris_lainnya(this,\''+ modal_jenis +'\',\''+ modal_description +'\')"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-xs" onclick="return delete_row_dependent(el);"><i class="fa fa-trash"></i></a></td>';
            el +='<input type="hidden" name="inventaris_lainnya[jenis][]" value="'+ modal_jenis +'" />';
            el +='<input type="hidden" name="inventaris_lainnya[description][]" value="'+ modal_description +'" />';

            if($("input[name='action_inventaris_lainnya']").val() == 'update')
            {
                $(el_inventaris_lainnya).parent().parent().remove();
            }

            var id = $("input[name='id_inventaris_lainnya']").val();
            if(id != "")
            {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('ajax.update-inventaris-lainnya') }}',
                    data: {'id' : id, 'jenis' : modal_jenis,'description' : modal_description,  '_token' : $("meta[name='csrf-token']").attr('content')},
                    dataType: 'json',
                    success: function (data) {
                        window.location.href = '{{ route('administrator.karyawan.edit', $data->id) }}';
                    }
                });

                return false;
            }

            $('.table_inventaris_lainnya').append(el);
            $('#modal_inventaris_lainnya').modal('hide');
            $('form.frm-modal-inventaris-lainnya').trigger('reset');
        });

        function update_row_inventaris_lainnya(el, jenis, description)
        {
            el_inventaris_lainnya = el;

            $('.modal-inventaris-jenis').val(jenis);
            $('.modal-inventaris-description').val(description);
            $("input[name='action_inventaris_lainnya']").val('update');
            $('#modal_inventaris_lainnya').modal('show');
        }

        function edit_inventaris_lainnya(id,jenis, description)
        {
            $("input[name='id_inventaris_lainnya']").val(id);
            $('.modal-inventaris-jenis').val(jenis);
            $('.modal-inventaris-description').val(description);
            $('#modal_inventaris_lainnya').modal('show');
        }
        /**
         * End Inventaris Lainnya
         */
        

        $("#add_cuti").click(function(){
            $("#modal_cuti").modal('show');
        });

        $("#add_modal_cuti").click(function(){

            var jenis_cuti = $('.modal-jenis_cuti :selected');
            var kuota = $('.modal-kuota').val();
            var terpakai = $('.modal-terpakai').val();

            var el = '<tr><td>'+ (parseInt($('.table_cuti tr').length) + 1) +'</td><td>'+ jenis_cuti.text() +'</td><td>'+ kuota +'</td>';

            el += '<td>'+ terpakai +'</td>';
            el += '<td>'+ (parseInt(kuota) - parseInt(terpakai)) +'</td>';
            el += '<td><a class="btn btn-default btn-xs" onclick="edit_row_cuti(this,'+ jenis_cuti.val() +','+ kuota +','+ terpakai +','+ ( parseInt(kuota)-parseInt(terpakai) ) +')"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>';
            el += '<input type="hidden" name="cuti[cuti_id][]" value="'+ jenis_cuti.val() +'" />';
            el += '<input type="hidden" name="cuti[kuota][]" value="'+ kuota +'" />';
            el += '<input type="hidden" name="cuti[terpakai][]" value="'+ terpakai +'" />';
            el += '</tr>';

            var id = $("input[name='cuti_id']").val();

            $("form.frm-modal-cuti").trigger('reset');

            if(id != "")
            {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('ajax.update-cuti') }}',
                    data: {'id' : id, 'cuti_id' : jenis_cuti.val(), 'kuota' : kuota, 'terpakai': terpakai, '_token' : $("meta[name='csrf-token']").attr('content')},
                    dataType: 'json',
                    success: function (data) {
                        window.location.href = '{{ route('administrator.karyawan.edit', $data->id) }}';
                    }
                });

                return false;
            }

            var act = $("input[name='action_cuti']").val();
            if(act == 'update')
            {
                $(el_cuti).parent().parent().remove();

                $("input[name='action_cuti']").val('insert')
            }

            $('.table_cuti').append(el);

            $("#modal_cuti").modal('hide');
        });

        /**
         * Inventasi Mobil
         *
         */
        $("#add_inventaris_mobil").click(function(){

            $("#modal_inventaris_mobil").modal('show');
        });
        var el_inventaris_mobil;
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
            el +='<td><a class="btn btn-default btn-xs" onclick="update_row_inventaris_mobil(this,\''+ modal_tipe_mobil +'\',\''+ modal_tahun +'\',\''+ modal_no_polisi +'\',\''+ modal_status_mobil +'\')"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-xs" onclick="return delete_row_dependent(el);"><i class="fa fa-trash"></i></a></td>';

            el +='<input type="hidden" name="inventaris_mobil[tipe_mobil][]" value="'+ modal_tipe_mobil +'" />';
            el +='<input type="hidden" name="inventaris_mobil[tahun][]" value="'+ modal_tahun +'" />';
            el +='<input type="hidden" name="inventaris_mobil[no_polisi][]" value="'+ modal_no_polisi +'" />';
            el +='<input type="hidden" name="inventaris_mobil[status_mobil][]" value="'+ modal_status_mobil +'" />';


            if($("input[name='action_inventaris_mobil']").val() == 'update')
            {
                $(el_inventaris_mobil).parent().parent().remove();
            }

            var id = $("input[name='id_inventaris_mobil']").val();
            if(id != "")
            {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('ajax.update-inventaris-mobil') }}',
                    data: {'id' : id, 'tipe_mobil' : modal_tipe_mobil,'tahun' : modal_tahun, 'no_polisi': modal_no_polisi, 'status_mobil': modal_status_mobil,  '_token' : $("meta[name='csrf-token']").attr('content')},
                    dataType: 'json',
                    success: function (data) {

                        $("input[name='id_inventaris_mobil']").val("");

                        window.location.href = '{{ route('administrator.karyawan.edit', $data->id) }}';
                    }
                });

                return false;
            }

            $('.table_mobil').append(el);
            $('#modal_inventaris_mobil').modal('hide');
            $('form.frm-modal-inventaris-mobil').trigger('reset');
        });

        function update_row_inventaris_mobil(el,tipe_mobil,tahun,no_polisi,status_mobil)
        {
            el_inventaris_mobil = el;

            $('.modal-tipe_mobil').val(tipe_mobil);
            $('.modal-tahun').val(tahun);
            $('.modal-no_polisi').val(no_polisi);
            $('.modal-status_mobil').val(status_mobil);

            $('#modal_inventaris_mobil').modal('show');
            $("input[name='action_inventaris_mobil']").val('update');
        }
        /**
         * End Inventaris Mobil
         */

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
            
            $('.modal-nama, .modal-hubungan, .modal-tempat_lahir, .modal-tanggal_lahir').val("");

            var id = $("input[name='id_dependent']").val();
            if(id != "")
            {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('ajax.update-dependent') }}',
                    data: {'id' : id, 'nama' : modal_nama, 'hubungan': modal_hubungan, 'tempat_lahir': modal_tempat_lahir, 'tanggal_lahir': modal_tanggal_lahir, 'tanggal_meninggal' : modal_tanggal_meninggal, 'jenjang_pendidikan' : modal_jenjang_pendidikan, 'pekerjaan' : modal_pekerjaan,'tertanggung': modal_tertanggung, '_token' : $("meta[name='csrf-token']").attr('content')},
                    dataType: 'json',
                    success: function (data) {

                        $("input[name='id_dependent']").val("");

                        window.location.href = '{{ route('administrator.karyawan.edit', $data->id) }}';
                    }
                });

                return false;
            }

            el += '<td>'+ parseInt($('.dependent_table tr').length) + 1  +'</td>';
            el +='<td>'+ modal_nama +'</td>';
            el +='<td>'+ modal_hubungan +'</td>';
            el +='<td>'+ modal_tempat_lahir +'</td>';
            el +='<td>'+ modal_tanggal_lahir +'</td>';
            el +='<td>'+ modal_tanggal_meninggal +'</td>';
            el +='<td>'+ modal_jenjang_pendidikan +'</td>';
            el +='<td>'+ modal_pekerjaan +'</td>';
            el +='<input type="hidden" name="dependent[nama][]" value="'+ modal_nama +'" />';
            el +='<input type="hidden" name="dependent[hubungan][]" value="'+ modal_hubungan +'" />';
            el +='<input type="hidden" name="dependent[tempat_lahir][]" value="'+ modal_tempat_lahir +'" />';
            el +='<input type="hidden" name="dependent[tanggal_lahir][]" value="'+ modal_tanggal_lahir +'" />';
            el +='<input type="hidden" name="dependent[tanggal_meninggal][]" value="'+ modal_tanggal_meninggal +'" />';
            el +='<input type="hidden" name="dependent[jenjang_pendidikan][]" value="'+ modal_jenjang_pendidikan +'" />';
            el +='<input type="hidden" name="dependent[pekerjaan][]" value="'+ modal_pekerjaan +'" />';
            el +='<input type="hidden" name="dependent[tertanggung][]" value="'+ modal_tertanggung +'" />';
            el += '<td>';
            el += '<a onclick="delete_row_dependent(this)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
            el += '<a onclick="update_row_dependent(this,\''+ modal_nama +'\',\''+ modal_hubungan +'\',\''+ modal_tempat_lahir +'\',\''+ modal_tanggal_lahir +'\',\''+ modal_tanggal_meninggal +'\',\''+ modal_jenjang_pendidikan +'\',\''+ modal_pekerjaan +'\',\''+ modal_tertanggung +'\')" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>';
            el += '</td>';

            var act = $("input[name='action_dependent']").val();
            if(act == 'update')
            {
                $(el_dependent).parent().parent().remove();

                $("input[name='action_dependent']").val('insert')
            }

            $('.dependent_table').append(el);
            $('#modal_dependent').modal('hide');

            $('.frm-modal-dependent').trigger('reset');
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

            var id = $("input[name='id_education']").val();

            if(id != "")
            {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('ajax.update-education') }}',
                    data: {'id' : id, 'pendidikan' : modal_pendidikan, 'tahun_awal': modal_tahun_awal, 'tahun_akhir': modal_tahun_akhir, 'fakultas': modal_fakultas, 'jurusan' : modal_jurusan, 'nilai' : modal_nilai, 'kota' : modal_kota, '_token' : $("meta[name='csrf-token']").attr('content')},
                    dataType: 'json',
                    success: function (data) {

                        $("input[name='id_education']").val("");

                        window.location.href = '{{ route('administrator.karyawan.edit', $data->id) }}';
                    }
                });

                return false;
            }
            
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
            el +='<td><a class="btn btn-default btn-xs" onclick="update_row_education(this,\''+ modal_pendidikan +'\',\''+ modal_tahun_awal +'\',\''+ modal_tahun_akhir +'\',\''+ modal_fakultas +'\',\''+ modal_jurusan +'\', \''+ modal_nilai +'\',\''+ modal_kota +'\')"><i class="fa fa-edit"></i></a>';
            el +='<a class="btn btn-danger btn-xs" onclick="delete_row_dependent(this)"><i class="fa fa-trash"></i></a></td>';
            $('.education_table').append(el);

            var act = $("input[name='action_education']").val();
            if(act == 'update')
            {
                $(el_education).parent().parent().remove();

                $("input[name='action_education']").val('insert')
            }

            $('#modal_education').modal('hide');
            $('form.frm-modal-education').trigger('reset');
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

                    $('.modal-kota').html(html_);
                }
            });
        }

        jQuery('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
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

        $("select[name='provinsi_id']").on('change', function(){

            var id = $(this).val();

            $.ajax({
                type: 'POST',
                url: '{{ route('ajax.get-kabupaten-by-provinsi') }}',
                data: {'id' : id, '_token' : $("meta[name='csrf-token']").attr('content')},
                dataType: 'json',
                success: function (data) {

                    var html_ = '<option value=""> Pilih Kabupaten</option>';

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

    </script>
@endsection

@endsection
