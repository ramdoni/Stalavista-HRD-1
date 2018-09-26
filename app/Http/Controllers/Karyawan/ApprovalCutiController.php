<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovalCutiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params['data'] = \App\CutiKaryawan::orderBy('id', 'DESC')->get();

        return view('karyawan.approval-cuti.index')->with($params);
    }

    /**
     * [proses description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function proses(Request $request)
    {
        $status = new \App\StatusApproval;
        $status->approval_user_id       = \Auth::user()->id;
        $status->jenis_form             = 'cuti';
        $status->foreign_id             = $request->id;
        $status->status                 = $request->status;
        $status->noted                  = $request->noted;
        $status->save();    

        $cuti = \App\CutiKaryawan::where('id', $request->id)->first();
        $cuti->is_personalia_id = \Auth::user()->id;
        $cuti->personalia_proses_date = date('Y-m-d H:i:s');
        $cuti->is_approved_personalia = $request->status;
        $cuti->save();

        $params['data'] = $cuti;
        if($request->status == 0)
        {
            $status = 3;

            $params['text']     = '<p><strong>Dear Bapak/Ibu '. $cuti->user->name .'</strong>,</p> <p>  Pengajuan Cuti / Ijin anda <strong style="color: red;">DITOLAK</strong>.</p>';
            // send email
            \Mail::send('email.cuti-approval', $params,
                function($message) use($cuti) {
                    $message->from('services@asiafinance.com');
                    $message->to($cuti->karyawan->email);
                    $message->subject('PT. Arthaasia Finance - Pengajuan Cuti / Izin');
                }
            );      
            
        }else{
            $status = 2;

            $params['text']     = '<p><strong>Dear Bapak/Ibu '. $cuti->user->name .'</strong>,</p> <p>  Pengajuan Cuti / Ijin anda <strong style="color: green;">DISETUJUI</strong>.</p>';
            // send email
            \Mail::send('email.cuti-approval', $params,
                function($message) use($cuti) {
                    $message->from('services@asiafinance.com');
                    $message->to($cuti->karyawan->email);
                    $message->subject('PT. Arthaasia Finance - Pengajuan Cuti / Izin');
                }
            );

            $user_cuti = \App\UserCuti::where('user_id', $cuti->user_id)->where('cuti_id', $cuti->jenis_cuti)->first();

            if(empty($user_cuti))
            {
                $temp = \App\Cuti::where('id', $cuti->jenis_cuti)->first();

                if($temp)
                {
                    $user_cuti                  = new \App\UserCuti();
                    $user_cuti->kuota           = $temp->kuota;
                    $user_cuti->user_id         = $cuti->user_id;
                    $user_cuti->cuti_id         = $cuti->jenis_cuti;
                    $user_cuti->cuti_terpakai   = $cuti->total_cuti;
                    $user_cuti->sisa_cuti       = $temp->kuota - $cuti->total_cuti;
                    $user_cuti->save();
                }
            }
            else
            {
               // jika cuti maka kurangi kuota
                if(strpos($user_cuti->cuti->jenis_cuti, 'Cuti') !== false)
                {
                    $sisa_cuti      = $user_cuti->kuota - ($user_cuti->cuti_terpakai + $cuti->total_cuti);

                    // kurangi cuti tahunan user jika sudah di approved
                    $user_cuti->cuti_terpakai   = $user_cuti->cuti_terpakai + $cuti->total_cuti;
                    $user_cuti->sisa_cuti       = $sisa_cuti;
                    $user_cuti->save();
                }
            }
        }
        
        //$cuti->status = $status;
        $cuti->save();

        return redirect()->route('karyawan.approval.cuti.index')->with('messages-success', 'Form Cuti Berhasil diproses !');
    }

    /**
     * [detail description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function detail($id)
    {   
        $params['data'] = \App\CutiKaryawan::where('id', $id)->first();

        return view('karyawan.approval-cuti.detail')->with($params);
    }
}
