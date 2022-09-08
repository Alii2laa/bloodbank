<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GovernorateRequest;
use App\Models\Governorate;

class GovernoratesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $governorates = Governorate::all();
        return view('admin.governorates.index',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GovernorateRequest $request)
    {
        Governorate::create( $request->validated() );
        return redirect()->back()->with(['success' => 'تم إضافة المحافظة بنجاح']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $governorate = Governorate::find($id);
        if(!$governorate){
            return redirect()->back()->with(['error' => 'لا توجد محافظة']);
        }
        return view('admin.governorates.edit',compact('governorate'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GovernorateRequest $request, $id)
    {
        $governorate = Governorate::find($id);
        if(!$governorate){
            return redirect()->back()->with(['error' => 'لا توجد محافظة']);
        }
        $governorate->update( $request->validated() );
        return redirect()->back()->with(['success' => 'تم تحديث المحافظة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Governorate::destroy($id);
        return redirect()->back()->with(['success' => 'تم حذف المحافظة بنجاح']);
    }
}
