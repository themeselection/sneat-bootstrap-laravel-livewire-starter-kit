<?php

use App\Http\Controllers\AgentsdetailsModelController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleMakeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('list_policy',[PolicyController::class, 'index'])->name('list_policy'); 
    Route::get('buypolicy',[PolicyController::class, 'buypolicy'])->name('buy_policy');
    Route::get('new_policy',[PolicyController::class, 'newpolicy'])->name('new_policy');
    Route::get('view_policy',[PolicyController::class, 'viewpolicy'])->name('view_policy');
    Route::post('submit_mpolicy',[PolicyController::class, 'submitmpolicy'])->name('submit_mpolicy');
    Route::post('confirm_mpolicy',[PolicyController::class, 'confirmmpolicy'])->name('confirm_mpolicy');
    Route::post('pay_policy',[PolicyController::class, 'paypolicy'])->name('pay_policy');


});

Route::get('error', function () {
  return view('user_errors');
})->name('uerror');

Route::middleware('auth')->group(function () {
    Route::get('list_users',[UserController::class, 'index'])->name('list_users'); 
    Route::post('update_user',[UserController::class, 'updateuser'])->name('update_user');    
});

Route::middleware('auth')->group(function () {
    Route::get('list_agents',[AgentsdetailsModelController::class, 'index'])->name('list_agents'); 
    Route::get('agent_profile',[AgentsdetailsModelController::class, 'agentprofile'])->name('agentprofile');  
    Route::post('agent_update',[AgentsdetailsModelController::class, 'agentupdate'])->name('agentupdate');    
});


Route::middleware('auth')->group(function () {
    Route::get('list_vmake',[VehicleMakeController::class, 'index'])->name('list_vmake'); 
    Route::post('import_vmakes',[VehicleMakeController::class, 'importvmake'])->name('importvmake');   

});

Route::middleware(['auth'])->group(function () {
  Route::redirect('settings', 'settings/profile');

  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');
});

require __DIR__ . '/auth.php';
