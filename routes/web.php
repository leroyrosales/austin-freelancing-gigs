<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// All listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update edited listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Store listing data
Route::post('/listings', [ListingController::class, 'store']);

// Single listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Register user
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New user
Route::post('/users', [UserController::class, 'store']);

// Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login form
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Route::get('/hello', function () {
//     return response('<h1>hello world</h1>', 200)
//     ->header('Content-Type', 'text/plain');
// });

// Route::get('/posts/{id}', function($id) {
//     dd($id);
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//    return $request->name;
// });
