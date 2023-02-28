<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Surat_Masuk_Controller;
use App\Http\Controllers\Surat_Keluar_Controller;
use App\Http\Controllers\Tamu_Controller;
use App\Http\Controllers\Form_SPK_Controller;
use App\Http\Controllers\Roles_Controller;
use App\Http\Controllers\Permissions_Controller;
use App\Http\Controllers\Login_Controller;
use App\Http\Controllers\Logout_Controller;
use App\Http\Controllers\Buat_Surat_Controller;
use App\Http\Controllers\SPK_Controller;
use App\Http\Controllers\Pengajuan_Dana_Controller;
use App\Http\Controllers\Data_Perjalanan_Dinas_Controller;
use App\Http\Controllers\Perjalanan_Dinas_Controller;
use App\Http\Controllers\Data_Pengajuan_Dana_Controller;
use App\Http\Controllers\Approval_Pengajuan_Dana_Controller;

use App\Http\Controllers\Daftar_Pengajuan_Dana_Controller;
use App\Http\Controllers\Approval_1_Pengajuan_Dana_Controller;
use App\Http\Controllers\Approval_2_Pengajuan_Dana_Controller;
use App\Http\Controllers\Validasi_Pengajuan_Dana_Controller;
use App\Http\Controllers\Proses_Pengajuan_Dana_Controller;
use App\Http\Controllers\Users_Controller;

use App\Models\Surat_Masuk;
use App\Models\Surat_Keluar;
use App\Models\Tamu;
use App\Models\Users;

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

Route::group(['namespace' => 'App\Http\Controllers'],function(){


    Route::group(['middleware' => ['guest']], function(){
        // Route::resource('form_spk', Form_SPK_Controller::class);

        Route::get('/login', [Login_Controller::class,'show'])->name('login');
        Route::post('/login', [Login_Controller::class,'authenticate']);
        // Routing Surat masuk
        Route::get('/', function () {
            return redirect()->intended('login');
        });



        // Route::resource('surat_keluar', Surat_Keluar_Controller::class);





    });

    Route::group(['middleware' => ['auth','approval_divisi_pengajuan_dana'] ], function(){


        // Route::resource('tamu', Tamu_Controller::class);
        // Route Approval 1 pengajuan Dana
        Route::get('approval_1_pengajuan_dana', [Approval_1_Pengajuan_Dana_Controller::class, 'index'])->name('approval_1_pengajuan_dana.index');
        Route::get('get_approval_1_pengajuan_dana/{status}', [Approval_1_Pengajuan_Dana_Controller::class, 'getData'])->name('approval_1_pengajuan_dana.getData');
        Route::get('approval_1_pengajuan_dana/{id}/edit', [Approval_1_Pengajuan_Dana_Controller::class, 'edit'])->name('approval_1_pengajuan_dana.edit');
        Route::post('approval_1_pengajuan_dana/{id}', [Approval_1_Pengajuan_Dana_Controller::class, 'update'])->name('approval_1_pengajuan_dana.update');
        Route::post('approval_1_pengajuan_dana/{id}/approval_1', [Approval_1_Pengajuan_Dana_Controller::class, 'approval_1'])->name('approval_1_pengajuan_dana.approval_1');
        Route::post('approval_1_pengajuan_dana/{id}/reject_1', [Approval_1_Pengajuan_Dana_Controller::class, 'reject_1'])->name('reject_1_pengajuan_dana.reject_1');
    });

    Route::group(['middleware' => ['auth','approval_finance_pengajuan_dana'] ], function(){
     // Route Approval 2 pengajuan Dana
        Route::get('approval_2_pengajuan_dana', [Approval_2_Pengajuan_Dana_Controller::class, 'index'])->name('approval_2_pengajuan_dana.index');
        Route::get('get_approval_2_pengajuan_dana/{status}', [Approval_2_Pengajuan_Dana_Controller::class, 'getData'])->name('approval_2_pengajuan_dana.getData');
        Route::get('approval_2_pengajuan_dana/{id}/edit', [Approval_2_Pengajuan_Dana_Controller::class, 'edit'])->name('approval_2_pengajuan_dana.edit');
        Route::get('approval_2_pengajuan_dana/{id}/cetak', [Approval_2_Pengajuan_Dana_Controller::class, 'cetak'])->name('approval_2_pengajuan_dana.cetak');
        Route::post('approval_2_pengajuan_dana/{id}', [Approval_2_Pengajuan_Dana_Controller::class, 'update'])->name('approval_2_pengajuan_dana.update');
        Route::post('approval_2_pengajuan_dana/{id}/approval_2', [Approval_2_Pengajuan_Dana_Controller::class, 'approval_2'])->name('approval_2_pengajuan_dana.approval_2');
        Route::post('approval_2_pengajuan_dana/{id}/reject_2', [Approval_2_Pengajuan_Dana_Controller::class, 'reject_2'])->name('reject_2_pengajuan_dana.approval_2');
     });

     Route::group(['middleware' => ['auth','proses_pengajuan_dana'] ], function(){
     // Route Paid pengajuan Dana
        Route::get('proses_pengajuan_dana', [Proses_Pengajuan_Dana_Controller::class, 'index'])->name('proses_pengajuan_dana.index');
        Route::get('get_proses_pengajuan_dana/{status}', [Proses_Pengajuan_Dana_Controller::class, 'getData'])->name('proses_pengajuan_dana.getData');
        Route::get('proses_pengajuan_dana/{id}/edit', [Proses_Pengajuan_Dana_Controller::class, 'edit'])->name('proses_pengajuan_dana.edit');
        Route::post('proses_pengajuan_dana/{id}', [Proses_Pengajuan_Dana_Controller::class, 'update'])->name('proses_pengajuan_dana.update');
        Route::post('proses_pengajuan_dana/{id}/paid', [Proses_Pengajuan_Dana_Controller::class, 'paid'])->name('proses_pengajuan_dana.paid');
     });

     Route::group(['middleware' => ['auth','validasi_pengajuan_dana'] ], function(){
     // Route Validasi pengajuan Dana
        Route::get('validasi_pengajuan_dana', [Validasi_Pengajuan_Dana_Controller::class, 'index'])->name('validasi_pengajuan_dana.index');
        Route::get('get_validasi_pengajuan_dana/{status}', [Validasi_Pengajuan_Dana_Controller::class, 'getData'])->name('validasi_pengajuan_dana.getData');
        Route::get('validasi_pengajuan_dana/{id}/edit', [Validasi_Pengajuan_Dana_Controller::class, 'edit'])->name('validasi_pengajuan_dana.edit');
        Route::post('validasi_pengajuan_dana/{id}', [Validasi_Pengajuan_Dana_Controller::class, 'update'])->name('validasi_pengajuan_dana.update');
        Route::post('validasi_pengajuan_dana/{id}/validasi', [Validasi_Pengajuan_Dana_Controller::class, 'validasi'])->name('validasi_pengajuan_dana.validasi');
     });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', [Logout_Controller::class,'perform']);
        // Route::resource('dashboard',Dashboard_Controller::class);


        Route::get('form_tamu', [Tamu_Controller::class, 'form_buku_tamu'])->name('form_tamu.index');

        Route::get('form_perjalanan_dinas/create', [Perjalanan_Dinas_Controller::class, 'create'])->name('form_perjalanan_dinas.create');
        Route::post('perjalanan_dinas', [Perjalanan_Dinas_Controller::class, 'store'])->name('perjalanan_dinas.store');
        Route::get('perjalanan_dinas', [Perjalanan_Dinas_Controller::class, 'index'])->name('perjalanan_dinas.index');
        Route::post('save_data_perjalanan_dinas', [Perjalanan_Dinas_Controller::class, 'save_file_perjalanan_dinas'])->name('perjalanan_dinas.save_file_perjalanan_dinas');
        // Route::get('perjalanan_dinas', [Perjalanan_Dinas_Controller::class, 'index'])->name('perjalanan_dinas.index');
        // Route::get('form_perjalanan_dinas/create', [Perjalanan_Dinas_Controller::class, 'create'])->name('form_perjalanan_dinas.create');
        // Route::post('perjalanan_dinas', [Perjalanan_Dinas_Controller::class, 'store'])->name('perjalanan_dinas.store');

        Route::get('pengajuan_dana', [Pengajuan_Dana_Controller::class, 'index'])->name('pengajuan_dana.index');
        Route::get('pengajuan_dana/create', [Pengajuan_Dana_Controller::class, 'create'])->name('pengajuan_dana.create');
        Route::post('pengajuan_dana', [Pengajuan_Dana_Controller::class, 'store'])->name('pengajuan_dana.store');

        Route::get('daftar_pengajuan_dana', [Daftar_Pengajuan_Dana_Controller::class, 'index'])->name('daftar_pengajuan_dana.index');
        Route::get('get_daftar_pengajuan_dana/{status}', [Daftar_Pengajuan_Dana_Controller::class, 'getData'])->name('daftar_pengajuan_dana.getData');
        Route::post('daftar_pengajuan_dana/{id}/daftar', [Daftar_Pengajuan_Dana_Controller::class, 'daftar'])->name('daftar_pengajuan_dana.daftar');
        Route::post('daftar_pengajuan_dana/{id}/reject_1', [Daftar_Pengajuan_Dana_Controller::class, 'reject_1'])->name('reject_1_pengajuan_dana.reject_1');

        Route::resource('fk_ga', Form_SPK_Controller::class);
        Route::post('save_fpk', [Form_SPK_Controller::class, 'save_fpk'])->name('spk.save_fpk');
    });

    Route::group(['middleware' => ['auth','superadmin']], function() {
        // Route::get('/logout', [Logout_Controller::class,'perform']);
        Route::resource('dashboard',Dashboard_Controller::class);

        Route::get('karyawan', [Users_Controller::class,'index'])->name('karyawan.index');
        Route::post('karyawan', [Users_Controller::class,'store'])->name('karyawan.store');
        Route::get('karyawan/create', [Users_Controller::class, 'create'])->name('karyawan.create');
        Route::get('karyawan/{id}', [Users_Controller::class, 'show'])->name('karyawan.show');
        Route::delete('karyawan/{id}', [Users_Controller::class, 'destroy'])->name('karyawan.destroy');

        Route::get('buat_surat', [Buat_Surat_Controller::class,'index'])->name('buat_surat.index');
        Route::post('buat_surat', [Buat_Surat_Controller::class,'store'])->name('buat_surat.store');
        Route::get('buat_surat/create', [Buat_Surat_Controller::class, 'create'])->name('buat_surat.create');
        Route::get('buat_surat/{id}', [Buat_Surat_Controller::class, 'show'])->name('buat_surat.show');

        Route::get('surat_masuk', [Surat_Masuk_Controller::class, 'index'])->name('surat_masuk.index');
        Route::get('surat_masuk/create', [Surat_Masuk_Controller::class, 'create'])->name('surat_masuk.create');
        Route::post('surat_masuk', [Surat_Masuk_Controller::class, 'store'])->name('surat_masuk.store');
        Route::get('surat_masuk/{id}', [Surat_Masuk_Controller::class, 'show'])->name('surat_masuk.show');
        Route::get('surat_masuk/{id}/edit', [Surat_Masuk_Controller::class, 'edit'])->name('surat_masuk.edit');
        Route::put('surat_masuk/{id}', [Surat_Masuk_Controller::class, 'update'])->name('surat_masuk.update');
        Route::delete('surat_masuk/{id}', [Surat_Masuk_Controller::class, 'destroy'])->name('surat_masuk.destroy');

        Route::post('surat_keluar/create/{id}', [Surat_Keluar_Controller::class,'create']);
        Route::get('surat_keluar', [Surat_Keluar_Controller::class, 'index'])->name('surat_keluar.index');
        Route::get('surat_keluar/create', [Surat_Keluar_Controller::class, 'create'])->name('surat_keluar.create');
        Route::post('surat_keluar', [Surat_Keluar_Controller::class, 'store'])->name('surat_keluar.store');
        Route::get('surat_keluar/{id}', [Surat_Keluar_Controller::class, 'show'])->name('surat_keluar.show');
        Route::get('surat_keluar/{id}/edit', [Surat_Keluar_Controller::class, 'edit'])->name('surat_keluar.edit');
        Route::put('surat_keluar/{id}', [Surat_Keluar_Controller::class, 'update'])->name('surat_keluar.update');
        Route::delete('surat_keluar/{id}', [Surat_Keluar_Controller::class, 'destroy'])->name('surat_keluar.destroy');

        Route::get('tamu', [Tamu_Controller::class, 'index'])->name('tamu.index');
        Route::get('tamu/create', [Tamu_Controller::class, 'create'])->name('tamu.create');
        Route::post('tamu', [Tamu_Controller::class, 'store'])->name('tamu.store');
        Route::post('form_tamu', [Tamu_Controller::class, 'save_tamu'])->name('form_tamu.save');
        Route::get('tamu/{id}', [Tamu_Controller::class, 'show'])->name('tamu.show');
        Route::get('tamu/{id}/edit', [Tamu_Controller::class, 'edit'])->name('tamu.edit');
        Route::put('tamu/{id}', [Tamu_Controller::class, 'update'])->name('tamu.update');
        Route::delete('tamu/{id}', [Tamu_Controller::class, 'destroy'])->name('tamu.destroy');

        Route::get('spk', [SPK_Controller::class, 'index'])->name('spk.index');
        Route::get('spk/create', [SPK_Controller::class, 'create'])->name('spk.create');
        Route::post('spk', [SPK_Controller::class, 'store'])->name('spk.store');

        Route::get('spk/{id}', [SPK_Controller::class, 'show'])->name('spk.show');
        Route::get('spk/{id}/edit', [SPK_Controller::class, 'edit'])->name('spk.edit');
        Route::put('spk/{id}', [SPK_Controller::class, 'update'])->name('spk.update');
        Route::delete('spk/{id}', [SPK_Controller::class, 'destroy'])->name('spk.destroy');


        // Route::get('pengajuan_dana', [Pengajuan_Dana_Controller::class, 'index'])->name('pengajuan_dana.index');
        // Route::get('pengajuan_dana/create', [Pengajuan_Dana_Controller::class, 'create'])->name('pengajuan_dana.create');
        // Route::post('pengajuan_dana', [Pengajuan_Dana_Controller::class, 'store'])->name('pengajuan_dana.store');

        Route::post('data_pengajuan_dana/{id}', [Data_Pengajuan_Dana_Controller::class, 'update'])->name('data_pengajuan_dana.update');
        Route::get('data_pengajuan_dana', [Data_Pengajuan_Dana_Controller::class, 'index'])->name('data_pengajuan_dana.index');
        Route::get('get_data_pengajuan_dana/{status}', [Data_Pengajuan_Dana_Controller::class, 'getData'])->name('data_pengajuan_dana.getData');
        Route::get('data_pengajuan_dana/{id}/edit', [Data_Pengajuan_Dana_Controller::class, 'edit'])->name('data_pengajuan_dana.edit');

        Route::get('approval_pengajuan_dana', [Approval_Pengajuan_Dana_Controller::class, 'index'])->name('approval_pengajuan_dana.index');
        Route::get('get_approval_pengajuan_dana/{status}', [Approval_Pengajuan_Dana_Controller::class, 'getData'])->name('approval_pengajuan_dana.getData');
        Route::get('approval_pengajuan_dana/{id}/edit', [Approval_Pengajuan_Dana_Controller::class, 'edit'])->name('approval_pengajuan_dana.edit');


        // Route Approval 2 Pengajuan dana
        Route::post('approval_pengajuan_dana/{id}/approval_1', [Approval_Pengajuan_Dana_Controller::class, 'approval_1'])->name('approval_pengajuan_dana.approval_1');
        Route::post('approval_pengajuan_dana/{id}/approval_2', [Approval_Pengajuan_Dana_Controller::class, 'approval_2'])->name('approval_pengajuan_dana.approval_2');
        Route::post('approval_pengajuan_dana/{id}/paid', [Approval_Pengajuan_Dana_Controller::class, 'paid'])->name('approval_pengajuan_dana.paid');
        Route::post('approval_pengajuan_dana/{id}/validasi', [Approval_Pengajuan_Dana_Controller::class, 'validasi'])->name('approval_pengajuan_dana.validasi');



        Route::get('data_perjalanan_dinas', [Data_Perjalanan_Dinas_Controller::class, 'index'])->name('data_perjalanan_dinas.index');
        Route::get('data_perjalanan_dinas/create', [Data_Perjalanan_Dinas_Controller::class, 'create'])->name('data_perjalanan_dinas.create');
        Route::post('data_perjalanan_dinas', [Data_Perjalanan_Dinas_Controller::class, 'store'])->name('data_perjalanan_dinas.store');

        Route::get('data_perjalanan_dinas/{id}', [Data_Perjalanan_Dinas_Controller::class, 'show'])->name('data_perjalanan_dinas.show');
        Route::get('data_perjalanan_dinas/{id}/edit', [Data_Perjalanan_Dinas_Controller::class, 'edit'])->name('data_perjalanan_dinas.edit');
        Route::put('data_perjalanan_dinas/{id}', [Data_Perjalanan_Dinas_Controller::class, 'update'])->name('data_perjalanan_dinas.update');
        Route::delete('data_perjalanan_dinas/{id}', [Data_Perjalanan_Dinas_Controller::class, 'destroy'])->name('data_perjalanan_dinas.destroy');

        // Route::get('perjalanan_dinas', [Perjalanan_Dinas_Controller::class, 'index'])->name('perjalanan_dinas.index');
        // Route::get('form_perjalanan_dinas/create', [Perjalanan_Dinas_Controller::class, 'create'])->name('form_perjalanan_dinas.create');
        // Route::post('perjalanan_dinas', [Perjalanan_Dinas_Controller::class, 'store'])->name('perjalanan_dinas.store');

        // Route::post('save_perjalanan_dinas', [Data_Perjalanan_Dinas_Controller::class, 'save_fpk'])->name('data_perjalanan_dinas.save_fpk');
        // Route::get('perjalanan_dinas/{id}', [Data_Perjalanan_Dinas_Controller::class, 'show'])->name('data_perjalanan_dinas.show');
        // Route::get('perjalanan_dinas/{id}/edit', [Data_Perjalanan_Dinas_Controller::class, 'edit'])->name('data_perjalanan_dinas.edit');
        // Route::put('perjalanan_dinas/{id}', [Data_Perjalanan_Dinas_Controller::class, 'update'])->name('data_perjalanan_dinas.update');
        // Route::delete('perjalanan_dinas/{id}', [Data_Perjalanan_Dinas_Controller::class, 'destroy'])->name('data_perjalanan_dinas.destroy');

        // Buat_Surat_Controller

        Route::get('/test', function(){
            return view('data_pengajuan_dana.test');
        });

        Route::resource('roles',RolesController::class);
        Route::resource('permissions',PermissionsController::class);

     });

});