<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Livewire\MapLocation;


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
    return view('welcome');
});

Auth::routes();


Route::get('/map', MapLocation::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('aluno/index',  [AlunoController::class, 'index'])->name('index');
Route::get('aluno/show',    [AlunoController::class, 'show'])->name('show');
Route::post('aluno/store',  [AlunoController::class, 'store']);
Route::post('aluno/update', [AlunoController::class, 'update']);
Route::post('aluno/delete', [AlunoController::class, 'destroy']);

Route::get('aluno/teste', [AlunoController::class, 'teste'])->name('alunoteste');




Route::post('professor/index',  [ProfessorController::class,'index']);
Route::get('professor/show',    [ProfessorController::class,'show']);
Route::post('professor/store',  [ProfessorController::class,'store']);
Route::post('professor/update', [ProfessorController::class,'update']);
Route::post('professor/delete', [ProfessorController::class,'destroy']);



Route::get('welcome', function(){
    return view('welcome');
 })->name('welcome');


Route::get('PlanRegister',function(){
    return view('PlanRegister');
})->name('PlanRegister');


Route::get('professor', function(){
    return view('auth.professor');
 })->name('professor');


 Route::get('teste', function(){
    return view('teste');
 })->name('teste');

 


