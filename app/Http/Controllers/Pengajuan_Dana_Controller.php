<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_Surat;
use App\Models\Surat_Keluar;
use App\Models\Divisi;
use App\Models\Kategori_Dana;
use App\Models\Metode_Pembayaran;
use App\Models\Jenis_Pajak;
use App\Models\Pengajuan_Dana;
use App\Models\Informasi_Pembayaran;
use App\Models\Informasi_Perpajakan;
use App\Models\Informasi_Lampiran;
use App\Models\Dokumen_Pengajuan;


class Pengajuan_Dana_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->authorize('superadmin');
    // }

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



        return view('pengajuan_dana.index',compact('data_jenis_surat','data_divisi','data_kategori_dana','data_kategori','metode_pembayaran','jenis_pajak','no_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
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
        return response()->json([
            'no_surat' => $no_surat
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_lampiran = $request->post('nama_lampiran');
        $file_lampiran = $request->file('file_lampiran');

        $validate_data['no_surat'] = $request->post('no_surat');
        $validate_data['tgl_pengajuan'] = $request->post('tgl_pengajuan');
        $validate_data['id_creator'] = auth()->user()->id;
        $validate_data['id_divisi'] = '1';
        $validate_data['id_kategori'] = $request->post('id_kategori');
        $validate_data['status_approval_1'] = 'no';
        $validate_data['status_approval_2'] = 'no';
        $validate_data['keperluan'] = $request->post('keperluan');
        $validate_data['status_pengajuan'] = 1;
        $validate_data['status_pemrosesan'] = 'unpaid';

        $cek = Pengajuan_Dana::where('no_surat',$validate_data['no_surat'])->count();
        if($cek>=1){
            return response()->json([
                'status' => false,
                'hasil' => $cek
            ]);
        }else{

            $pengajuan_dana = Pengajuan_Dana::create($validate_data);

            $informasi_pembayaran = (array) json_decode($request->post('data_pembayaran'),true);

            $informasi_pembayaran["id_pengajuan"] = $pengajuan_dana->id;

            $pembayaran = Informasi_Pembayaran::create($informasi_pembayaran);

            if($validate_data['id_kategori'] <= 2 ){
                $dokumen_pengajuan = [
                    "id_pengajuan" => $pengajuan_dana->id,
                    "npwp" => ($request->post('npwp') != null ? $request->post('npwp') : null ),
                    "nik" => ($request->post('nik') != null ? $request->post('nik') : null ),
                    "file_invoice" => ($request->file('file_invoice') != null ? $request->file('file_invoice')->store('post-data') : null ),
                    "file_npwp" => ($request->file('file_npwp') != null ? $request->file('file_npwp')->store('post-data') : null ),
                    "file_ktp" => ($request->file('file_ktp') != null ? $request->file('file_ktp')->store('post-data') : null )
                ];

                $dokumen_pengajuan = Dokumen_Pengajuan::create($dokumen_pengajuan);

                $informasi_perpajakan = (array) json_decode($request->post('data_pajak'),true);

                for($i = 0 ; $i < count($informasi_perpajakan) ; $i++){
                    if($informasi_perpajakan[$i]["id_jenis_pajak"] == 1){
                        $informasi_perpajakan[$i]["status_pajak"] = null;
                    }
                    $informasi_perpajakan[$i]["id_pengajuan"] = $pengajuan_dana->id;
                    Informasi_Perpajakan::create($informasi_perpajakan[$i]);
                }

            }
            if($nama_lampiran != null){

                for($i = 0; $i < count($nama_lampiran) ; $i++){
                    $data_lampiran['id_pengajuan'] = $pengajuan_dana->id;
                    $data_lampiran['nama_lampiran'] = $nama_lampiran[$i];
                    $data_lampiran['file_lampiran'] = $file_lampiran[$i]->store('post-data');
                    Informasi_Lampiran::create($data_lampiran);
                }
            }


            // return response()->json([
            //     'data' => $validate_data,
            //     'informasi_pembayaran' => $informasi_pembayaran,
            //     'informasi_perpajakan' => $informasi_perpajakan,
            //     'dokumen_pengajuan' => $dokumen_pengajuan,
            // ]);
            return response()->json([
                'result' => 'Sukses'
            ]);
        }


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
        //
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