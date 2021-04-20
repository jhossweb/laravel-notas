<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
|
| Register - Login - Logout
|
*/
// muestra el formulario de registro
Route::get('/register', [UsersController::class, 'register'])->name('users.register');

// Proceso de registro de usuario
Route::post('/signup', [UsersController::class, 'signup'])->name('users.signup');

// si estoy autenticado, guest no me mostrar el login
Route::get('/login', [UsersController::class, 'index'])->name('login')->middleware('guest');

// Proceso de login
Route::post('/login', [UsersController::class, 'authenticate'])->name('users.auth');

// Cierre de Sesión
Route::post('/logout', [UsersController::class, 'logout'])->name('users.logout');


/*
|--------------------------------------------------------------------------
| Notes
|--------------------------------------------------------------------------
|
| Create - Read - Update - Delete
|
*/
Route::resource('notes', NotesController::class)->parameters(["notes" => "notes"])->middleware('auth');

Route::put('notes/completed/{id}', [NotesController::class, 'completed'])->name('notes.completed')->middleware('auth');
Route::get('/completed', [NotesController::class, 'notesCompleted'])->name('notes.nc')->middleware('auth');



/*
|--------------------------------------------------------------------------
| Tareas Terminadas
|--------------------------------------------------------------------------
|
| Create - Read - Update - Delete
|
*/
