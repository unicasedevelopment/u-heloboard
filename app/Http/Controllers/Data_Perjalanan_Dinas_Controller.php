<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perjalanan_Dinas;
use Illuminate\Support\Facades\Storage;
use File;


class Data_Perjalanan_Dinas_Controller extends Controller
{


    // public function __construct()
    // {
    //     $this->authorize('superadmin');
    // }


    public function index(){
        $data_perjalanan_dinas = Perjalanan_Dinas::all();
        return view('data_perjalanan_dinas.index',compact('data_perjalanan_dinas'));
    }

    public function show($id){
        $data_fpk = SPK::findOrFail($id);

        $filePath = public_path('storage/'.$data_fpk->file_fpk);
    	$headers = ['Content-Type: application/pdf'];
    	$fileName = 'test';

    	return response()->download($filePath, $fileName, $headers);
    }

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


    public function destroy($id)
    {
        $data_perjalanan_dinas = Perjalanan_Dinas::findOrFail($id);
        Storage::delete($data_perjalanan_dinas->file_pengajuan);
        Storage::delete($data_perjalanan_dinas->ttd_pemohon);
        $data_perjalanan_dinas->delete();
        return response()->json([
            'status' => 'Success'
        ]);
    }

}