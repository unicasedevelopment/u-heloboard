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

class Approval_Pengajuan_Dana_Controller extends Controller
{
    // public function __construct()
    // {
    //     if(!auth()->check() || auth()->user()->role !== 'superadmin'){
    //         return view('dashboard.index');
    //         // return new response(view('dashboard.index'));
    //         // return response()->view('dashboard.index');
    //         // abort(403);
    //     }
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return view('approval_pengajuan_dana.index',compact('data_pengajuan_dana','data_jenis_surat','data_divisi','data_kategori_dana','data_kategori','metode_pembayaran','jenis_pajak','no_surat'));
    }

    public function getData($status)
    {

        if($status >0){
            if($status == 34){
                $data_pengajuan_dana = Pengajuan_Dana::where('status_pengajuan','=', 3)->orWhere('status_pengajuan','=',4)->with('levels')->with('kategories')->get();
                // $data_pengajuan_dana = Pengajuan_Dana::where('status_pengajuan','=', 3)->orWhere('status_pengajuan','=',4)->with('levels')->get();
            }else{
                $data_pengajuan_dana = Pengajuan_Dana::where('status_pengajuan',$status)->with('levels')->with('kategories')->get();
                // $data_pengajuan_dana = Pengajuan_Dana::where('status_pengajuan',$status)->with('levels')->get();
            }
        }else{
            // $data_pengajuan_dana = Pengajuan_Dana::get();
            $data_pengajuan_dana = Pengajuan_Dana::with('levels')->with('kategories')->get();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_pengajuan_dana = Pengajuan_Dana::findOrFail($id);
        // $nama_lampiran = $request->post('nama_lampiran');
        // $file_lampiran = $request->file('file_lampiran');

        // $validate_data['no_surat'] = $request->post('no_surat');
        // $validate_data['tgl_pengajuan'] = $request->post('tgl_pengajuan');
        // $validate_data['id_creator'] = '1';
        // $validate_data['id_divisi'] = '1';
        // $validate_data['id_kategori'] = $request->post('id_kategori');
        // $validate_data['status_approval_1'] = 'no';
        // $validate_data['status_approval_2'] = 'no';
        // $validate_data['keperluan'] = $request->post('keperluan');
        // $validate_data['status_pengajuan'] = 'submited';
        // $validate_data['status_pemrosesan'] = 'unpaid';

        // $cek = Pengajuan_Dana::where('no_surat',$validate_data['no_surat'])->count();
        // if($cek>=1){
        //     return response()->json([
        //         'status' => false,
        //         'hasil' => $cek
        //     ]);
        // }else{

        //     $pengajuan_dana = Pengajuan_Dana::create($validate_data);

        //     $informasi_pembayaran = (array) json_decode($request->post('data_pembayaran'),true);

        //     $informasi_pembayaran["id_pengajuan"] = $pengajuan_dana->id;

        //     $pembayaran = Informasi_Pembayaran::create($informasi_pembayaran);

        //     if($validate_data['id_kategori'] <= 2 ){

        //         $dokumen_pengajuan = [
        //             "id_pengajuan" => $pengajuan_dana->id,
        //             "npwp" => ($request->post('npwp') != null ? $request->post('npwp') : null ),
        //             "nik" => ($request->post('nik') != null ? $request->post('nik') : null ),
        //             "file_invoice" => ($request->file('file_invoice') != null ? $request->file('file_invoice')->store('post-data') : null ),
        //             "file_npwp" => ($request->file('file_npwp') != null ? $request->file('file_npwp')->store('post-data') : null ),
        //             "file_ktp" => ($request->file('file_ktp') != null ? $request->file('file_ktp')->store('post-data') : null )
        //         ];

        //         $dokumen_pengajuan = Dokumen_Pengajuan::create($dokumen_pengajuan);

        //         $informasi_perpajakan = (array) json_decode($request->post('data_pajak'),true);

        //         for($i = 0 ; $i < count($informasi_perpajakan) ; $i++){
        //             if($informasi_perpajakan[$i]["id_jenis_pajak"] == 1){
        //                 $informasi_perpajakan[$i]["status_pajak"] = null;
        //             }
        //             $informasi_perpajakan[$i]["id_pengajuan"] = $pengajuan_dana->id;
        //             Informasi_Perpajakan::create($informasi_perpajakan[$i]);
        //         }

        //     }
        //     if($nama_lampiran != null){

        //         for($i = 0; $i < count($nama_lampiran) ; $i++){
        //             $data_lampiran['id_pengajuan'] = $pengajuan_dana->id;
        //             $data_lampiran['nama_lampiran'] = $nama_lampiran[$i];
        //             $data_lampiran['file_lampiran'] = $file_lampiran[$i]->store('post-data');
        //             Informasi_Lampiran::create($data_lampiran);
        //         }
        //     }

        return response()->json([
            'result' => 'Sukses'
        ]);



    }

    public function approval_1($id){
        $data_pengajuan_dana = Pengajuan_dana::findOrFail($id);

        $validate_data['status_approval_1'] = 'yes';
        $validate_data['status_pengajuan'] = 2;

        $data_pengajuan_dana->update($validate_data);

        return response()->json([
            "status" => true,
            "data" => $data_pengajuan_dana
        ]);
    }
    public function approval_2($id){
        $data_pengajuan_dana = Pengajuan_dana::findOrFail($id);

        $validate_data['status_approval_2'] = 'yes';
        $validate_data['status_pengajuan'] = 3;

        $data_pengajuan_dana->update($validate_data);

        return response()->json([
            "status" => true,
            "data" => $data_pengajuan_dana
        ]);
    }
    public function paid($id){
        $data_pengajuan_dana = Pengajuan_dana::findOrFail($id);

        $validate_data['status_pemrosesan'] = 'paid';
        $validate_data['status_pengajuan'] = 4;

        $data_pengajuan_dana->update($validate_data);

        return response()->json([
            "status" => true,
            "data" => $data_pengajuan_dana
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}