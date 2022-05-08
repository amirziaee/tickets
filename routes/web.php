<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\InfoController;
use App\Http\Controllers\User\MessageController;
use App\Http\Controllers\User\SendMessageController;
use App\Http\Controllers\User\DraftMessageController;
use App\Http\Controllers\User\DeleteMessageController;
use App\Http\Controllers\User\SearchMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing.landing');
})->name('home');

Route::get('/about-us', function () {
    return view('landing.about');
})->name('aboutus');

Route::get('/contact-us', function () {
    return view('landing.contact');
})->name('contactus');



  

   //register and login route

Route::prefix('auth')->group(function(){

    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/dologin',[UserController::class,'DoLogin'])->name('auth.login');
    
    Route::get('/register',[UserController::class,'register'])->name('register');
    Route::post('/doregister',[UserController::class,'DoRegister'])->name('auth.create');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');


});

    // user dashboard route
     // ->middleware('AutchCheck')

    Route::prefix('user')->middleware('AutchCheck')->group(function(){
        // show mail box with new message .... Message controller
        Route::get('/dashboard',[ MessageController::class,'showMesssage'])->name('dashboard');
        Route::get('/dashboard/draft',[ MessageController::class,'draftMessage'])->name('draft.message');
        Route::get('/dashboard/sent',[ MessageController::class,'sentMessage'])->name('sent.message');
        Route::get('/dashboard/deleted',[ MessageController::class,'deleteMessage'])->name('delete.message');
        // send and sent and show single message 
        Route::get('/dashboard/send/',[ SendMessageController::class,'show'])->name('send.message');
        Route::post('/dashboard/sending',[ SendMessageController::class,'create'])->name('sending.message');
        Route::get('/dashboard/send/single/{id}',[ SendMessageController::class,'showSingle'])->name('show.single.message');
        Route::get('/dashboard/sent/show/{id}',[SendMessageController::class,'showSentSingle'])->name('show.sent.message');
        
        Route::get('/dashboard/send/delete/{id}',[ SendMessageController::class,'softDelete'])->name('delete.single.message');
        //hard delete and single show for delete ... delete controller
        Route::get('/dashboard/message/delete/{id}',[ DeleteMessageController::class,'showSingle'])->name('show.delete.single.message');
        Route::get('/dashboard/message/delete/do/{id}',[ DeleteMessageController::class,'delete'])->name('hard.delete.message');
        //store drafte and show single draft

        Route::post('/dashboard/drafting',[ DraftMessageController::class,'create'])->name('draft.create');
        Route::get('/dashboard/draft/{id}',[ DraftMessageController::class,'showSingle'])->name('draft.single.show');
        Route::post('/dashboard/draft/sending/{id}',[ DraftMessageController::class,'update'])->name('draft.send');

        // store and update information of user and show info page
        Route::get('dashboard/info',[InfoController::class,'showInfo'])->name('info');
        Route::post('dashboard/info/create',[InfoController::class,'create'])->name('store.info');
        Route::get('dashboard/info/update/{id}',[InfoController::class,'showUpdate'])->name('update.info');
        Route::post('dashboard/info/updated/{id}',[InfoController::class,'Update'])->name('updated.info');
        //search show result
        Route::get('dashboard/search',[SearchMessageController::class,'result'])->name('search.top');
        Route::get('dashboard/advance/search',[SearchMessageController::class,'show'])->name('advance.search');
        Route::get('dashboard/advance/do-search',[SearchMessageController::class,'doSearch'])->name('do.search');
    });