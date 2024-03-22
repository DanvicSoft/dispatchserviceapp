<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DispatchrequestController;

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

Route::get('/dispatchrequest', [DispatchrequestController::class, 'index']);
Route::get('/completedrequest', [DispatchrequestController::class, 'completedrequest']);
Route::get('/confirmedrequest/{id}', [DispatchrequestController::class, 'confirmedrequest']);
Route::get('adddispatchrequest', [DispatchrequestController::class, 'adddispatchrequest']);
Route::post('createdispatchrequest', [DispatchrequestController::class, 'createdispatchrequest']);
Route::get('/acceptrequest/{dispatchrequest_id}', [DispatchrequestController::class, 'acceptrequest']);
Route::get('/useracceptrequest/{dispatchrequest_id}', [DispatchrequestController::class, 'useracceptrequest']);
Route::get('/recieveparcel/{dispatchrequest_id}', [DispatchrequestController::class, 'recieveparcel']);
Route::post('/signedrequest', [DispatchrequestController::class, 'signedrequest']);
// Register and Authentication
Route::get('/registeruser', [UserController::class, 'register']);
Route::post('/createuser', [UserController::class, 'createuser']);
Route::get('/', [UserController::class, 'loginform']);
Route::post('/authenticate', [UserController::class, 'authenticate']);


Route::get('/acceptrequest/{dispatchrequest_id}', [DispatchrequestController::class, 'acceptrequest']);

Route::post('/logoutuser', [Usercontroller::class, 'logoutuser']);








/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
