<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Governorate;


class CitiesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:عرض المدن', ['only' => ['index']]);
        $this->middleware('permission:اضافة مدينة', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل مدينة', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف مدينة', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //use yajra package
        $cities = City::all();
        return view('admin.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $governorates = Governorate::pluck('name','id')->all();

        return view('admin.cities.create',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CityRequest $request)
    {
        City::create( $request->validated() );
        return redirect()->back()->with(['success' => 'تم إضافة المدينه بنجاح']);

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $governorates = Governorate::pluck('name','id')->all();
        $city = City::find($id);
        if(!$city){
            return redirect()->back()->with(['error' => 'لا توجد مدينه']);
        }
        return view('admin.cities.edit',compact('city','governorates'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        if(!$city){
            return redirect()->back()->with(['error' => 'لا توجد مدينة']);
        }
        $city->update( $request->validated() );
        return redirect()->back()->with(['success' => 'تم تحديث المدينه بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        City::destroy($id);
        return redirect()->back()->with(['success' => 'تم حذف المدينه بنجاح']);
    }
}
