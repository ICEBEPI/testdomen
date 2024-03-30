<?php

use App\Http\Controllers\Car;
use App\Http\Controllers\CarController;
use App\Http\Controllers\EngineController;
use App\Http\Controllers\MyController;
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

Route::get('/', [MyController::class, 'main'])->name('main');

Route::get('cars', [CarController::class, 'index'])->name('cars.index');
Route::get('engines', [EngineController::class, 'index'])->name('engines.index');
Route::get('cars/interesting', [CarController::class, 'interesting'])->name('cars.interesting');
Route::get('cars/oldest', [CarController::class, 'oldest'])->name('cars.oldest');
Route::get('cars/powerful', [CarController::class, 'mostPowerfullHp'])->name('cars.powerful');
Route::get('cars/best-engine', [CarController::class, 'bestEngineCar'])->name('cars.best-engine');
Route::get('cars/findNewestCar', [CarController::class, 'findNewestCar'])->name('cars.NewestCar');
Route::get('cars/findAverageAge', [CarController::class, 'findAverageAge'])->name('cars.AverageAge');
Route::get('cars/findMostPopularModel', [CarController::class, 'findMostPopularModel'])->name('cars.MostPopularModel');
Route::get('cars/findMostPopularSeats', [CarController::class, 'findMostPopularSeats'])->name('cars.MostPopularSeats');
Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('cars/store', [CarController::class, 'store'])->name('cars.store');
Route::get('cars/{car}', [CarController::class, 'show'])->name('cars.show');
Route::get('cars/{car}/destroy', [CarController::class, 'destroy'])->name('cars.destroy');
