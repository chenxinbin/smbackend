<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use DB;

class UnionController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**     盟友通讯录      */
    public function listMember()
    {
        $members = \App\Customer::where('refer_id', Auth::id())->orderBy('id', 'desc')->get();

        return $this->success($members);

    }


    // 首页统计
    public function todayStat()
    {
        //DB::enableQueryLog();


        //本日新增直营盟友
        $stat = [];
        $stat['today_member_inc'] = \App\Customer::where('refer_id', Auth::id())->where('created_at', '>=', Carbon::today())->count();

        //今日直营盟友业务量
        $stat['today_member_orders'] = \App\Order::where('refer_id', Auth::id())->where('created_at', '>=', Carbon::today())->count();

        //本月盟友交易额
        $ids = Auth::user()->getUnionMemberIds();
        $stat['month_member_orders'] = \App\Order::whereIn('customer_id', $ids)->where('created_at', '>=', Carbon::now()->startOfMonth())->count();



        //今日新增直营盟友

        //DB::enableQueryLog();

        //var_dump(DB::getQueryLog());
        //订单
        return $this->success($stat);
    }
    
    
    
}
