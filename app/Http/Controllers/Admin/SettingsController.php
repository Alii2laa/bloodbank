<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:تعديل الإعدادات', ['only' => ['edit','update']]);

    }

    public function edit()
    {
        $setting = Setting::first();
        if(!$setting){
            return redirect()->back()->with(['error' => 'لا توجد إعدادات']);
        }
        return view('admin.settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        if(!$setting){
            return redirect()->back()->with(['error' => 'لا توجد إعدادات']);
        }
        $setting->update( $request->all() );

        return redirect()->back()->with(['success' => 'تم تحديث الإعدادات بنجاح']);
    }

}
