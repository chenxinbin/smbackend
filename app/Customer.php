<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Customer extends Authenticatable
{
	use Notifiable;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'access_token'
    ];

    public static function attempt(array $credentials = [])
    {
        //username, mobile check
        $password = $credentials['password'];
        unset($credentials['password']);

        $customer = \App\Customer::where(['username'=>$credentials])->first();
        if ($customer && password_verify($password, $customer->password))
        {
        	return $customer;
        }

       	return false;

    }

    public function getDirectUnionMemberIds($id=0)
    {
        if($id==0)
            $id = $this->id;

        return DB::table('customers')->where('refer_id', $id)->pluck('id')->toArray();
    }

    public function getUnionMemberIds($id=0)
    {
        if($id==0)
            $id = $this->id;

        $ids = [];

        $members = $this->getDirectUnionMemberIds($id);

        if($members)
        {
            $ids = array_merge($ids, $members);
            foreach ($members as $key => $value) {
                $ms = $this->getDirectUnionMemberIds($value);
                if($ms)
                    $ids = array_merge($ids, $ms);
            }
        }

        return $ids;

    }

}
