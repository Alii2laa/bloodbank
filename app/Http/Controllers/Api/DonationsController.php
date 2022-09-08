<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonationsRequest;
use App\Models\DonationRequest;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class DonationsController extends Controller
{
    use ApiResponseTrait;
    use NotificationTrait;

    /*
       AllDonations function is responsible for:
       1- Return all donations.
       2- Or, search with blood type , city or both.
   */
    public function allDonations(Request $request){

        //$cities = DB::table('cities')->get();
        //$bloodTypes = DB::table('blood_types')->get();

        $donations = DonationRequest::where(function ($q) use ($request){

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
        return $this->apiResponseJson([
            $donations
        ]);

    }

    // SingleDonation function return specific donation request with it's id.
    public function singleDonation(Request $request){

        $donations = DonationRequest::where('id',$request->donation_request_id)->first();
        return $this->apiResponseJson($donations);

    }

    /*
        DonationCreate function is responsible for make client able to make a new
        request to publish about his/her patient needs with select every other client
        can donate based on blood type and governorate related with patient needs and send them
        notification.
    */
    public function createDonation(DonationsRequest $request){

        $clientId = auth('api')->user()->id;

        $donation = DonationRequest::create(
            $request->validated()
            +
            [
                'client_id'  => $clientId
            ]);

        $users = $donation->city->governorate->mClients()
            ->whereHas('mBloodTypes',function ($query) use ($request,$donation){
                $query->where('blood_types.id',$donation->blood_type_id);
            })->pluck('clients.id')->toArray();

        if (count($users)){
            $notification = $donation->notifications()->create([
                'title' => 'طلب تبرع لفصيلة دم',
                'content' => $donation->bloodType->name . ' محتاج في أسرع وقت طلب تبرع لفصيلة',
                'date' => now(),
                'donation_request_id' => $donation->id
            ]);


            $notification->mClients()->attach($users);

            $tokens = Token::whereIn('client_id',$users)->where('token' , '!=',null)->pluck('token');

            if(count($tokens)){
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donation->id
                ];

                $this->notifyByFirebase($title,$body,$tokens,$data,true);

            }
        }

        return $this->apiResponseJson($donation,'تم إضافة الطلب بنجاح',201);

    }


}
