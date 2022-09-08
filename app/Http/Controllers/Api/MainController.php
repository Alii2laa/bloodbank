<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\{BloodType,Category,City,Client,Contact,Governorate,Setting};
use Illuminate\Http\Request;

class MainController extends Controller
{
    use ApiResponseTrait;

    public function allGovernorates(){

        $governorates = Governorate::all();
        return $this->apiResponseJson($governorates,'done',200);

    }

    public function allCities(Request $request){

        $cities = City::where(function ($query) use ($request){
            if($request->has('governorate_id')){
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();
        return $this->apiResponseJson($cities);

    }

    public function settings(){

        $settings = Setting::first();
        return $this->apiResponseJson($settings);

    }

    public function allBloodTypes(){

        $bloodtypes = BloodType::all();
        return $this->apiResponseJson($bloodtypes);

    }

    public function allCategories(){

        $categories = Category::all();
        return $this->apiResponseJson($categories);

    }


    /*
        ContactUS function is responsible for send messages to system admin.
     */
    public function contactUS(ContactRequest $request){

        $clientId = auth('api')->user()->id;
        $message = Contact::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'client_id' => $clientId,
        ]);
        return $this->apiResponseJson($message);

    }













    public function logout(){

        $clientId = auth('api')->user()->id;
        $client = Client::find($clientId);
        $client->update([
            'api_token' => NULL,
        ]);
        return $this->apiResponseJson(null,'تم تسجيل الخروج بنجاح');

    }

}
