<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\DonationsRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $cities = DB::table('cities')->get();
        $bloodTypes = DB::table('blood_types')->get();
        $posts = DB::table('posts')->take(6)->get(); //there is also skip ()
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
