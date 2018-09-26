@extends('layouts.karyawan')

@section('title', 'Exit Interview - PT. Arthaasia Finance')

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
                    <li class="active">Exit Interview & Exit Clearance</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Manage Exit Interview & Exit Clearance</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="data_table" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>DEPARTMENT / POSITION</th>
                                    <th>RESIGN DATE</th>
                                    <th>ALASAN PENGUNDURAN DIRI</th>
                                    <th>STATUS</th>
                                    <th>CREATED</th>
                                    <th width="100">MANAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $item)
                                 @if(isset($item->user->nik))
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>   
                                        <td>{{ $item->user->nik }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ (isset($item->user->department->name) ? $item->user->department->name : '')  .' / '. (isset($item->user->organisasiposition->name) ? $item->user->organisasiposition->name : '') }}</td> 
                                        <td>{{ $item->resign_date }}</td>
                                        <td>
                                            @if($item->exit_interview_reason == "")
                                                {{ $item->other_reason }}
                                            @else
                                                {!! $item->exitInterviewReason->label !!}
                                            @endif
                                        </td>
                                        <td>
                                            <a onclick="status_approval_exit({{ $item->id }})"> 
                                                @if($item->is_approved_atasan == 0)
                                                    <label class="btn btn-warning btn-xs">Waiting Approval</label>
                                                @else 
                                                    <label class="btn btn-success btn-xs">Approved</label>
                                                @endif
                                            </a>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                           @if($item->is_approved_atasan ==0)
                                                <a href="{{ route('karyawan.approval.exit-atasan.detail', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"><i class="fa fa-arrow-right"></i> proses</button></a>
                                            @else 
                                                <a href="{{ route('karyawan.approval.exit-atasan.detail', ['id' => $item->id]) }}"> <button class="btn btn-info btn-xs m-r-5"><i class="fa fa-search-plus"></i> detail</button></a>
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
