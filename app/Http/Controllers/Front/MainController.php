<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\{Contact, DonationRequest, Post};
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $cities = DB::table('cities')->get();
        $bloodTypes = DB::table('blood_types')->get();
        $posts = Post::take(6)->get();
        $donations = DonationRequest::take(2)->get();
        return view('front.home',compact('cities','bloodTypes','donations','posts'));
    }

    public function about(){
        return view('front.about');
    }


    public function contactShow(){
        return view('front.contacts.contact');
    }

    /*
       ContactUS function is responsible for send messages to system admin.
    */
    public function contact(ContactRequest $request){

        $clientId = auth('client')->user()->id;

        Contact::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'client_id' => $clientId,
        ]);
        return redirect()->route('contact');
    }
}
