<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CalendarController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Aluno
Route::GET('aluno/index',   [AlunoController::class,'index']);
Route::GET('aluno/show',    [AlunoController::class,'show']);
Route::POST('aluno/store',  [AlunoController::class,'store']);
Route::PUT('aluno/update',  [AlunoController::class,'update']);
Route::DELETE('aluno/delete',[AlunoController::class,'destroy']);

//Aulas Aluno
Route::GET('aluno/marca_aula',[AlunoController::class,'takeAulas']);
Route::GET('aluno/desmarca_aula',[AlunoController::class,'deselectClass']);



//professor
Route::GET('professor/index',  [ProfessorController::class,'index']);
Route::GET('professor/show',    [ProfessorController::class,'show']);
Route::POST('professor/store',  [ProfessorController::class,'store']);
Route::PUT('professor/update', [ProfessorController::class,'update']);
Route::DELETE('professor/delete', [ProfessorController::class,'destroy']);


//Aulas Professor
Route::POST('professor/criar_aulas',[ProfessorController::class,'storeAulas']);
Route::POST('professor/deleta_aulas',[ProfessorController::class,'deleteAulas']);
Route::PUT('professor/update_aulas',[ProfessorController::class,'updateAulas']);
Route::POST('professor/confirmClass',[ProfessorController::class,'confirmClass']);
Route::POST('professor/unmarkClass',[ProfessorController::class,'unmarkClass']);


//Calendar
Route::GET('calendar/index',[CalendarController::class,'indexCalendar']);
Route::POST('calendar/store',[CalendarController::class,'calendarStore']);
Route::GET('calendar/show',[CalendarController::class,'calendarShow']);
Route::POST('calendar/delete',[CalendarController::class,'deleteCalendar']);


















    

 




