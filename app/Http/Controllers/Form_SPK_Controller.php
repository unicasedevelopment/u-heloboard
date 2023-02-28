<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SPK;
use App\Models\File_FPK;

class Form_SPK_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cek = SPK::count();
        $no_surat ='';
        if($cek<1){
            $no_surat = 'UNI/GA/FK/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
        }
        else{
            $nomor = SPK::all()->last();
            $urut = (int)substr($nomor->no_spk,-3);
            $no_surat = 'UNI/GA/FK/'.date("Y/m/d").'/'.str_pad($urut+1,3,'0',STR_PAD_LEFT);
        }


        return view('form_spk.index',compact('no_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cek = SPK::count();
        $no_surat ='';
        if($cek<1){
            $no_surat = 'UNI/GA/FK/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
        }
        else{
            $nomor = SPK::all()->last();
            $urut = (int)substr($nomor->no_spk,-3);
            $no_surat = 'UNI/GA/FK/'.date("Y/m/d").'/'.str_pad($urut+1,3,'0',STR_PAD_LEFT);
        }

        return response()->json([
            'no_fpk' => $no_surat
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
        $validated_data = $request->validate([
            'no_spk' => 'required|string|max:255',
            'jenis_perintah' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deadline' => 'required|date',
            'detail' => 'required'
        ]);

        //

        $cek = SPK::where('no_spk',$validated_data['no_spk'])->count();
        if($cek>=1){
            return response()->json([
                'status' => false,
                'hasil' => $cek
            ]);
        }else{

            $file_fpk = array();

            $data_file = $request->file('file');

            $img = $request->post('ttd');
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = 'storage/post-data/'.uniqid() . '.png';
            $validated_data['ttd'] = $file;

            $fpk = SPK::create($validated_data);

            if($fpk){
                $success = file_put_contents($file, $data);
                if($data_file != null){
                    for($i =0;$i<count($data_file); $i++){
                        if($data_file[$i]){
                            $file_fpk['id_fpk'] = $fpk->id;
                            $file_fpk['nama_file'] = $data_file[$i]->store('post-data');
                            File_FPK::create($file_fpk);
                        }
                    }
                }
            }
            return response()->json([
                'status' => true,
                'nama' => $file,
                'data' => $fpk
            ]);
        }

    }


    public function save_fpk(Request $request)
    {
        $data_fpk = SPK::findOrFail($request->post('id_fpk'));
        $validated_data = $request->validate([
            'file_fpk' => 'nullable|file'
        ]);

        $nama_file = $request->file('file_fpk');
        if($request->file('file_fpk')){
            $validated_data['file_fpk'] = $request->file('file_fpk')->store('post-data');
            // $validated_data['file_fpk'] = $request->file('file_fpk')->storeAs('storage-post-data-'.$request->post('nama_file'),'');
            // $validated_data['file_fpk'] = $request->file('file_fpk')->store('post-data');
        }

        $status = $data_fpk->update($validated_data);

        return response()->json([
            'data' => $data_fpk,
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
        // //
        // // $cek = SPK::where('id_jenis',$id)->where('id_divisi',$request->id_divisi)->get()->last();
        // $cek = SPK::count();
        // if($cek<1){
        //     $no_surat = 'ARS-'.$divisi->kode_divisi.'-'.$jenis->kode_jenis.'-'.str_pad(1,5,'0',STR_PAD_LEFT);
        // }
        // else{
        //     // $nomor = Surat_Keluar::all()->last();
        //     $nomor = (int)substr($cek->no_arsip,-5);
        //     $no_arsip = 'ARS-'.$divisi->kode_divisi.'-'.$jenis->kode_jenis.'-'.str_pad($nomor+1,5,'0',STR_PAD_LEFT);
        // }

        // return response()->json([
        //     'no_arsip' => $no_arsip
        // ]);
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