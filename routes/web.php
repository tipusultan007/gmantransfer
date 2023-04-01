<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('disneyForm',[\App\Http\Controllers\DisneyController::class,'disneyForm']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('disney',\App\Http\Controllers\DisneyController::class);
    Route::resource('destinations',\App\Http\Controllers\DestinationController::class);
    Route::resource('pickuplocations',\App\Http\Controllers\PickupDestinationController::class);
    Route::resource('dropoff-hotels',\App\Http\Controllers\DropoffHotelController::class);
    Route::resource('pickup-hotels',\App\Http\Controllers\PickupHotelController::class);
    Route::resource('priceLists',\App\Http\Controllers\PriceListController::class);
    Route::get('allPrices',[\App\Http\Controllers\PriceListController::class,'allPrices']);
    Route::get('allBookings',[BookingController::class,'allBookings']);
    Route::get('disneyBookings',[\App\Http\Controllers\DisneyController::class,'disneyBookings']);
    Route::get('disneyDetails/{id}',[\App\Http\Controllers\DisneyController::class,'details']);
    Route::get('gmanDetails/{id}',[\App\Http\Controllers\BookingController::class,'details']);
    Route::resource('bookings', BookingController::class);
});
Route::get('oneway-price',[\App\Http\Controllers\PriceListController::class,'getPriceOneway']);
Route::get('round-price',[\App\Http\Controllers\PriceListController::class,'getPriceRound']);
Route::get('multiple-price',[\App\Http\Controllers\PriceListController::class,'getPriceMultiple']);
Route::get('send-mail',[BookingController::class,'sendMail']);

Route::get('/success',function (){
    return view('thankyou');
});

Route::get('v',[\App\Http\Controllers\FrontController::class,'verify']);
Route::get('d',[\App\Http\Controllers\FrontController::class,'disneyVerify']);
Route::get('updateBooking',[\App\Http\Controllers\FrontController::class,'updateBooking']);
Route::get('updateBookingDisney',[\App\Http\Controllers\FrontController::class,'updateBookingDisney']);
Route::get('/confirmed',function (){
    return view('confirmed');
});
Route::get('/cancel',function (){
    return view('cancel');
});

Route::get('/modified',function (){
    return view('modify');
});
require __DIR__.'/auth.php';
