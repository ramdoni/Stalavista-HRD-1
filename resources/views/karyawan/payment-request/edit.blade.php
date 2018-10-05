@extends('layouts.karyawan')

@section('title', 'Payment Request')

@section('page-url', route('karyawan.payment-request.index'))

@section('content')

<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('administrator.payment-request.update', $data->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Form Payment Request</h3>
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
            <div class="col-md-6 pull-left" style="padding-left:0;">
                <div class="form-group">
                    <p class="col-md-12">From</p>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{ $data->user->nik .'/'. $data->user->name }}" readonly="true" />
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-md-6">To : Accounting Department</p>
                </div>
                <div class="form-group">
                    <p class="col-md-12">Tujuan / Purpose</p>
                    <div class="col-md-10">
                        <textarea class="form-control" name="tujuan" readonly="true">{{ $data->tujuan }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-md-12">Jenis Transaksi / Trancation Type</p>
                    <div class="col-md-12">
                        <label style="font-weight: normal;"><input type="radio" name="transaction_type" value="Advance" {{ $data->transaction_type == 'Advance' ? 'checked' : '' }} /> Advance</label> &nbsp;&nbsp;
                        <label style="font-weight: normal;"><input type="radio" name="transaction_type" value="Payment" {{ $data->transaction_type == 'Payment' ? 'checked' : '' }} /> Payment</label>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <p class="col-md-12">Cara Pembayaran / Payment Method</p>
                    <div class="col-md-12">
                        <label style="font-weight: normal;"><input type="radio" name="payment_method" value="Cash" {{ $data->payment_method == 'Cash' ? 'checked' : '' }} /> Cash</label> &nbsp;&nbsp;
                        <label style="font-weight: normal;"><input type="radio" name="payment_method" value="Bank Transfer" {{ $data->payment_method == 'Bank Transfer' ? 'checked' : '' }}  /> Bank Transfer</label>

                    </div>
                </div>
            </div>
            <div class="col-md-6 pull-left" style="padding-left:0;">
                <div class="form-group">
                    <p class="col-md-12">Nama Pemilik Rekening / Name of Account</p>
                    <div class="col-md-12">
                        <input type="text" class="form-control" readonly="true" value="{{ Auth::user()->nama_rekening }}" readonly="true" />
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-md-12">No Rekening / Account Number</p>
                    <div class="col-md-12">
                        <input type="number" class="form-control" readonly="true" value="{{ Auth::user()->nomor_rekening }}" readonly="true" />
                    </div>
                </div>
                <div class="form-group">
                    <p class="col-md-12">Nama Bank / Name Of Bank</p>
                    <div class="col-md-12">
                        <input type="text" class="form-control" readonly="true" value="{{ isset(Auth::user()->bank) ? Auth::user()->bank->name : '' }}" readonly="true" />
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>DESCRIPTION</th>
                            <th>QUANTITY</th>
                            <th>ESTIMATION COST</th>
                            <th>AMOUNT</th>
                            <th>BUKTI TRANSAKSI</th>
                        </tr>
                    </thead>
                    <tbody class="table-content-lembur">
                        @foreach($form as $key => $item)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->estimation_cost }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>
                                @if($item->file_struk != "")
                                <a href="{{ asset('file-struk/'. $item->user_id .'/'. $item->file_struk)}}" target="_blank"><i class="la la-image"></i> view</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
            <br />
        
            <a href="{{ route('karyawan.payment-request.index') }}" class="btn btn-sm btn-default waves-effect waves-light m-r-10"><i class="fa fa-arrow-left"></i> Back</a>
            <br style="clear: both;" />
            <div class="clearfix"></div>
        </div>
    </div>    
</form>  
@endsection
