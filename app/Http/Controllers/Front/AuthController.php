<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // return login form
    public function loginView(){
        return view('front.auth.login');
    }

    /*
        "Login" function is responsible for make client authenticated
         to application (web) and return data from clients table.
    */
    public function login(Request $request){
        if (auth()->guard('client')->attempt(['phone' => $request->input("phone"), 'password' => $request->input("password")])) {
            return redirect()->route('front.home');
        }
        return redirect()->back();
    }


    // return register form
    public function registerView(){
        $cities = City::all();
        $blood_types = BloodType::all();
        return view('front.auth.create',compact('cities','blood_types'));
    }


    /*
        "Register" function is responsible for make
        a new account from web to clients table.
    */
    public function register(RegistrationRequest $request){
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $client = Client::create($data + [
            'status' => 1
            ]);
        $client->api_token = Str::random(60);
        $client->save();

        $governorateId = $client->city->governorate->id;
        $client->mBloodTypes()->attach($request->blood_type_id);

        $client->mGovernorates()->attach($governorateId);

        return redirect()->route('front.login.show')->with(['success' => 'تم تسجيل حسابك بنجاح']);
    }

    // return reset password form
    public function resetPasswordView(){
        return view('front.auth.reset');
    }

    /*
        ResetPassword function is responsible for make client able to
        reset his/her password when forget it.
    */
    public function resetPassword(ResetPasswordRequest $request){
        $client = Client::where('phone',$request->phone)->first();

        if($client){
            $code = rand(1111,99999);
            $phone = $client->phone;
            if($client->pin_code != Null){
                return redirect()->back()->with(['error' => 'عفواً تم إرسال الكود بالفعل']);
            }else{
                $client->update([
                    'pin_code' => $code,
                ]);

                Mail::to($client->email)
                    ->send(new ResetPassword($code,$phone));
                return redirect('client/change')->with(['success' => 'تم إرسال الكود بنجاح']);
            }
        }else{
            return redirect()->back()->with(['error' => 'عفواً لا يوجد لك حساب']);
        }

        return redirect()->back();

    }

    /*
        ChangePasswordForgetView function is responsible for return
        a form after mail send to client with link and check for code and mobile
        when redirect to it.
    */
    public function changePasswordForgetView(Request $request,$code){

        $client = Client::where('phone',$request->phone)->first();
        if($client){
            $phone = $client->phone;
            $reqCode = $code; //make hash
            if($reqCode == $client->pin_code && $phone == $request->phone){
                return view('front.auth.confirm',compact('reqCode','phone'));
            }else{
                return redirect('client/reset')->with(['error' => 'كود التحقق خطأ']);
            }
        }else{
            return redirect('client/reset')->with(['error' => 'لا يوجد حساب لهذا الهاتف']);
        }

    }

    /*
        ChangePasswordForget function is responsible for set new password
        after client request to change it.

    */
    public function changePasswordForget(ChangePasswordRequest $request){

        $client = Client::where('phone',$request->phone)->first();

        if($client){
            $phone = $client->phone;
            $reqCode = $request->code;
            if($reqCode == $client->pin_code && $phone == $request->phone){
                $client->update([
                    'password' => bcrypt($request->password),
                    'pin_code' => Null
                ]);
            }else{
                return redirect('client/reset')->with(['error' => 'كود التحقق خطأ']);
            }
            return redirect()->route('front.login.show')->with(['success' => 'تم تغيير كلمه المرور بنجاح']);
        }else{
            return redirect('client/reset')->with(['error' => 'لا يوجد حساب لهذا الهاتف']);
        }
    }



















    public function changePassword(){
        return view('front.auth.changepassword');
    }

    public function updatePassword(Request $request){

        $client = auth('client')->user();
        $password = $client->password;
        $validator = $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|confirmed|min:6',
            'new_password_confirmation' => 'required|min:6'
        ]);

        if($validator){
            if(Hash::check($request->current_password,$password)){
                $client->update([
                    'password' => bcrypt($request->new_password)
                ]);
                return redirect()->back()->with(['success' => 'تم تغيير كلمة المرور بنجاح']);
            }else{
                return redirect()->back()->with(['error' => 'كلمة المرور القديمة خطأ']);
            }
        }
    }

    public function logout(){
        auth('client')->logout();
        return redirect()->route('front.login.show');
    }

    public function baned()
    {
        return view('front.auth.baned');
    }

    public function banedLogout(){
        auth('client')->logout();
        return redirect()->route('front.login.show');
    }
}
