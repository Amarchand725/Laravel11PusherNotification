<?php

use Illuminate\Http\Request;
use App\Events\TestNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/send-message', function (Request $request) {
    $message = $request->message;
    Log::info('Received message: ' . $message);

    try {
        event(new TestNotification([
            'message' => $message
        ]));
        Log::info('Event dispatched');
    } catch (Exception $e) {
        Log::error('Error dispatching event: ' . $e->getMessage());
    }
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function(){
    return view('post');
});

Route::view('/pusher1', 'pusher1');
Route::view('/pusher2', 'pusher2');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');