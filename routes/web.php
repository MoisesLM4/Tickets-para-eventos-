<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/eventos', [EventController::class,'index'])->name('events.index');
Route::get('/eventos/{event:slug}', [EventController::class,'show'])->name('events.show');
Route::get('/como-funciona', fn()=>view('home.how'))->name('how');
Route::get('/precios', fn()=>view('home.prices'))->name('prices');

Route::middleware('guest')->group(function(){
 Route::get('/login',[AuthController::class,'showLogin'])->name('login');
 Route::post('/login',[AuthController::class,'login'])->name('login.store');
 Route::get('/registro',[AuthController::class,'showRegister'])->name('register');
 Route::post('/registro',[AuthController::class,'register'])->name('register.store');
});
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function(){
 Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
 Route::post('/eventos/{event}/comprar',[OrderController::class,'store'])->name('orders.store');
 Route::get('/mis-compras',[OrderController::class,'index'])->name('orders.index');
 Route::get('/mis-compras/{order}',[OrderController::class,'show'])->name('orders.show');
 Route::get('/mis-entradas',[TicketController::class,'index'])->name('tickets.index');
});

Route::middleware(['auth','role:organizer,admin'])->prefix('organizador')->name('organizer.')->group(function(){
 Route::get('/',[OrganizerController::class,'dashboard'])->name('dashboard');
 Route::get('/eventos/crear',[OrganizerController::class,'create'])->name('events.create');
 Route::post('/eventos',[OrganizerController::class,'store'])->name('events.store');
 Route::get('/eventos/{event}/editar',[OrganizerController::class,'edit'])->name('events.edit');
 Route::put('/eventos/{event}',[OrganizerController::class,'update'])->name('events.update');
 Route::delete('/eventos/{event}',[OrganizerController::class,'destroy'])->name('events.destroy');
});

Route::middleware(['auth','role:staff,organizer,admin'])->group(function(){ Route::post('/entradas/{ticket}/validar',[TicketController::class,'validateTicket'])->name('tickets.validate'); });

Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function(){
 Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');
 Route::get('/usuarios',[AdminController::class,'users'])->name('users');
 Route::patch('/usuarios/{user}/rol',[AdminController::class,'updateRole'])->name('users.role');
 Route::get('/eventos',[AdminController::class,'events'])->name('events');
 Route::patch('/eventos/{event}/estado',[AdminController::class,'updateEventStatus'])->name('events.status');
});
