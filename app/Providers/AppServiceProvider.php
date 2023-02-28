<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Hak_Akses_Permission;
use App\Models\Approval_1_Pengajuan_Dana;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        Schema::defaultStringLength(191);
        Gate::define('superadmin', function(User $user){
            return $user->role === 'superadmin';
        });

        // Gate::define('approval_1_pengajuan_dana', function(User $user){
        //     $cek = false;
        //     // $arr_hak_akses = Hak_Akses_Permission::where('id_user',137)->get();
        //     $arr_hak_akses = Hak_Akses_Permission::where('id_user',$user->id)->get();
        //     if(count($arr_hak_akses) > 0){
        //         for( $i=0 ; $i < count($arr_hak_akses) ; $i++){
        //             if($arr_hak_akses[$i]->id_hak_akses == 2){
        //                 $cek = true;
        //                 break;
        //             }
        //         }
        //     }
        //     return $cek;
        // });
        Gate::define('approval_1_pengajuan_dana', function(User $user){
            $cek = false;
            $cek_approval_1 = Approval_1_Pengajuan_Dana::where('id_approval',$user->id)->get();
            // $arr_hak_akses = Hak_Akses_Permission::where('id_user',137)->get();
            if(count($cek_approval_1) > 0){
                $cek = true;
            }
            return $cek;
        });


        Gate::define('approval_2_pengajuan_dana', function(User $user){
            $cek = false;
            // $arr_hak_akses = Hak_Akses_Permission::where('id_user',137)->get();
            $arr_hak_akses = Hak_Akses_Permission::where('id_user',$user->id)->get();
            if(count($arr_hak_akses) > 0){
                for( $i=0 ; $i < count($arr_hak_akses) ; $i++){
                    if($arr_hak_akses[$i]->id_hak_akses == 3){
                        $cek = true;
                        break;
                    }
                }
            }
            return $cek;
        });
        Gate::define('proses_pengajuan_dana', function(User $user){
            $cek = false;
            // $arr_hak_akses = Hak_Akses_Permission::where('id_user',137)->get();
            $arr_hak_akses = Hak_Akses_Permission::where('id_user',$user->id)->get();
            if(count($arr_hak_akses) > 0){
                for( $i=0 ; $i < count($arr_hak_akses) ; $i++){
                    if($arr_hak_akses[$i]->id_hak_akses == 4){
                        $cek = true;
                        break;
                    }
                }
            }
            return $cek;
        });
        Gate::define('validasi_pengajuan_dana', function(User $user){
            $cek = false;
            // $arr_hak_akses = Hak_Akses_Permission::where('id_user',137)->get();
            $arr_hak_akses = Hak_Akses_Permission::where('id_user',$user->id)->get();
            if(count($arr_hak_akses) > 0){
                for( $i=0 ; $i < count($arr_hak_akses) ; $i++){
                    if($arr_hak_akses[$i]->id_hak_akses == 5){
                        $cek = true;
                        break;
                    }
                }
            }
            return $cek;
        });

    }

}