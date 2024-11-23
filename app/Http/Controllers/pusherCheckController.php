<?php

namespace App\Http\Controllers;

use App\Models\pusherone;
use App\Models\pushertow;
use Illuminate\Http\Request;
use Laravel\Reverb\Events\MessageSent;

class pusherCheckController extends Controller
{
    public function store_pusher_one_data(pusherone $pusherone, Request $request)
    {
        $pusherone->firstname_pushone = $request->firstName_push_one;
        $pusherone->lastname_pushone = $request->lastName_push_one;
        $pusherone->status = 1;
        $message = $request->firstName_push_one;
        $additionalData = $request->lastName_push_two;
        $save_one = $pusherone->save();
        if ($save_one) {
            broadcast(new MessageSent($message, $additionalData))->toOthers();
        }
        return back()->with('status', 'Fail to save data puser one');
    }
    public function store_pusher_two_data(pushertow $pushertow, Request $request)
    {
        $pushertow->firstname_pushtwo = $request->firstName_push_two;
        $pushertow->lastname_pushtwo = $request->lastName_push_two;
        $pushertow->status = 1;
        $message = $request->firstName_push_two;
        $additionalData = $request->lastName_push_two;
        $save_one = $pushertow->save();
        if ($save_one) {
            broadcast(new MessageSent($message, $additionalData))->toOthers();
            return response()->json(['status' => 'Message broadcasted! and successful data pusher two']);
        }
        return back()->with('status', 'Fail to save data pusher two');
    }
}
