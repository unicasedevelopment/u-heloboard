<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perjalanan_Dinas;

class Perjalanan_Dinas_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __construct()
    // {
    //     $this->authorize('superadmin');
    // }


    public function index()
    {
        //
        $cek = Perjalanan_Dinas::count();
        $no_surat ='';
        if($cek<1){
            $no_surat = 'UNI/GA/FPPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
        }
        else{
            $nomor = Perjalanan_Dinas::all()->last()->no_surat;
            $arr_no_surat = explode ("/", $nomor);
            $tahun = $arr_no_surat[3];
            $bulan = $arr_no_surat[4];
            if($tahun == date('Y')){
                if($bulan == date('m')){
                    $urut = (int)substr($nomor,-3);
                    $no_surat = 'UNI/GA/FPPD/'.date("Y/m/d").'/'.str_pad($urut+1,3,'0',STR_PAD_LEFT);
                }else{
                    $no_surat = 'UNI/GA/FPPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
                }
            }else{
                $no_surat = 'UNI/GA/FPPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
            }
        }
        return view('perjalanan_dinas.index',compact('no_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cek = Perjalanan_Dinas::count();
        $no_surat ='';
        if($cek<1){
            $no_surat = 'UNI/GA/FPPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
        }
        else{
            $nomor = Perjalanan_Dinas::all()->last()->no_surat;
            $arr_no_surat = explode ("/", $nomor);
            $tahun = $arr_no_surat[3];
            $bulan = $arr_no_surat[4];
            if($tahun == date('Y')){
                if($bulan == date('m')){
                    $urut = (int)substr($nomor,-3);
                    $no_surat = 'UNI/GA/FPPD/'.date("Y/m/d").'/'.str_pad($urut+1,3,'0',STR_PAD_LEFT);
                }else{
                    $no_surat = 'UNI/GA/FPPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
                }
            }else{
                $no_surat = 'UNI/GA/FPPD/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
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
        //
        function hitung_durasi($start_date, $end_date){
            $start_date = strtotime($start_date);
            $end_date = strtotime($end_date);

            $jarak = $end_date - $start_date;

            $hari = $jarak / 60 / 60 / 24;
            return $hari+1;
        }
        function hitung_uang_saku($jabatan, $area, $konsumsi){
            $uang_saku = 0;
            if($jabatan == 'Staff' || $jabatan == 'Koordinator'){
                if($area == 'Jabodetabek'){
                    $uang_saku = 45000 * $konsumsi;
                }else{
                    $uang_saku = 35000 * $konsumsi;
                }
            }else if($jabatan == 'Supervisor' || $jabatan == 'General Supervisor' || $jabatan == 'Manager'){
                if($area == 'Jabodetabek'){
                    $uang_saku = 50000 * $konsumsi;
                }else{
                    $uang_saku = 40000 * $konsumsi;
                }
            }else{
                if($area == 'Jabodetabek'){
                    $uang_saku = 55000 * $konsumsi;
                }else{
                    $uang_saku = 45000 * $konsumsi;
                }
            }
            return $uang_saku;
        }
        $validated_data = $request->validate([
            'no_surat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'norek' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            // 'durasi_hari' => 'required',
            // 'durasi_malam' => 'required',
            'lokasi_keberangkatan' => 'required|string|max:255',
            'tgl_keberangkatan' => 'required|date',
            'jam_keberangkatan' => 'required|date_format:H:i',
            'transportasi_keberangkatan' => 'required|string|max:255',
            'lokasi_kedatangan' => 'required|string|max:255',
            'tgl_kedatangan' => 'required|date',
            'jam_kedatangan' => 'required|date_format:H:i',
            'transportasi_kedatangan' => 'required|string|max:255',
            'catatan_tambahan' => 'nullable|string',
            'area' => 'required|string',
            'konsumsi' => 'required|numeric'
        ]);

        //

        $cek = Perjalanan_Dinas::where('no_surat',$validated_data['no_surat'])->count();
        if($cek>=1){
            return response()->json([
                'status' => false,
                'hasil' => $cek
            ]);
        }else{
            $file_fpk = array();
            // $data_file = $request->file('file');
            $img = $request->post('ttd_pemohon');
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = 'post-data/'.uniqid() . '.png';
            $validated_data['ttd_pemohon'] = $file;
            $validated_data['file_pengajuan'] = '';

            $validated_data['uang_saku'] = hitung_uang_saku($validated_data['jabatan'], $validated_data['area'], $validated_data['konsumsi']);
            $validated_data['durasi'] = hitung_durasi($validated_data['tgl_keberangkatan'], $validated_data['tgl_kedatangan']);
            $validated_data['uang_transportasi'] = $validated_data['durasi'] * 100000;

            $perjalanan_dinas = Perjalanan_Dinas::create($validated_data);

            if($perjalanan_dinas){
                file_put_contents('storage/'.$file, $data);
            }


            return response()->json([
                'status' => true,
                'data' => $perjalanan_dinas
            ]);
        }
    }

    public function save_file_perjalanan_dinas(Request $request)
    {
        $data_perjalanan_dinas = Perjalanan_Dinas::findOrFail($request->post('id_perjalanan_dinas'));
        $validated_data = $request->validate([
            'file_pengajuan' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
        ]);

        $nama_file = $request->file('file_fpk');
        if($request->file('file_pengajuan')){
            $validated_data['file_pengajuan'] = $request->file('file_pengajuan')->store('post-data');
            // $validated_data['file_fpk'] = $request->file('file_fpk')->storeAs('storage-post-data-'.$request->post('nama_file'),'');
            // $validated_data['file_fpk'] = $request->file('file_fpk')->store('post-data');
        }

        $status = $data_perjalanan_dinas->update($validated_data);

        return response()->json([
            'data' => $data_perjalanan_dinas,
            'status' => $status
        ]);
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