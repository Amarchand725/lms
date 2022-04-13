<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogActivity;
use App\Models\UserLog;

class AdminController extends Controller
{
    public function activityLogs()
    {
        $models = LogActivity::orderby('id', 'desc')->get();
        return view('logs.activity_log', compact('models'));
    }
    public function userLogs(Type $var = null)
    {
        $models = UserLog::orderby('id', 'desc')->get();
        return view('logs.user_log', compact('models'));
    }
}
