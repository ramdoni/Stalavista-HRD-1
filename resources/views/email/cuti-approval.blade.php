@extends('email.general')

@section('content')
{!! $text !!}

<table>
	<thead>
		<tr>
			<th style="text-align: left;">Tanggal Cuti / Ijin </th>
			<th style="text-align: left;"> : {{ date('d F Y', strtotime($data->tanggal_cuti_start)) }} - {{ date('d F Y', strtotime($data->tanggal_cuti_end)) }}</th>
		</tr>
		<tr>
			<th style="text-align: left;">Jenis Cuti / Ijin </th>
			<th style="text-align: left;"> : {{ isset($data->cuti->jenis_cuti) ? $data->cuti->jenis_cuti : '' }}</th>
		</tr>
		<tr>
			<th style="text-align: left;">Lama Cuti </th>
			<th style="text-align: left;"> : {{ $data->total_cuti }} Hari</th>
		</tr>
		<tr>
			<th style="text-align: left;">Keperluan </th>
			<th style="text-align: left;"> : {{ $data->keperluan }}</th>
		</tr>
	</thead>
</table>
<br />	
<div class="modal-body" id="modal_content_history_approval">
	<div class="panel-body">
		<div class="steamline" style="position: relative; border-left: 1px solid rgba(120,130,140,.13);margin-left: 20px;">
			<div class="sl-item" style="border-bottom: 1px solid rgba(120,130,140,.13);margin: 20px 0;">
				<div class="sl-left" style="background: transparent; float: left;margin-left: -20px;z-index: 1;width: 40px;line-height: 40px;text-align: center;height: 40px;border-radius: 100%;color: #fff;margin-right: 15px;">
					@if($data->is_approved_atasan === NULL)
					<img src="{{ asset('images/info.png') }}" style="width: 33px;margin-left: -4px;margin-top: -12px;" />
					@endif
					@if($data->is_approved_atasan == 1)
					<img src="{{ asset('images/oke.png') }}" style="width: 48px;margin-left: -4px;margin-top: -12px;" />
					@endif
					@if($data->is_approved_atasan === 0)
					<img src="{{ asset('images/close.png') }}" style="width: 33px;margin-left: -4px;margin-top: -12px;" />
					@endif
				</div>
				<div class="sl-right" style="padding-left: 50px;">
					<div>
						<strong>Atasan</strong> <br>
						<a href="#">{{ $data->atasan->nik }} - {{ $data->atasan->name }}</a> 
					</div>
					@if($data->date_approved_atasan !== NULL)
						<div class="desc">{{ date('d F Y', strtotime($data->date_approved_atasan)) }}<p></p></div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="steamline" style="position: relative; border-left: 1px solid rgba(120,130,140,.13);margin-left: 20px;">
			<div class="sl-item" style="border-bottom: 1px solid rgba(120,130,140,.13);margin: 20px 0;">
				<div class="sl-left" style="background: transparent; float: left;margin-left: -20px;z-index: 1;width: 40px;line-height: 40px;text-align: center;height: 40px;border-radius: 100%;color: #fff;margin-right: 15px;">
					@if($data->is_approved_personalia === NULL)
					<img src="{{ asset('images/info.png') }}" style="width: 33px;margin-left: -4px;margin-top: -12px;" />
					@endif
					@if($data->is_approved_personalia == 1)
					<img src="{{ asset('images/oke.png') }}" style="width: 48px;margin-left: -4px;margin-top: -12px;" />
					@endif
					@if($data->is_approved_personalia === 0)
					<img src="{{ asset('images/close.png') }}" style="width: 33px;margin-left: -4px;margin-top: -12px;" />
					@endif
				</div>
				<div class="sl-right" style="padding-left: 50px;">
					<div>
						<strong>Personalia</strong> <br>
						@if(isset($data->personalia->nik))
						<a href="#">{{ $data->personalia->nik }} - {{ $data->personalia->name }}</a> 
						@endif
					</div>
					@if($data->is_approved_personalia !== NULL)
						<div class="desc">{{ date('d F Y', strtotime($data->personalia_proses_date)) }}<p></p></div>
					@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection