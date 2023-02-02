<?php

use App\Models\Jabatan;
use App\Models\Employee;
use App\Models\Golongan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\ReligionController;

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
    $jumlahpegawai = Employee::count();
    // $pegawaipria = Employee::where('jeniskelamin', 'pria')->count();
    // $pegawaiwanita = Employee::where('jeniskelamin', 'wanita')->count();
    $jumlahjabatan = Jabatan::count();
    $jumlahgolongan = Golongan::count();
    return view('welcome', compact('jumlahpegawai', 'jumlahjabatan', 'jumlahgolongan'));
})->middleware('auth');

Route::group(['middleware' => ['auth', 'hakakses:admin']], function () {
    Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
    Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
});

// Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
//     Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampildata/{id}', [EmployeeController::class, 'tampildata'])->name('tampildata');

Route::post('/ubahdata/{id}', [EmployeeController::class, 'ubahdata'])->name('ubahdata');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
//Export pdf



Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/registersimpan', [LoginController::class, 'registersimpan'])->name('registersimpan');

Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/datareligion', [ReligionController::class, 'index']) ->name('datareligion');
Route::get('/tambahagama', [ReligionController::class, 'create'])->name('tambahagama');
Route::post('/insertdataagama', [ReligionController::class, 'store'])->name('insertdataagama');
Route::get('/deleteagama/{id}', [ReligionController::class, 'deleteagama'])->name('deleteagama');
Route::get('/tampileditagama/{id}', [ReligionController::class, 'tampileditagama'])->name('tampileditagama');
Route::post('/ubahdataagama/{id}', [ReligionController::class, 'ubahdataagama'])->name('ubahdataagama');

Route::get('/datajabatan', [JabatanController::class, 'index']) ->name('datajabatan');
Route::get('/tambahjabatan', [JabatanController::class, 'create'])->name('tambahjabatan');
Route::post('/insertdatajabat', [JabatanController::class, 'store'])->name('insertdatajabat');
Route::get('/deletejabatan/{id}', [JabatanController::class, 'deletejabatan'])->name('deletejabatan');
Route::get('/tampileditjabatan/{id}', [JabatanController::class, 'tampileditjabatan'])->name('tampileditjabatan');
Route::post('/ubahdatajabatan/{id}', [JabatanController::class, 'ubahdatajabatan'])->name('ubahdatajabatan');

Route::get('/datagolongan', [GolonganController::class, 'index']) ->name('datagolongan');
Route::get('/tambahgolongan', [GolonganController::class, 'create'])->name('tambahgolongan');
Route::post('/insertdatagolongan', [GolonganController::class, 'store'])->name('insertdatagolongan');
Route::get('/deletegolongan/{id}', [GolonganController::class, 'deletegolongan'])->name('deletegolongan');
Route::get('/tampileditgolongan/{id}', [GolonganController::class, 'tampileditgolongan'])->name('tampileditgolongan');
Route::post('/ubahdatagolongan/{id}', [GolonganController::class, 'ubahdatagolongan'])->name('ubahdatagolongan');
