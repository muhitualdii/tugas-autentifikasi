<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    //return view('welcome');

    //$resEncrypt = encrypt('Password123', true);
    //dd($resEncrypt);
    // eyJpdiI6IkR6WGhrV205bTVnMGFyakd2ZEhEenc9PSIsInZhbHVlIjoieU9VYys3YWdGeEdML0NBRWxXN0ZTZUZ4cDFYVUxxdGJDUHpOeDFoSmVzaz0iLCJtYWMiOiJlOWVhMzY2MTgyNmViYTk2MTBiYWQ3Zjc1NDExMDZmMWU2MjM5ZTVjYjM5MzA2MWUwZDIyNmNiMmNkZjA4ODE3IiwidGFnIjoiIn0=
    //$resDecrypt = decrypt('eyJpdiI6IkR6WGhrV205bTVnMGFyakd2ZEhEenc9PSIsInZhbHVlIjoieU9VYys3YWdGeEdML0NBRWxXN0ZTZUZ4cDFYVUxxdGJDUHpOeDFoSmVzaz0iLCJtYWMiOiJlOWVhMzY2MTgyNmViYTk2MTBiYWQ3Zjc1NDExMDZmMWU2MjM5ZTVjYjM5MzA2MWUwZDIyNmNiMmNkZjA4ODE3IiwidGFnIjoiIn0=', true);
    //dd($resDecrypt);

    $pass = 'Password123';
    $hashPass = Hash::make('Password1234');
    dd(Hash::check($pass, $hashPass));
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

// Route::get('/dashboard', [UserController::class, 'dashboard'])
//     ->name('dashboard')
//     ->middleware(['authenticate', 'role:superadmin']);

// Route::get('/product', [ProductController::class, 'index'])
//     ->name('product')
//     ->middleware('role:user');

Route::middleware(['auth'])->group(function ()
{
    Route::get('/product', [ProductController::class, 'index'])
    ->name('product')
    ->middleware('role:user');

    Route::get('/user-management', [UserController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('role:superadmin');
});
