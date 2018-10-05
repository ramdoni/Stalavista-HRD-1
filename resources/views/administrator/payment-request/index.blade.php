@extends('layouts.administrator')

@section('title', 'Payment Request - PT. Arthaasia Finance')

@section('sidebar')

@endsection
@section('page-title', 'Payment Request')
@section('page-url', route('administrator.payment-request.index'))

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>NIK</th>
                <th>NAME</th>
                <th>TO</th>
                <th>TUJUAN</th>
                <th>JENIS TRANSAKSI</th>
                <th>CARA PEMBAYARAN</th>
                <th>TOTAL AMOUNT</th>
                <th>STATUS</th>
                <th>MANAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
             @if(isset($item->user->nik))
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>    
                    <td>{{ $item->user->nik }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>Accounting Department</td>
                    <td>{{ $item->tujuan }}</td>
                    <td>{{ $item->transaction_type }}</td>
                    <td>{{ $item->payment_method }}</td>
                    <td>{{ number_format(sum_payment_request_price($item->id)) }}</td>
                    <td>
                        <a onclick="status_approval_payment_request({{ $item->id }})"> 
                            {!! status_payment_request($item->status) !!}
                        </a>
                    </td>
                    <td>
                        @if($item->status == 1)
                        <a href="{{ route('administrator.payment-request.batal', $item->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Batalkan Payment Request</a>
                        @endif
                    </td>
                </tr>
              @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection