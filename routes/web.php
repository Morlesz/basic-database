<?php

use Illuminate\Support\Facades\Route;
//use App\Models\User;
use Illuminate\Support\Facades\DB; //for query builder
use App\Http\Controllers\DepartmentController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //มาจาก Model User (ส่งข้อมูลแบบ Eloquent)
    // $users = User::all();

    //ส่งข้อมูลแบบ Query builder
    $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');

Route::get('/department/all',[DepartmentController::class,'index'])->name('department');
Route::post('/department/add',[DepartmentController::class,'store'])->name('addDepartment');
