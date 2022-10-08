<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:عرض العملاء', ['only' => ['index']]);
        $this->middleware('permission:تفعيل العميل', ['only' => ['updateStatus']]);

        $this->middleware('permission:حذف العميل', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->route('clients.index')->with(['success' => 'تم حذف المستخدم بنجاح']);
    }

    public function updateStatus($id,$status)
    {
        $client = Client::find($id);
        if($status == 'activate'){
            $client->update(['status' => 1]);
            return redirect()->route('clients.index')->with(['success' => 'تم تفعيل المستخدم بنجاح']);
        }elseif ($status == 'deactivate'){
            $client->update(['status' => 0]);
            return redirect()->route('clients.index')->with(['success' => 'تم ايقاف المستخدم بنجاح']);
        }else{
            return redirect()->back();
        }
    }


}
