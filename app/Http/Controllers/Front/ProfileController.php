<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /*
        ProfileData function is responsible for return authenticated client's data to update it.
    */
    public function profileData(){
        $client = auth('client')->user();
        $cities = City::pluck('name','id')->all();
        $blood_types = BloodType::pluck('name','id')->all();
        return view('front.profile.profile',compact('client','cities','blood_types'));
    }

    /*
        ProfileUpdateData function is responsible for update authenticated client's data but not password.
    */
    public function profileUpdateData(UpdateProfileRequest $request){
        $client = auth('client')->user();

        if($client){
            $client->update( $request->validated() );
        }
        return redirect()->back()->with(['success' => 'تم تحديث البيانات بنجاح']);
    }

    /*
        NotificationPeripherals function is responsible for return authenticated client's data
        for notification peripherals like blood types and governorates to customize which
        donation requests should client receive to donate.
    */
    public function notificationPeripherals(){
        $client = auth('client')->user();

        $BloodTypes = $client->mBloodTypes;
        $BloodTypesIds = $BloodTypes->pluck('id')->all();

        $Governorates = $client->mGovernorates;
        $GovernoratesIds = $Governorates->pluck('id')->all();

        $allTypes = BloodType::all();
        $allGoves = Governorate::all();


        return view('front.profile.peripherals-edit',
            compact(
                'BloodTypes',
                'BloodTypesIds',
                'allTypes',
                'GovernoratesIds',
                'allGoves')
        );
    }

    /*
        CreateNotificationPeripherals function is responsible customize which
        donation requests should I receive to donate based on blood type and governorates.
    */
    public function createNotificationPeripherals(Request $request){

        $client = auth('client')->user();

        $client->mBloodTypes()->sync($request->blood_types);

        $client->mGovernorates()->sync($request->governorates_ids);

        return redirect()->back()->with(['success' => 'تم تحديث البيانات بنجاح']);
    }
}
