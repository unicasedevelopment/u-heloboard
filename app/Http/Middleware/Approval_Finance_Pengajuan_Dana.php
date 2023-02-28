<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Approval_1_Pengajuan_Dana;
use App\Models\Hak_Akses_Permission;

class Approval_Finance_Pengajuan_Dana
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $cek = false;
            // $arr_hak_akses = Hak_Akses_Permission::where('id_user',137)->get();
        $arr_hak_akses = Hak_Akses_Permission::where('id_user',auth()->user()->id)->get();
        if(count($arr_hak_akses) > 0){
            for( $i=0 ; $i < count($arr_hak_akses) ; $i++){
                if($arr_hak_akses[$i]->id_hak_akses == 3){
                    $cek = true;
                    break;
                }
            }
        }

        // $cek_approval_1 = Approval_1_Pengajuan_Dana::where('id_approval',auth()->user()->id)->get();


        if(!auth()->check() || auth()->user()->role !== 'superadmin' && $cek == false ){
            return response()->view('layouts.forbidden');
        }
        return $next($request);
    }
}