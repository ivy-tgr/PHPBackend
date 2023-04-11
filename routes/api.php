<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KinoController;
use App\Http\Controllers\TicketController;


//CRUD für Ticket
Route::post('/ticket', [TicketController::class, 'create']);
Route::get('/ticket', [TicketController::class, 'read']);
Route::get('/ticket/{id}', [TicketController::class, 'readone']);
Route::put('/ticket', [TicketController::class, 'update']);
Route::delete('/ticket/{id}', [TicketController::class,'delete'])->name('delete');

//CRUD für Kino
Route::post('/kino', [KinoController::class, 'create']);
Route::get('/kino', [KinoController::class, 'read']);
Route::get('/kino/{id}', [KinoController::class, 'readone']);
Route::put('/kino', [KinoController::class, 'update']);
Route::delete('/kino/{id}', [KinoController::class,'delete'])->name('delete');

//CRUD für Film
Route::post('/film', [FilmController::class, 'create']);
Route::get('/film', [FilmController::class, 'read']);
Route::get('/film/{id}', [FilmController::class, 'readone']);
Route::put('/film', [FilmController::class, 'update']);
Route::delete('/film/{id}', [FilmController::class, 'delete']);

//Ausgabe des Lieblingsfilmes
Route::get('/Lieblingsfilm', [FilmController::class, 'Lieblingsfilm']);

//Ausgabe Welche Sprache man wie oft geschaut hat
Route::get('/sprache', [TicketController::class, 'Sprache']);