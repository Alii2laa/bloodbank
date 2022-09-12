<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonationsRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    /*
        AllDonations function return a form view to create donation request
        with cities and blood_types to select their needs that they want from donators.
    */
    public function donationView(){
        $cities = City::pluck('name','id')->all();
        $blood_types = BloodType::pluck('name','id')->all();
        return view('front.donations.create',compact('cities','blood_types'));
    }

    /*
        DonationCreate function is responsible for make client able to make a new
        request to publish about his/her patient needs with select every other client
        can donate based on blood type and governorate related with patient needs and send them
        notification.
    */
    public function donationCreate(DonationsRequest $request){

        $clientId = auth('client')->user()->id;

        $donation = DonationRequest::create(
            $request->validated()
            +
            [
                'client_id'  => $clientId
            ]
        );

        $users = $donation->city->governorate->mClients()
            ->whereHas('mBloodTypes',function ($query) use ($request,$donation){
                $query->where('blood_types.id',$donation->blood_type_id);
            })->pluck('clients.id');

        $notification = $donation->notifications()->create([
            'title' => 'طلب تبرع لفصيلة دم',
            'date' => now(),
            'donation_request_id' => $donation->id
        ]);

        $notification->mClients()->attach($users->toArray());

        return redirect()->route('donations');
    }


    /*
        Donations function is responsible for:
        1- Return all donations.
        2- Or, search with blood type , city or both.
    */
    public function donations(Request $request){
        $cities = DB::table('cities')->get();
        $bloodTypes = DB::table('blood_types')->get();

        $results = DonationRequest::where(function ($q) use ($request){

            if($request->input('city_search') && $request->input('blood_search')){
                $q->where([
                    ['blood_type_id',$request->blood_search],
                    ['city_id',$request->city_search]
                ]);
            }

            if($request->input('blood_search')){
                $q->where('blood_type_id',$request->blood_search);
            }

            if ($request->input('city_search') ){
                $q->where('city_id',$request->city_search);
            }

        })->paginate(5);

        return view('front.donations.donation',compact('results','cities','bloodTypes'));
    }

    // DonationShow function return specific donation request with it's id to show.
    public function donationShow($id){
        $results = DonationRequest::findOrFail($id);
        return view('front.donations.donationshow',compact('results'));
    }
}
