@extends('layouts.karyawan')

@section('title', 'Exit Interview')

@section('page-url', route('karyawan.exit-interview.index'))

@section('content')
<form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" action="{{ route('karyawan.exit-interview.store') }}" method="POST" id="exit_interview_form">
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
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" aria-controls="interview" aria-expanded="true" href="#interview">Exit Interview Form</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" aria-controls="clearance" aria-expanded="true" href="#clearance">Exit Clearance Form</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="clearance" style="padding-top: 30px;">
            <div class="form-group">
                <label class="col-md-12">INVENTORY RETURN TO HRD</label>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30px;">NO</th>
                                <th>ITEM/JENIS</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach(list_exit_clearance_inventory_to_hrd() as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item['item'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">INVENTORY RETURN TO GENERAL AFFAIR (GA)</label>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30px;">NO</th>
                                <th>ITEM/JENIS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(list_exit_clearance_inventory_to_ga() as $no => $item)
                            <tr>
                                <td>{{ $no + 6 }}</td>
                                <td>{{ $item['item'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
             <div class="form-group">
                <label class="col-md-12">INVENTORY RETURN</label>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30px;">NO</th>
                                <th>ITEM/JENIS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::user()->inventaris_mobil)
                            <tr>
                                <td>12</td>
                                <td>
                                    <p><strong>Mobil</strong></p>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Tipe Mobil</th>
                                            <th>Tahun</th>
                                            <th>No Polisi</th>
                                            <th>Status Mobil</th>
                                        </tr>
                                        @foreach(Auth::user()->inventaris_mobil as $item)
                                        <input type="hidden" name="inventaris_mobil[]" value="{{ $item->id }}" />
                                        <tr>
                                            <td>{{ $item->tipe_mobil }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>{{ $item->no_polisi }}</td>
                                            <td>{{ $item->status_mobil }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            @endif

                            @if(Auth::user()->inventaris)
                            <tr>
                                <td>13</td>
                                <td>
                                    <p><strong>Laptop/PC & Other IT Device</strong></p>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Jenis Inventaris</th>
                                            <th>Keterangan</th>
                                        </tr>
                                        @foreach(Auth::user()->inventaris as $item)
                                        <input type="hidden" name="inventaris[]" value="{{ $item->id }}" />
                                        <tr>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->description }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            @endif

                            <tr>
                                <td>14</td>
                                <td>
                                    Password PC/Laptop <br />
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4" style="padding-left:0;">
                                                <input type="text" name="inventory_it_username_pc" class="form-control" placeholder="Username" value="{{ old('inventory_it_username_pc') }}" />
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="inventory_it_password_pc" class="form-control" placeholder="Password" value="{{ old('inventory_it_password_pc') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Other Inventory</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>
                                    Email Address<br />
                                    <div class="col-md-4" style="padding-left: 0;">
                                        <input type="email" name="inventory_it_email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h4><b>Approval</b></h4>
                    <div class="col-md-12" style="border: 1px solid #eee; padding: 15px">
                        <br />
                        <div class="form-group">
                            <div class="row">
                                <p class="col-md-12">
                                    Superior / Atasan Langsung
                                </p>
                                <div class="col-md-12">
                                    <input type="text" class="form-control autcomplete-atasan">
                                    <input type="hidden" name="atasan_user_id" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <p class="col-md-6">Jabatan</p>
                                <p class="col-md-6">Division / Departement</p>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control jabatan_atasan">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control department_atasan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <p class="col-md-6">No Handphone</p>
                                <p class="col-md-6">Email</p>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control no_handphone_atasan">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" readonly="true" class="form-control email_atasan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <br />

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{ route('karyawan.exit-interview.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Cancel</a>
                            <button type="button" class="btn btn-sm btn-success waves-effect waves-light m-r-10" id="submit_form"><i class="fa fa-save"></i> Submit Exit Interview & Exit Clearance</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane active" id="interview" style="padding-top: 30px;">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">    
                        <div class="row">
                            <p class="col-md-12">NIK / Nama Karyawan</p>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="{{ Auth::user()->nik .' / '. Auth::user()->name }}" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <p class="col-md-6">Jabatan</p>
                            <p class="col-md-6">Division / Departement</p>
                            <div class="col-md-6">
                                <input type="text" readonly="true" class="form-control jabatan" value="{{ Auth::user()->organisasi_job_role }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" readonly="true" class="form-control department" value="{{ isset(Auth::user()->department) ? Auth::user()->department->name : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <p class="col-md-12">Join Date / Tanggal Masuk</p>
                            <div class="col-md-6">
                                <input type="text" readonly="true" class="form-control" value="{{ Auth::user()->join_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <p class="col-md-6">Resign Date / Tanggal Keluar</p>
                            <p class="col-md-6">Date Last Work / Tanggal Terakhir Bekerja</p>
                            <div class="col-md-6">
                                <input type="text" name="resign_date" class="form-control datepicker-ui" value="" >
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="last_work_date" class="form-control datepicker-ui" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <p class="col-md-6">Alasan pengunduran diri / Resignation reason :</p>
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach(get_reason_interview() as $item)
                                <li class="list-group-item"><label><input type="radio" name="exit_interview_reason" value="{{ $item->id }}" /> {{ $item->label }}</label>
                                @if($item->id == 1)
                                <div class="form-group perusahaan_lain" style="display: none;">
                                    <hr />
                                    <div class="row">
                                        <p class="col-md-12">Jika pindah ke perusahaan baru </p>
                                        <p class="col-md-6">Tujuan perusahaan baru </p>
                                        <p class="col-md-6">Jenis bidang usaha </p>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="tujuan_perusahaan_baru">{{ old('tujuan_perusahaan_baru') }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="jenis_bidang_usaha">{{ old('jenis_bidang_usaha') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                </li>
                                @endforeach
                                <li class="list-group-item">
                                    <label><input type="radio" name="exit_interview_reason" value="other" /> Other (Lainnya, ditulis alasannya)</label>
                                    <textarea class="form-control" placeholder="Other Reason" name="other_reason" style="display: none;"></textarea>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card-body">
                    <div class="form-group">
                        <p>Hal yang berkesan selama bekerja di Artha Asia Finance</p>
                        <textarea class="form-control" name="hal_berkesan">{{ old('hal_berkesan') }}</textarea>
                    </div>
                    <hr />
                    <div class="form-group">
                        <p>Hal yang tidak berkesan selama bekerja di Artha Asia Finance</p>
                        <textarea class="form-control" name="hal_tidak_berkesan">{{ old('hal_tidak_berkesan') }}</textarea>
                    </div>
                    <hr />
                    <div class="form-group">
                        <p>Masukan terhadap Artha Asia Finance</p>
                        <textarea class="form-control" name="masukan">{{ old('masukan') }}</textarea>
                    </div>
                    <hr />
                    <div class="form-group">
                        <p>Hal yang akan dilakukan setelah resign dari Artha Asia Finance</p>
                        <textarea class="form-control" name="kegiatan_setelah_resign">{{ old('kegiatan_setelah_resign') }}</textarea>
                    </div>
                    <hr />
                    <a href="{{ route('karyawan.exit-interview.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Cancel</a>
                    <button type="button" class="btn btn-info btn-sm next_exit_clearance">NEXT </button>
                </div>
            </div>
        </div>
    </div>    
</form>  

@section('footer-script')
<script type="text/javascript">
    $("input[name='exit_interview_reason']").click(function(){

        if($(this).val() == 1)
        {
            $('.perusahaan_lain').show("slow");
        }
        else if($(this).val() == 'other')
        {
            $("textarea[name='other_reason']").show();
        }
        else
        {
            $('.perusahaan_lain').hide("slow");
            $("textarea[name='other_reason']").hide();
        }
    });
</script>
<script type="text/javascript">

    var list_atasan = [];

    @foreach(get_atasan_langsung() as $item)
        list_atasan.push({id : {{ $item->id }}, value : '{{ $item->nik .' - '. $item->name.' - '. $item->job_rule }}',  });
    @endforeach
</script>
<script type="text/javascript">
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

    $('#submit_form').click(function(){
        if($("input[name='atasan_user_id']").val() == "")
        {   
            bootbox.alert('Atasan Lansung ');
            return false;
        }

        bootbox.confirm("Apakah anda ingin memproses Form ini ?", function(result){
            if(result)
            {
                $("#exit_interview_form").submit()
            }
        });
    });

    $('.next_exit_clearance').click(function(){
        $("a[href='#clearance']").addClass('active');        
        $("a[href='#interview']").removeClass('active');
        
        $("#interview").removeClass('active');
        $("#clearance").addClass('active');
    });

</script>
@endsection
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
@endsection
