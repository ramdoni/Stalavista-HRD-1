<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{   
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $params['data'] = Setting::orderBy('id', 'DESC')->get();

        return view('administrator.setting.index')->with($params);
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        foreach($request->key as $k => $v)
        {
            $data = Setting::where('key', $k)->first();
            $data->value        = $v;
            $data->save();
        }

        if ($request->hasFile('logo'))
        {
            $data = Setting::where('key', 'logo')->first();
            
            $file = $request->file('logo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

            $destinationPath = public_path('/storage/logo/');
            $file->move($destinationPath, $fileName);

            $v = $fileName;
            
            $data->value        = $v;
            $data->save();
        }

        if ($request->hasFile('favicon'))
        {
            $data = Setting::where('key', 'favicon')->first();
            
            $file = $request->file('favicon');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

            $destinationPath = public_path('/storage/favicon/');
            $file->move($destinationPath, $fileName);

            $v = $fileName;
            
            $data->value        = $v;
            $data->save();
        }

        return redirect()->route('administrator.setting.index')->with('message-success', 'Setting Updated'); 
   }
}
