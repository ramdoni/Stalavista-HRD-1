@extends('layouts.karyawan')

@section('title', 'Cuti Karyawan - PT. Arthaasia Finance')

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
                <h4 class="page-title">Dashboard</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">Approval Cuti Karyawan</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Manage Approval Cuti Karyawan</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NIK</th>
                                    <th>NAME</th>
                                    <th>TANGGAL CUTI</th>
                                    <th>JENIS CUTI</th>
                                    <th>LAMA CUTI</th>
                                    <th>KEPERLUAN</th>
                                    <th>CREATED</th>
                                    <th>STATUS</th>
                                    <th>MANAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $no => $item)
                              @if(isset($item->karyawan->nik))
                                <tr>
                                    <td class="text-center">{{ $no+1 }}</td>    
                                    <td>{{ $item->karyawan->nik }}</td>
                                    <td>{{ $item->karyawan->name }}</td>
                                    <td>{{ date('d F Y', strtotime($item->tanggal_cuti_start)) }} - {{ date('d F Y', strtotime($item->tanggal_cuti_end)) }}</td>
                                    <td> 
                                        {{ isset($item->cuti) ? $item->cuti->jenis_cuti : '' }}</td>
                                    </td>
                                    <td>
                                        {{ $item->total_cuti }}
                                    </td>
                                    <td>{{ $item->keperluan }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a onclick="detail_approval_cuti({{ $item->id }})">
                                            @if($item->is_approved_atasan === NULL)
                                                <label class="btn btn-warning btn-xs">Waiting Approval</label>
                                            @elseif($item->is_approved_atasan == 0)
                                                <label class="btn btn-danger btn-xs">Reject</label>
                                            @else 
                                                <label class="btn btn-success btn-xs">Approved</label>
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        @if($item->is_approved_atasan ===NULL)
                                            <a href="{{ route('karyawan.approval.cuti-atasan.detail', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"> proses <i class="fa fa-arrow-right"></i></button></a>
                                        @endif
                                    </td>
                                </tr>
                              @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @include('layouts.footer')
</div>
@endsection
