<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat_Keluar;
use App\Models\Jenis_Surat;
use App\Models\Divisi;

class Surat_Keluar_Controller extends Controller
{
    // public function __construct()
    // {
    //     $this->authorize('superadmin');
    // }


    public function index()
    {
        $data_surat_keluar = Surat_Keluar::all();
        $data_jenis_surat = Jenis_Surat::pluck('nama_jenis','id');
        $data_divisi = Divisi::pluck('nama_divisi','id');
        return view('surat_keluar.index',compact('data_surat_keluar','data_jenis_surat','data_divisi'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {


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
            'no_arsip' => 'required|string|max:255',
            'tgl_dikirim' => 'required|date',
            'tgl_surat' => 'required|date',
            'id_divisi' => 'required|string|max:255',
            'id_jenis' => 'required|string|max:255',
            'no_surat' => 'required',
            'penerima' => 'required|string|max:255',
            'resume' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
        ]);

        $cek = Surat_Keluar::where('no_arsip',$validated_data['no_arsip'])->count();
        if($cek>=1){
            return response()->json([
                'status' => false,
                'hasil' => $cek
            ]);
        }else{
            if($request->file('file_surat')){
                $validated_data['file_surat'] = $request->file('file_surat')->store('post-data');
            }
            Surat_Keluar::create($validated_data);
            return response()->json([
                'status' => true
            ]);
            // return redirect()->route('surat_keluar.index')->with('success', 'Berhasil Menyimpan Data Surat Masuk');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $cek = Surat_Keluar::where('id_jenis',$id)->where('id_divisi',$request->id_divisi)->get()->last();
        // $cek = Surat_Keluar::where('id_jenis',$id)->where('id_divisi',$request->id_divisi)->count();
        $jenis = Jenis_Surat::findOrFail($id);
        $divisi = Divisi::findOrFail($request->id_divisi);
        $no_arsip ='';
        if($cek==null){
            $no_arsip = 'ARS-'.$divisi->kode_divisi.'-'.$jenis->kode_jenis.'-'.str_pad(1,5,'0',STR_PAD_LEFT);
        }
        else{
            // $nomor = Surat_Keluar::all()->last();
            $nomor = (int)substr($cek->no_arsip,-5);
            $no_arsip = 'ARS-'.$divisi->kode_divisi.'-'.$jenis->kode_jenis.'-'.str_pad($nomor+1,5,'0',STR_PAD_LEFT);
        }

        return response()->json([
            'no_arsip' => $no_arsip
        ]);

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
        $data_jenis_surat = Jenis_Surat::pluck('nama_jenis','id');
        $data_surat_keluar = Surat_Keluar::findOrFail($id);
        return response()->json([
            'data' => $data_surat_keluar,
            'jenis_surat' => $data_jenis_surat,
            'size' => count($data_jenis_surat)
        ]);
        // return view('surat_keluar.edit',compact($data_surat_keluar));
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
        $data_surat_keluar = Surat_Keluar::findOrFail($id);

        $validated_data = $request->validate([
            'no_arsip' => 'required|string|max:255',
            'tgl_dikirim' => 'required|date',
            'tgl_surat' => 'required|date',
            'id_divisi' => 'required|string|max:255',
            'id_jenis' => 'required|string|max:255',
            'no_surat' => 'required',
            'penerima' => 'required|string|max:255',
            'resume' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
        ]);

        if($request->file('file_surat')){
            $validated_data['file_surat'] = $request->file('file_surat')->store('post-data');
        }

        $status = $data_surat_keluar->update($validated_data);



        return response()->json([
            'data' => $data_surat_keluar
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
        $data_surat_keluar = Surat_Keluar::findOrFail($id);
        $data_surat_keluar->delete();
        return response()->json([
            'status' => 'Sukses'
        ]);
    }
}