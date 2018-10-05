@extends('layouts.karyawan')

@section('title', 'Payment Request')

@if(cek_approval('payment_request'))
    @section('page-create', route('karyawan.payment-request.create'))
@endif  

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered data-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="70" class="text-center">#</th>
                <th>TO</th>
                <th>TUJUAN</th>
                <th>JENIS TRANSAKSI</th>
                <th>CARA PEMBAYARAN</th>
                <th>STATUS</th>
                <th>CREATED</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $item)
                <tr>
                    <td class="text-center">{{ $no+1 }}</td>    
                    <td>Accounting Department</td>
                    <td>{{ $item->tujuan }}</td>
                    <td>{{ $item->transaction_type }}</td>
                    <td>{{ $item->payment_method }}</td>
                    <td>
                        <a onclick="status_approval_payment_request({{ $item->id }})">
                            {!! status_payment_request($item->status) !!}
                        </a>
                    </td>
                    <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                    <td>
                        <a href="{{ route('karyawan.payment-request.edit', $item->id) }}"><i class="la la-search-plus"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection