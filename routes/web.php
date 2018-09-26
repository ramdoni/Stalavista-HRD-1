<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

date_default_timezone_set("Asia/Bangkok");

Route::get('/', function () 
{
	if (!Auth::check() && !Request::is('login')) {
    	return redirect('login');
	}else{
		if(Auth::user()->access_id == 1)
        {
			return redirect('administrator'); //return view('home')->with($params);
		}elseif(Auth::user()->access_id == 2)
        {
			return redirect('karyawan'); //return view('home')->with($params);
		}
	}
    return redirect('login');
});

Auth::routes();

// ROUTING LOGIN
Route::group(['middleware' => ['auth']], function(){
	/**
	 * Ajax
	 */
	Route::post('ajax/get-division-by-directorate', 'AjaxController@getDivisionByDirectorate')->name('ajax.get-division-by-directorate');
	Route::post('ajax/get-department-by-division', 'AjaxController@getDepartmentByDivision')->name('ajax.get-department-by-division');
	Route::post('ajax/get-section-by-department', 'AjaxController@getSectionByDepartment')->name('ajax.get-section-by-department');
	Route::get('ajax/get-structure', 'AjaxController@getStructure')->name('ajax.get-stucture');
	Route::get('ajax/get-structure-branch', 'AjaxController@getStructureBranch')->name('ajax.get-stucture-branch');
	Route::post('ajax/get-kabupaten-by-provinsi', 'AjaxController@getKabupatenByProvinsi')->name('ajax.get-kabupaten-by-provinsi');
	Route::post('ajax/get-kecamatan-by-kabupaten', 'AjaxController@getKecamatanByKabupaten')->name('ajax.get-kecamatan-by-kabupaten');
	Route::post('ajax/get-kelurahan-by-kecamatan', 'AjaxController@getKelurahanByKecamatan')->name('ajax.get-kelurahan-by-kecamatan');
	Route::post('ajax/get-karyawan-by-id', 'AjaxController@getKaryawanById')->name('ajax.get-karyawan-by-id');
	Route::post('ajax/add-setting-cuti-personalia', 'AjaxController@addtSettingCutiPersonalia')->name('ajax.add-setting-cuti-personalia');
	Route::post('ajax/add-setting-cuti-atasan', 'AjaxController@addtSettingCutiAtasan')->name('ajax.add-setting-cuti-atasan');
	Route::post('ajax/add-setting-payment-request-approval', 'AjaxController@addtSettingPaymentRequestApproval')->name('ajax.add-setting-payment-request-approval');
	Route::post('ajax/add-setting-payment-request-verification', 'AjaxController@addtSettingPaymentRequestVerification')->name('ajax.add-setting-payment-request-verification');
	Route::post('ajax/add-setting-payment-request-payment', 'AjaxController@addtSettingPaymentRequestPayment')->name('ajax.add-setting-payment-request-payment');
	Route::post('ajax/add-inventaris-mobil', 'AjaxController@addInvetarisMobil')->name('ajax.add-inventaris-mobil');
	Route::post('ajax/add-setting-medical-hr-benefit', 'AjaxController@addSettingMedicalHRBenefit')->name('ajax.add-setting-medical-hr-benefit');
	Route::post('ajax/add-setting-medical-manager-hr', 'AjaxController@addSettingMedicalManagerHR')->name('ajax.add-setting-medical-manager-hr');
	Route::post('ajax/add-setting-medical-gm-hr', 'AjaxController@addSettingMedicalGMHR')->name('ajax.add-setting-medical-gm-hr');
	Route::post('ajax/add-setting-overtime-hr-operation', 'AjaxController@addSettingOvertimeHrOperation')->name('ajax.add-setting-overtime-hr-operation');
	Route::post('ajax/add-setting-overtime-manager-hr', 'AjaxController@addSettingOvertimeManagerHR')->name('ajax.add-setting-overtime-manager-hr');
	Route::post('ajax/add-setting-overtime-manager-department', 'AjaxController@addSettingOvertimeManagerDepartment')->name('ajax.add-setting-overtime-manager-department');
	Route::post('ajax/add-setting-exit-hr-manager', 'AjaxController@addSettingExitHRManager')->name('ajax.add-setting-exit-hr-manager');
	Route::post('ajax/add-setting-exit-hr-gm', 'AjaxController@addSettingExitHRGM')->name('ajax.add-setting-exit-hr-gm');
	Route::post('ajax/add-setting-exit-hr-director', 'AjaxController@addSettingExitHRDirector')->name('ajax.add-setting-exit-hr-director');
	Route::post('ajax/add-setting-training-ga-department-mengetahui', 'AjaxController@addSettingTrainingGaDepartment')->name('ajax.add-setting-training-ga-department-mengetahui');
	Route::post('ajax/add-setting-training-hrd', 'AjaxController@addSettingTrainingHRD')->name('ajax.add-setting-training-hrd');
	Route::post('ajax/add-setting-training-finance', 'AjaxController@addSettingTrainingFinance')->name('ajax.add-setting-training-finance');
	Route::post('ajax/add-setting-exit-hrd', 'AjaxController@addSettingExitHRD')->name('ajax.add-setting-exit-hrd');
	Route::post('ajax/add-setting-exit-ga', 'AjaxController@addSettingExitGA')->name('ajax.add-setting-exit-ga');
	Route::post('ajax/add-setting-exit-it', 'AjaxController@addSettingExitIT')->name('ajax.add-setting-exit-it');
	Route::post('ajax/add-setting-exit-accounting', 'AjaxController@addSettingExitAccounting')->name('ajax.add-setting-exit-accounting');
	Route::post('ajax/get-history-approval', 'AjaxController@getHistoryApproval')->name('ajax.get-history-approval');
	Route::post('ajax/get-airports', 'AjaxController@getAirports')->name('ajax.get-airports');
	Route::post('ajax/get-history-approval-cuti', 'AjaxController@getHistoryApprovalCuti')->name('ajax.get-history-approval-cuti');	
	Route::post('ajax/get-history-approval-exit', 'AjaxController@getHistoryApprovalExit')->name('ajax.get-history-approval-exit');	
	Route::post('ajax/get-history-approval-training', 'AjaxController@getHistoryApprovalTraining')->name('ajax.get-history-approval-training');	
	Route::post('ajax/get-history-training-bill', 'AjaxController@getHistoryApprovalTrainingBill')->name('ajax.get-history-training-bill');	
	Route::post('ajax/get-history-approval-payment-request', 'AjaxController@getHistoryApprovalPaymentRequest')->name('ajax.get-history-approval-payment-request');		
	Route::post('ajax/get-history-approval-overtime', 'AjaxController@getHistoryApprovalOvertime')->name('ajax.get-history-approval-overtime');		
	Route::post('ajax/get-history-approval-medical', 'AjaxController@getHistoryApprovalMedical')->name('ajax.get-history-approval-medical');		
	Route::post('ajax/get-karyawan', 'AjaxController@getKaryawan')->name('ajax.get-karyawan');
	Route::post('ajax/update-dependent', 'AjaxController@updateDependent')->name('ajax.update-dependent');		
	Route::post('ajax/update-education', 'AjaxController@updateEducation')->name('ajax.update-education');		
	Route::post('ajax/update-cuti', 'AjaxController@updateCuti')->name('ajax.update-cuti');		
	Route::post('ajax/update-inventaris-mobil', 'AjaxController@updateInventarisMobil')->name('ajax.update-inventaris-mobil');		
	Route::post('ajax/update-inventaris-lainnya', 'AjaxController@updateInventarisLainnya')->name('ajax.update-inventaris-lainnya');
	Route::post('ajax/update-first-password', 'AjaxController@updatePassword')->name('ajax.update-first-password');		
	Route::post('ajax/get-position-by-section', 'AjaxController@getPositionBySection')->name('ajax.get-position-by-section');
	Route::post('ajax/calculate-hours-time', 'AjaxController@calculateHoursTime')->name('ajax.calculate-hours-time');
	Route::post('ajax/get-karyawan-manager-up', 'AjaxController@getKaryawanManagerUp')->name('ajax.get-karyawan-manager-up');
	Route::post('ajax/get-karyawan-approval', 'AjaxController@getKaryawanApproval')->name('ajax.get-karyawan-approval');
});


// ROUTING KARYAWAN
Route::group(['prefix' => 'karyawan', 'middleware' => ['auth', 'access:2']], function(){
	
	$path = 'Karyawan\\';

	Route::get('/', $path . 'IndexController@index')->name('karyawan.dashboard');
	Route::resource('medical', $path . 'MedicalController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);
	Route::resource('medical', $path . 'MedicalController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);
	Route::resource('overtime', $path . 'OvertimeController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);
	Route::resource('payment-request', $path . 'PaymentRequestController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);
	Route::resource('exit-clearance', $path . 'ExitClearanceController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);
	Route::resource('exit-interview', $path . 'ExitInterviewController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);
	Route::get('exit-inteview/detail/{id}',  $path . 'ExitInterviewController@detail')->name('karyawan.exit-interview.detail');
	
	Route::resource('compassionate-reason', $path . 'CompassionateReasonController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);
	Route::resource('training', $path . 'TrainingController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);
	
	Route::get('training/biaya/{id}', $path . 'TrainingController@biaya')->name('karyawan.training.biaya');
	Route::get('training/detail/{id}', $path . 'TrainingController@detailTraining')->name('karyawan.training.detail');
	Route::post('training/submit-biaya', $path . 'TrainingController@submitBiaya')->name('karyawan.training.submit-biaya');
	Route::resource('cuti', $path . 'CutiController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'karyawan']);

	Route::get('approval-cuti',  $path . 'ApprovalCutiController@index')->name('karyawan.approval.cuti.index');
	Route::get('approval-cuti/detail/{id}',  $path . 'ApprovalCutiController@detail')->name('karyawan.approval.cuti.detail');
	Route::post('approval-cuti/proses',  $path . 'ApprovalCutiController@proses')->name('karyawan.approval.cuti.proses');
	
	Route::get('approval-cuti-atasan',  $path . 'ApprovalCutiAtasanController@index')->name('karyawan.approval.cuti-atasan.index');
	Route::get('approval-cuti-atasan/detail/{id}',  $path . 'ApprovalCutiAtasanController@detail')->name('karyawan.approval.cuti-atasan.detail');
	Route::post('approval-cuti-atasan/proses',  $path . 'ApprovalCutiAtasanController@proses')->name('karyawan.approval.cuti-atasan.proses');
	
	Route::get('approval-payment-request',  $path . 'ApprovalPaymentRequestController@index')->name('karyawan.approval.payment_request.index');
	Route::get('approval-payment-request/detail/{id}',  $path . 'ApprovalPaymentRequestController@detail')->name('karyawan.approval.payment_request.detail');
	Route::post('approval-payment-request/proses',  $path . 'ApprovalPaymentRequestController@proses')->name('karyawan.approval.payment_request.proses');

	Route::get('approval-medical',  $path . 'ApprovalMedicalController@index')->name('karyawan.approval.medical.index');
	Route::get('approval-medical/detail/{id}',  $path . 'ApprovalMedicalController@detail')->name('karyawan.approval.medical.detail');
	Route::post('approval-medical/proses',  $path . 'ApprovalMedicalController@proses')->name('karyawan.approval.medical.proses');

	Route::get('approval-exit',  $path . 'ApprovalExitController@index')->name('karyawan.approval.exit.index');
	Route::get('approval-exit/detail/{id}',  $path . 'ApprovalExitController@detail')->name('karyawan.approval.exit.detail');
	Route::post('approval-exit/proses',  $path . 'ApprovalExitController@proses')->name('karyawan.approval.exit.proses');

	Route::get('approval-exit-clearance',  $path . 'ApprovalExitController@index')->name('karyawan.approval.exit_clearance.index');
	Route::get('approval-exit-clearance/detail/{id}',  $path . 'ApprovalExitController@detail')->name('karyawan.approval.exit_clearance.detail');
	Route::post('approval-exit-clearance/proses',  $path . 'ApprovalExitController@proses')->name('karyawan.approval.exit_clearance.proses');

	Route::get('approval-training',  $path . 'ApprovalTrainingController@index')->name('karyawan.approval.training.index');
	Route::get('approval-training/detail/{id}',  $path . 'ApprovalTrainingController@detail')->name('karyawan.approval.training.detail');
	Route::post('approval-training/proses',  $path . 'ApprovalTrainingController@proses')->name('karyawan.approval.training.proses');
	Route::get('approval-training/biaya/{id}',  $path . 'ApprovalTrainingController@biaya')->name('karyawan.approval.training.biaya');
	Route::post('approval-training/proses-biaya',  $path . 'ApprovalTrainingController@prosesBiaya')->name('karyawan.approval.training.proses-biaya');

	Route::get('approval-training-atasan',  $path . 'ApprovalTrainingAtasanController@index')->name('karyawan.approval.training-atasan.index');
	Route::get('approval-training-atasan/detail/{id}',  $path . 'ApprovalTrainingAtasanController@detail')->name('karyawan.approval.training-atasan.detail');
	Route::post('approval-training-atasan/proses',  $path . 'ApprovalTrainingAtasanController@proses')->name('karyawan.approval.training-atasan.proses');
	Route::post('approval-training-atasan/biaya',  $path . 'ApprovalTrainingAtasanController@biaya')->name('karyawan.approval.training-atasan.biaya');
	Route::get('approval-training-atasan/biaya/{id}',  $path . 'ApprovalTrainingAtasanController@biaya')->name('karyawan.approval.training-atasan.biaya');
	Route::post('approval-training-atasan/proses-biaya',  $path . 'ApprovalTrainingAtasanController@prosesBiaya')->name('karyawan.approval.training-atasan.proses-biaya');


	Route::get('approval-overtime',  $path . 'ApprovalOvertimeController@index')->name('karyawan.approval.overtime.index');
	Route::get('approval-overtime/detail/{id}',  $path . 'ApprovalOvertimeController@detail')->name('karyawan.approval.overtime.detail');
	Route::post('approval-overtime/proses',  $path . 'ApprovalOvertimeController@proses')->name('karyawan.approval.overtime.proses');

	Route::get('approval-overtime-atasan',  $path . 'ApprovalOvertimeAtasanController@index')->name('karyawan.approval.overtime-atasan.index');
	Route::get('approval-overtime-atasan/detail/{id}',  $path . 'ApprovalOvertimeAtasanController@detail')->name('karyawan.approval.overtime-atasan.detail');
	Route::post('approval-overtime-atasan/proses',  $path . 'ApprovalOvertimeAtasanController@proses')->name('karyawan.approval.overtime-atasan.proses');

	Route::get('approval-medical-atasan',  $path . 'ApprovalMedicalAtasanController@index')->name('karyawan.approval.medical-atasan.index');
	Route::get('approval-medical-atasan/detail/{id}',  $path . 'ApprovalMedicalAtasanController@detail')->name('karyawan.approval.medical-atasan.detail');
	Route::post('approval-medical-atasan/proses',  $path . 'ApprovalMedicalAtasanController@proses')->name('karyawan.approval.medical-atasan.proses');

	Route::get('approval-exit-atasan',  $path . 'ApprovalExitAtasanController@index')->name('karyawan.approval.exit-atasan.index');
	Route::get('approval-exit-atasan/detail/{id}',  $path . 'ApprovalExitAtasanController@detail')->name('karyawan.approval.exit-atasan.detail');
	Route::post('approval-exit-atasan/proses',  $path . 'ApprovalExitAtasanController@proses')->name('karyawan.approval.exit-atasan.proses');

	Route::get('news/readmore/{id}',  $path . 'IndexController@readmore')->name('karyawan.news.readmore');
	Route::get('karyawan/find', $path .'IndexController@find')->name('karyawan.karyawan.find');
	Route::get('karyawan/profile', $path .'IndexController@profile')->name('karyawan.profile');
	Route::get('karyawan/traning/detail-all/{id}', $path . 'TrainingController@detailAll')->name('karyawan.training.detail-all');
	Route::get('karyawan/download-internal-memo/{id}', $path . 'IndexController@downloadInternalMemo')->name('karyawan.download-internal-memo');
	Route::get('karyawan/download-peraturan-perusahaan/{id}', $path . 'IndexController@downloadPeraturanPerusahaan')->name('karyawan.download-peraturan-perusahaan');
	Route::get('karyawan/news/more', $path . 'IndexController@newsmore')->name('karyawan.news.more');
	Route::get('karyawan/internal-memo/more', $path . 'IndexController@internalMemoMore')->name('karyawan.internal-memo.more');
	Route::get('karyawan/backtoadministrator', $path . 'IndexController@backtoadministrator')->name('karyawan.back-to-administrator');
});

// ROUTING ADMINISTRATOR
Route::group(['prefix' => 'administrator', 'middleware' => ['auth', 'access:1']], function(){
	
	Route::get('sendemail', function(){

		$objDemo = new \stdClass();
        $objDemo->content = 'Demo One Value';
 
        \Mail::to("doni.enginer@gmail.com")->send(new \App\Mail\GeneralMail($objDemo));
	});

	$path = 'Administrator\\';

	Route::get('/', $path . 'IndexController@index')->name('administrator.dashboard');
	Route::get('profile', $path .'IndexController@profile')->name('administrator.profile');
	Route::post('profile-update', $path .'IndexController@profileUpdate')->name('administrator.profile.update');
	Route::resource('karyawan', $path . 'KaryawanController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('department', $path . 'DepartmentController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('jabatan', $path . 'JabatanController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('provinsi', $path . 'ProvinsiController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('kabupaten', $path . 'KabupatenController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('kecamatan', $path . 'KecamatanController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('kelurahan', $path . 'KelurahanController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('training', $path . 'TrainingController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('cuti', $path . 'CutiController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('overtime', $path . 'OvertimeController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('payment-request', $path . 'PaymentRequestController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('exit-clearance', $path . 'ExitClearanceController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('exit-interview', $path . 'ExitInterviewController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('compassionate-reason', $path . 'CompassionateReasonController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('medical-reimbursement', $path . 'MedicalReimbursementController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('directorate', $path . 'DirectorateController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('division', $path . 'DivisionController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('section', $path . 'SectionController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('overtime', $path . 'OvertimeController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('cabang', $path . 'CabangController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('medical', $path . 'MedicalController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('bank', $path . 'BankController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('universitas', $path . 'UniversitasController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('program-studi', $path . 'ProgramStudiController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('jurusan', $path . 'JurusanController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('sekolah', $path . 'SekolahController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('payment-request-setting', $path . 'PaymentRequestSettingController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('alasan-pengunduran-diri', $path . 'AlasanPengunduranDiriSettingController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
		
	Route::get('training/detail/{id}',  $path . 'TrainingController@detail')->name('administrator.training.detail');
	Route::post('training/proses',  $path . 'TrainingController@proses')->name('administrator.training.proses');
	Route::get('training/biaya/{id}',  $path . 'TrainingController@biaya')->name('administrator.training.biaya');
	Route::post('training/proses-biaya',  $path . 'TrainingController@prosesBiaya')->name('administrator.training.proses-biaya');

	Route::resource('setting-cuti', $path . 'SettingCutiController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('setting-payment-request', $path . 'SettingPaymentRequestController', ['only'=> ['index','destroy'], 'as' => 'administrator']);
	Route::resource('setting-medical', $path . 'SettingMedicalController', ['only'=> ['index','destroy'], 'as' => 'administrator']);
	Route::resource('setting-overtime', $path . 'SettingOvertimeController', ['only'=> ['index','destroy'], 'as' => 'administrator']);
	Route::resource('setting-exit', $path . 'SettingExitController', ['only'=> ['index','destroy'], 'as' => 'administrator']);
	Route::resource('setting-training', $path . 'SettingTrainingController', ['only'=> ['index','destroy'], 'as' => 'administrator']);
	Route::resource('setting-master-cuti', $path . 'SettingMasterCutiController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('setting-exit-clearance', $path . 'SettingExitClearanceController', ['as' => 'administrator']);
	Route::resource('cuti-bersama', $path . 'CutiBersamaController', ['as' => 'administrator']);

	Route::get('structure', $path .'IndexController@structure')->name('administrator.structure');
	
	Route::resource('setting', $path .'SettingController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('news', $path .'NewsController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('internal-memo', $path .'InternalMemoController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('branch-organisasi', $path .'BranchOrganisasiController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('branch-staff', $path .'BranchStaffController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('libur-nasional', $path .'LiburNasionalController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('plafond-dinas', $path .'PlafondDinasController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('position', $path .'PositionController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('job-rule', $path .'JobRuleController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::post('libur-nasional/import', $path .'LiburNasionalController@import')->name('administrator.libur-nasional.import');
	Route::post('cabang/import', $path .'CabangController@import')->name('administrator.cabang.import');
	Route::post('plafond-dinas/import', $path .'PlafondDinasController@import')->name('administrator.plafond-dinas.import');
	Route::post('plafond-dinas/destroy-luar-negeri', $path .'PlafondDinasController@deleteLuarNegeri')->name('administrator.plafond-dinas.destroy-luar-negeri');
	Route::post('plafond-dinas/edit-luar-negeri/{id}', $path .'PlafondDinasController@editLuarNegeri')->name('administrator.plafond-dinas.edit-luar-negeri');
	
	Route::get('branch-organisasi/tree', $path .'BranchOrganisasiController@tree')->name('administrator.branch-organisasi.tree');

	Route::get('karyawan/delete-cuti/{id}', $path .'KaryawanController@DeleteCuti')->name('administrator.karyawan.delete-cuti');
	Route::post('karyawan/import', $path .'KaryawanController@importData')->name('administrator.karyawan.import');
	Route::get('karyawan/preview-import', $path .'KaryawanController@previewImport')->name('administrator.karyawan.preview-import');
	Route::get('karyawan/delete-temp/{id}', $path .'KaryawanController@deleteTemp')->name('administrator.karyawan.delete-temp');
	Route::get('karyawan/detail-temp/{id}', $path .'KaryawanController@detailTemp')->name('administrator.karyawan.detail-temp');
	Route::get('karyawan/import-all', $path .'KaryawanController@importAll')->name('administrator.karyawan.import-all');
	Route::get('karyawan/print-profile/{id}', $path .'KaryawanController@printProfile')->name('administrator.karyawan.print-profile');
	Route::get('karyawan/delete-old-user/{id}', $path .'KaryawanController@deleteOldUser')->name('administrator.karyawan.delete-old-user');

	Route::get('absensi/index', $path .'AbsensiController@index')->name('administrator.absensi.index');
	Route::get('absensi/import', $path .'AbsensiController@import')->name('administrator.absensi.import');
	Route::post('absensi/temp-import', $path .'AbsensiController@tempImport')->name('administrator.absensi.temp-import');
	Route::get('absensi/preview-temp', $path .'AbsensiController@previewTemp')->name('administrator.absensi.preview-temp');
	Route::get('absensi/import-all', $path .'AbsensiController@importAll')->name('administrator.absensi.import-all');
	Route::get('absensi/deletenew/{id}', $path .'AbsensiController@deleteNew')->name('administrator.absensi.deletenew');
	Route::get('absensi/deleteold/{id}', $path .'AbsensiController@deleteOld')->name('administrator.absensi.deleteold');
	Route::post('cuti/batal', $path .'CutiController@batal')->name('administrator.cuti.batal');
	Route::post('training/batal', $path .'TrainingController@batal')->name('administrator.training.batal');
	Route::get('cuti/proses/{id}', $path .'CutiController@proses')->name('administrator.cuti.proses');
	Route::post('cuti/submit-proses', $path .'CutiController@submitProses')->name('administrator.cuti.submit-proses');
	Route::get('payment-request/batal/{id}', $path .'PaymentRequestController@batal')->name('administrator.payment-request.batal');

	Route::get('exit-inteview/detail/{id}',  $path . 'ExitInterviewController@detail')->name('administrator.exit-interview.detail');
	Route::post('exit-interview/proses',  $path . 'ExitInterviewController@proses')->name('administrator.exit-interview.proses');
	Route::get('cuti/delete/{id}',  $path . 'CutiController@delete')->name('administrator.cuti.delete');
	Route::get('setting-master-cuti/delete/{id}',  $path . 'SettingMasterCutiController@delete')->name('administrator.setting-master-cuti.delete');
	Route::resource('peraturan-perusahaan', $path .'PeraturanPerusahaanController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('payroll', $path .'PayrollController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);

	Route::get('payroll/import', $path .'PayrollController@import')->name('administrator.payroll.import');
	Route::get('payroll/download', $path .'PayrollController@download')->name('administrator.payroll.download');
	Route::post('payroll/temp-import', $path .'PayrollController@tempImport')->name('administrator.payroll.temp-import');
	Route::get('payroll-setting', $path .'PayrollSettingController@index')->name('administrator.payroll-setting.index');


	// Payroll
	Route::get('payroll-setting/add-pph', $path .'PayrollSettingController@addPPH')->name('administrator.payroll-setting.add-pph');
	Route::get('payroll-setting/edit-ptkp/{id}', $path .'PayrollSettingController@editPtkp')->name('administrator.payroll-setting.edit-ptkp');
	Route::get('payroll-setting/add-others', $path .'PayrollSettingController@addOthers')->name('administrator.payroll-setting.add-others');

	Route::post('payroll-setting/store-pph', $path .'PayrollSettingController@storePPH')->name('administrator.payroll-setting.store-pph');
	Route::post('payroll-setting/update-ptkp/{id}', $path .'PayrollSettingController@updatePtkp')->name('administrator.payroll-setting.update-ptkp');
	Route::post('payroll-setting/store-others', $path .'PayrollSettingController@storeOthers')->name('administrator.payroll-setting.store-others');
	Route::get('payroll/calculate', $path .'PayrollController@calculate')->name('administrator.payroll.calculate');
	Route::get('payroll/detail/{id}', $path .'PayrollController@detail')->name('administrator.payroll.detail');

	Route::resource('asset', $path .'AssetController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::resource('asset-type', $path .'AssetTypeController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'administrator']);
	Route::get('karyawan/delete-dependent/{id}', $path.'KaryawanController@deleteDependent')->name('administrator.karyawan.delete-dependent');
	Route::get('karyawan/delete-education/{id}', $path.'KaryawanController@deleteEducation')->name('administrator.karyawan.delete-education');
	Route::get('karyawan/delete-inventaris/{id}', $path.'KaryawanController@deleteInventaris')->name('administrator.karyawan.delete-inventaris');
	Route::get('karyawan/delete-inventaris-mobil/{id}', $path.'KaryawanController@deleteInventarisMobil')->name('administrator.karyawan.delete-inventaris-mobil');
	Route::get('karyawan/delete-inventaris-lainnya/{id}', $path.'KaryawanController@deleteInventarisLainnya')->name('administrator.karyawan.delete-inventaris-lainnya');
	Route::post('karyawan/change-status-karyawan', $path .'KaryawanController@changeStatusKaryawan')->name('administrator.karyawan.change-status-karyawan');
	Route::post('karyawan/change-password-karyawan', $path .'KaryawanController@changePasswordKaryawan')->name('administrator.karyawan.change-password-karyawan');
	Route::get('karyawan/autologin/{id}', $path .'KaryawanController@autologin')->name('administrator.karyawan.autologin');
});