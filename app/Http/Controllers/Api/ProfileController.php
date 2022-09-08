<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use ApiResponseTrait;

    /*
        ProfileData function is responsible for return authenticated client's data to update it.
    */
    public function profileData(){

        $client = auth('api')->user();
        return $this->apiResponseJson($client);

    }

    /*
        ProfileUpdateData function is responsible for update authenticated client's data but not password.
    */
    public function profileUpdateData(UpdateProfileRequest $request){
        $client = auth('api')->user();

        if($client){
            $client->update( $request->validated() );
        }

        return $this->apiResponseJson($client,'تم تحديث البيانات بنجاح');

    }


    /*
        NotificationPeripherals function is responsible for return authenticated client's data
        for notification peripherals like blood types and governorates to customize which
        donation requests should client receive to donate.
    */
    public function notificationPeripherals(){

        $client = auth('api')->user();
        return $this->apiResponseJson([
            'BloodTypes' => $client->mBloodTypes,
            'Governorates' => $client->mGovernorates,
        ]);
    }

    /*
        CreateNotificationPeripherals function is responsible customize which
        donation requests should I receive to donate based on blood type and governorates.
    */
    public function createNotificationPeripherals(Request $request){

        $client = auth('api')->user();

        $client->mBloodTypes()->sync($request->blood_type_id);

        $client->mGovernorates()->sync($request->governorate_id);

        return $this->apiResponseJson();
    }
}
