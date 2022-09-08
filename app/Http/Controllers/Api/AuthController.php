<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\TokenRequest;
use App\Mail\ResetPassword;
use App\Models\Client;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use ApiResponseTrait;

    /*
        "Register" function is responsible for make
        a new account from mobile to clients table.
    */

    public function register(RegistrationRequest $request){

        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        $client = Client::create($data);
        $client->api_token = Str::random(60);
        $client->save();

        return $this->apiResponseJson([
            'api_token' => $client->api_token,
            'client' => $client
        ],'تم إنشاء الحساب بنجاح',201);
    }

    /*
        "Login" function is responsible for make client authenticated
         to application (mobile) and return data from clients table.
    */

    public function login(Request $request){

        $client = Client::where('phone',$request->phone)->first();

        if($client){
            if (Hash::check($request->password,$client->password)){

                if($client->api_token !== Null){
                    return $this->apiResponseJson('','مسجل دخول بالفعل');
                }else{
                    $client->api_token = Str::random(60);
                    $client->save();
                }

                return $this->apiResponseJson([
                    'api_token' => $client->api_token,
                    'client' => $client
                ],'تم تسجيل الدخول بنجاح',200);

            }else{
                return $this->apiResponseJson(null,'لم يتم تسجيل الدخول بنجاح',200);
            }
        }else{
            return $this->apiResponseJson(null,'لا يوجد لك حساب',404);
        }

    }

    /*
        ResetPassword function is responsible for make client able to
        reset his/her password when forget it.
    */

    public function resetPassword(ResetPasswordRequest $request){

        $client = Client::where('phone',$request->phone)->first();

        if($client){

            $code = rand(1111,99999);

            if($client->pin_code != Null){
                return $this->apiResponseJson(null,'تم إرسال الكود بالفعل',200);
            }else{
                $client->update([
                    'pin_code' => $code
                ]);
                Mail::to($client->email)
                    ->send(new ResetPassword($code));
                return $this->apiResponseJson(null,'تم إرسال الكود بنجاح',200);
            }

        }else{
            return $this->apiResponseJson(null,'لا يوجد لك حساب',404);
        }
    }


    /*
            ChangePasswordForget function is responsible for set new password
            after client request to change it.

    */

    public function changePassword(ChangePasswordRequest $request){

        $client = Client::where('phone',$request->phone)->first();

        if($client){

            if($request->pin_code == $client->pin_code){

                $client->update([
                    'password' => bcrypt($request->password),
                    'pin_code' => Null
                ]);

            }else{
                return $this->apiResponseJson(null,'كود التحقق خطأ');
            }

            return $this->apiResponseJson(null,'تم تغيير كلمه المرور بنجاح');
        }else{
            return $this->apiResponseJson(null,'لا يوجد لك حساب',404);
        }
    }


    public function registerToken(TokenRequest $request){

        Token::where('token',$request->token)->delete();

        $request->user('api')->tokens()->create( $request->validated() );

        return $this->apiResponseJson(null);

    }
    public function removeToken(Request $request){
        $validation = $request->validate([
            'token' => 'required',
        ],[
            'token.required' => 'عفواً يجب إدخال التوكن',
        ]);

        Token::where('token',$request->token)->delete();
        return $this->apiResponseJson(null);
    }




}
