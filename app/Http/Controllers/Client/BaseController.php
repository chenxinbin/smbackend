<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;


class BaseController extends Controller
{

	public function success($item, $message='success')
	{
		return [
			'code' => 200,
			'message' => $message,
			'result' => $item
		];
	}

	public function error($code=-1, $message='error')
	{
		return [
			'code' => $code,
			'message' => $message,
		];
	}

}
