<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Pengajuan_dana;
use App\Models\Jenis_Surat;
use App\Models\Surat_Keluar;
use App\Models\Divisi;
use App\Models\Kategori_Dana;
use App\Models\Metode_Pembayaran;
use App\Models\Jenis_Pajak;
use App\Models\Informasi_Pembayaran;
use App\Models\Informasi_Perpajakan;
use App\Models\Informasi_Lampiran;
use App\Models\Dokumen_Pengajuan;
use App\Models\Level_Pengajuan_Dana;

class Validasi_Pengajuan_Dana_Controller extends Controller
{

    public function index(){
        //
        $cek = Pengajuan_Dana::count();
        $no_surat ='';
        if($cek<1){
            $no_surat = 'UNI/PPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
        }
        else{
            $nomor = Pengajuan_Dana::all()->last()->no_surat;
            $arr_no_surat = explode ("/", $nomor);
            $tahun = $arr_no_surat[2];
            $bulan = $arr_no_surat[3];
            if($tahun == date('Y')){
                if($bulan == date('m')){
                    $urut = (int)substr($nomor,-3);
                    $no_surat = 'UNI/PPD/'.date("Y/m/d").'/'.str_pad($urut+1,3,'0',STR_PAD_LEFT);
                }else{
                    $no_surat = 'UNI/PPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
                }
            }else{
                $no_surat = 'UNI/PPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
            }
        }




        $jenis_pajak = Jenis_Pajak::get();
        $data_kategori = Kategori_Dana::get();
        $data_kategori_dana = Kategori_Dana::pluck('nama_kategori','id');
        $data_jenis_surat = Jenis_Surat::pluck('nama_jenis','id');
        $data_divisi = Divisi::pluck('nama_divisi','id');
        $metode_pembayaran = Metode_Pembayaran::pluck('nama_metode','id');

        $data_pengajuan_dana = Pengajuan_Dana::get();
        // return response()->json([
        //    "data" => $data_pengajuan_dana
        // ]);

        // return view('data_pengajuan_dana.proses_pengajuan_dana.index');
        return view('data_pengajuan_dana.validasi_pengajuan_dana.index',compact('data_pengajuan_dana','data_jenis_surat','data_divisi','data_kategori_dana','data_kategori','metode_pembayaran','jenis_pajak','no_surat'));
    }

    public function getData($status){

        if($status != 'validasi'){
            if($status == 'valid'){
                $data_pengajuan_dana = Pengajuan_Dana::where('status_pengajuan','<',6)->where('status_pengajuan','>',3)->where('status_validasi','yes')->with('creator')->with('levels')->with('kategories')->get();
            }else{
                $data_pengajuan_dana = Pengajuan_Dana::where('status_pengajuan','<',6)->where('status_pengajuan','>',3)->where('status_validasi','no')->with('creator')->with('levels')->with('kategories')->get();
            }
        }else{
            $data_pengajuan_dana = Pengajuan_Dana::where('status_pengajuan','<',6)->where('status_pengajuan','>',3)->with('creator')->with('levels')->with('kategories')->get();
        }

        $datatable = Datatables::of($data_pengajuan_dana)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn =  '<a href="#" type="button" class="btn btn-sm btn-light btn-sm btn-download text-secondary"><i class="fa fa-download "></i></a>';
                        $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk" class="btn btn-sm btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->setRowId(function ($data_pengajuan_dana) {
                        return $data_pengajuan_dana->id;
                    })
                    ->make(true);

        $datatable= $datatable->original['data'];
        return response()->json([
            "data" => $datatable
        ]);
        // return $data_pengajuan_dana[1]->levels->level;
    }

    public function edit($id){
        //
        $data_pengajuan_dana = Pengajuan_Dana::findOrFail($id);
        $informasi_pembayaran = Informasi_Pembayaran::where('id_pengajuan',$data_pengajuan_dana->id)->get();
        $dokumen_pengajuan = Dokumen_Pengajuan::where('id_pengajuan',$data_pengajuan_dana->id)->get();
        $informasi_perpajakan = Informasi_Perpajakan::where('id_pengajuan',$data_pengajuan_dana->id)->get();
        $informasi_lampiran = Informasi_Lampiran::where('id_pengajuan',$data_pengajuan_dana->id)->get();
        return response()->json([
            "data" => $data_pengajuan_dana,
            "informasi_pembayaran" => count($informasi_pembayaran) == 0 ? null : $informasi_pembayaran[0],
            "dokumen_pengajuan" => count($dokumen_pengajuan) == 0 ? null : $dokumen_pengajuan[0],
            "informasi_perpajakan" => count($informasi_perpajakan) == 0 ? null : $informasi_perpajakan,
            "informasi_lampiran" => count($informasi_lampiran) == 0 ? null : $informasi_lampiran

        ]);
    }

    public function update(Request $request, $id){
        // $data_pengajuan_dana = Pengajuan_Dana::findOrFail($id);
        $data_pengajuan_dana = Dokumen_Pengajuan::where('id_pengajuan',$id);
        $cek = $request->post('file_fp_internal');
        if($cek !== "null"){
            $validated_data = $request->validate([
                'file_fp_internal' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
            ]);
            $validated_data['file_fp_internal'] = $request->file('file_fp_internal')->store('post-data');
            $status = $data_pengajuan_dana->update($validated_data);
        }

        return response()->json([
            'status' => true,
            'cek' => $cek
        ]);

    }

    public function validasi($id){
        $data_pengajuan_dana = Pengajuan_dana::findOrFail($id);

        $validate_data['status_validasi'] = 'yes';
        $validate_data['status_pengajuan'] = 5;


        $data_pengajuan_dana->update($validate_data);

        return response()->json([
            "status" => true,
            "data" => $data_pengajuan_dana
        ]);
    }

}