<?php

use App\Http\Controllers\pusherCheckController;
use App\Models\pusherone;
use App\Models\pushertow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pusher/one', function () {
    $push_one = pushertow::get();
    return view('pushman_one', compact('push_one'));
});
Route::get('/pusher/two', function () {
    $push_two = pusherone::get();
    return view('pushman_two', compact('push_two'));
});

Route::controller(pusherCheckController::class)->group(function () {
    Route::post('/store/data/pusher-one', 'store_pusher_one_data')->name('store.pusher.one.data');
    Route::post('/store/data/pusher-two', 'store_pusher_two_data')->name('store.pusher.two.data');
});
