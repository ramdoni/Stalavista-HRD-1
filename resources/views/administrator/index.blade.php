@extends('layouts.administrator')

@section('title', 'Dashboard')

@section('content')
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box" style="margin-bottom:10px;">
            <div class="row row-in">
                <div class="col-lg-3 col-sm-6 row-in-br">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">{{ total_karyawan() }}</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Total Karyawan</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">{{ total_cuti_karyawan() }}</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Total Cuti Karyawan</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 row-in-br">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-success"><i class=" ti-shopping-cart"></i></span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">{{ total_payment_request() }}</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Total Payment Request</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6  b-0">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-warning" style="font-size: 18px !important;padding-top: 19px;">IDR</span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">{{ total_medical() }}</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Total Medical Reimbursement</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="white-box" style="margin-bottom:10px;">
            <div class="row row-in">
                <div class="col-lg-3 col-sm-6 row-in-br">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">{{ total_overtime() }}</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Total Overtime Request</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">{{ total_exit_interview() }}</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Total Exit Interview</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
               
                <div class="col-lg-3 col-sm-6  b-0">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-warning" style="font-size: 18px !important;padding-top: 19px;">IDR</span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">{{ total_training() }}</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Total Training & Perjalanan Dinas</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
