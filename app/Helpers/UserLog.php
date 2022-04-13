<?php

namespace App\Helpers;
use Request;
use App\Models\UserLog as UserLogModel;


class UserLog
{
    public static function addToLog()
    {
    	$log = [];
    	$log['logged_in'] = date('Y-m-d H:i:s');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    	UserLogModel::create($log);
    }

	public static function updateToLog()
    {
    	$model = UserLogModel::orderby('id', 'desc')->where('logged_out', null)->where('user_id', auth()->user()->id)->first();
    	$model->logged_out = date('Y-m-d H:i:s');
		$model->save();
    }

    public static function logActivityLists()
    {
    	return UserLogModel::latest()->get();
    }
}