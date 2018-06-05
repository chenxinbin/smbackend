<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Customer;
use Auth;

class AuthController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    /**     客户端登录      */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $customer = Customer::attempt($credentials)) {
                return $this->error(401, 'invalid_credentials');
            }

            //echo $token = $customer->createToken('access_token')->accessToken;
            $customer->access_token = $access_token = str_random(32);
            $customer->save();


        } catch (Exception $e) {
            return $this->error(401, 'could_not_create_token');
        }

        // all good so return the token
        return $this->success(compact('access_token'));

    }

    /**     基本信息      */
    public function profile()
    {
        $user = Auth::user()->toArray();

        return $this->success($user);

    }
    
     /**     修改信息      */
    public function saveProfile()
    {

    }
    
    //注册
    public function register(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $customer = new \App\Customer;
        $customer->username = $request->input('username');
        $customer->phone = $request->input('username');
        $customer->password = bcrypt($request->input('password'));

        $customer->save();

        return $this->success([], '注册成功');

    }
    
    //找回密码
    public function findpassword()
    {

    }
    
    
    //实名认证信息
    public function getCertification()
    {

    }
    
    //实名认证信息
    public function saveCertification()
    {
        
    }
    
    
    //推荐
    public function invite()
    {
        $refer_id = sprintf('%05s', Auth::id());

        echo $refer_id;
        
    }
    
    //发送短消息
    public function sendSMS()
    {
        $refer_id = sprintf('%05s', Auth::id());

        echo $refer_id;
        
    }

    
}
