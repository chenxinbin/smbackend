<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use DB;

class AppController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**     基本配置      */
    public function setting()
    {
        //DB::enableQueryLog();
        $phone = \App\Setting::where(['code'=>'APP', 'key'=>'CUSTOMERCALL'])->value('value');
        //var_dump(DB::getQueryLog());
        $banner = json_decode(\App\Setting::where(['code'=>'APP', 'key'=>'BANNER'])->value('value'), true);

        return $this->success(compact('phone', 'banner'));
    }


    // 轮播图
    public function banner()
    {
        $banner = json_decode(\App\Setting::where(['code'=>'APP', 'key'=>'BANNER'])->value('value'), true);

        return $this->success(compact('banner'));
    }
    
    
    // 关于我们
    public function about()
    {
        $about = \App\Setting::where(['code'=>'APP', 'key'=>'ABOUT'])->select('value')->value('value');
        return $this->success(compact('about'));
    }
    
}
