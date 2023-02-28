<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Approval_1_Pengajuan_Dana;
use App\Models\Hak_Akses_Permission;


class Approval_Divisi_Pengajuan_Dana
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
        $cek_approval_1 = Approval_1_Pengajuan_Dana::where('id_approval',auth()->user()->id)->get();


        if(!auth()->check() || auth()->user()->role !== 'superadmin' && count($cek_approval_1) == 0 ){
            // return view('dashboard.index');
            // return new response(view('dashboard.index'));
            return response()->view('layouts.forbidden');
            // abort(403);
        }
        // if(!auth()->check()){
        //     // return view('dashboard.index');
        //     // return new response(view('dashboard.index'));
        //     // return response()->view('layouts.forbidden');
        //     return response(count($cek_approval_1));// abort(403);
        // }else{
        //     if(auth()->user()->role !== 'superadmin'){
        //         if(count($cek_approval_1) == 0){
        //             return response(count($cek_approval_1));
        //             // return response()->view('layouts.forbidden');
        //         }
        //     }
        // }
        return $next($request);
    }
}