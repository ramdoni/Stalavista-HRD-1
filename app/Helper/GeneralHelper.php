<?php


/**
 * [status_exit_interview description]
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function status_exit_interview($status)
{
	$html = '';
	switch ($status) {
		case 1:
			$html = '<label class="btn btn-warning btn-sm">Waiting Approval</label>';
			break;
		case 2:
			$html = '<label class="btn btn-success btn-sm"><i class="fa fa-chceck"></i>Disetujui</label>';
		break;
		case 3:
			$html = '<label class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Ditolak</label>';
		break;
		case 4:
			$html = '<label class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Dibatalkan</label>';
		break;
		default:
			break;
	}

	return $html;
}

/**
 * [get_setting description]
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
function get_setting($key)
{
	$data = App\Models\Setting::where('key', $key)->first();	
	if($data)
	{
		return $data->value;
	}
	else return;
}


/**
 * [status_overtime description]
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function status_overtime($status)
{
	$html = '';
	switch ($status) {
		case 1:
			$html = '<label class="btn btn-warning btn-sm">Waiting Approval</label>';
			break;
		case 2:
			$html = '<label class="btn btn-success btn-sm"><i class="fa fa-chceck"></i>Disetujui</label>';
		break;
		case 3:
			$html = '<label class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Ditolak</label>';
		break;
		case 4:
			$html = '<label class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Dibatalkan</label>';
		break;
		
		default:
			break;
	}

	return $html;
}

/**
 * [status_medical description]
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function status_medical($status)
{
	$html = '';
	switch ($status) {
		case 1:
			$html = '<label class="btn btn-warning btn-sm">Waiting Approval</label>';
			break;
		case 2:
			$html = '<label class="btn btn-success btn-sm"><i class="fa fa-chceck"></i>Disetujui</label>';
		break;
		case 3:
			$html = '<label class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Ditolak</label>';
		break;
		case 4:
			$html = '<label class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Dibatalkan</label>';
		break;
		default:
			break;
	}

	return $html;
}

/**
 * [status_cuti description]
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function status_cuti($status)
{
	$html = '';
	switch ($status) {
		case 1:
			$html = '<label class="btn btn-warning btn-sm">Waiting Approval</label>';
			break;
		case 2:
			$html = '<label class="btn btn-success btn-sm"><i class="fa fa-chceck"></i>Disetujui</label>';
		break;
		case 3:
			$html = '<label class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Ditolak</label>';
		break;
		case 4:
			$html = '<label class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Dibatalkan</label>';
		break;
		default:
			break;
	}

	return $html;
}


/**
 * [status_payment_request description]
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function status_payment_request($status)
{
	$html = '';
	switch ($status) {
		case 1:
			$html = '<label class="btn btn-warning btn-sm">Waiting Approval</label>';
			break;
		case 2:
			$html = '<label class="btn btn-success btn-sm">Disetujui</label>';
		break;
		case 3:
			$html = '<label class="btn btn-danger btn-sm">Ditolak</label>';
		break;
		case 4:
			$html = '<label class="btn btn-danger btn-sm">Dibatalkan</label>';
		break;
		default:
			break;
	}

	return $html;
}