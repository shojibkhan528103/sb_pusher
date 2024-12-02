<?php

namespace App\Http\Controllers;

use App\Models\pusherone;
use App\Models\pushertow;
use Illuminate\Http\Request;

class pusherCheckController extends Controller
{
    public function store_pusher_one_data(pusherone $pusherone, Request $request)
    {
        $pusherone->firstname_pushone = $request->firstName_push_one;
        $pusherone->lastname_pushone = $request->lastName_push_one;
        $pusherone->status = 1;
        $save_one = $pusherone->save();
        if ($save_one) {
            return back()->with('status', 'successful pusher one');
        }
        return back()->with('status', 'Fail to save data puser one');
    }
    public function store_pusher_two_data(pushertow $pushertow, Request $request)
    {
        $pushertow->firstname_pushtwo = $request->firstName_push_two;
        $pushertow->lastname_pushtwo = $request->lastName_push_two;
        $pushertow->status = 1;
        $save_one = $pushertow->save();
        if ($save_one) {
            return back()->with('status', 'successful data pusher two');
        }
        return back()->with('status', 'Fail to save data pusher two');
    }
}
