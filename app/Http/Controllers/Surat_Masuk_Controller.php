<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat_Masuk;

class Surat_Masuk_Controller extends Controller
{
    // public function __construct()
    // {
    //     $this->authorize('superadmin');
    // }

    public function index()
    {

        $cek = Surat_Masuk::count();
        $no_arsip ='';
        if($cek<1){
            $no_arsip = 'ARS-'.str_pad($cek+1,5,'0',STR_PAD_LEFT);
        }
        else{
            $nomor = Surat_Masuk::all()->last();
            $nomor = (int)substr($nomor->no_arsip,-5);
            $no_arsip = 'ARS-'.str_pad($nomor+1,5,'0',STR_PAD_LEFT);
        }
        $data_surat_masuk = Surat_Masuk::all();
        return view('surat_masuk.index',compact('data_surat_masuk','no_arsip'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'tgl_diterima' => 'required|date',
            'tgl_surat' => 'required|date',
            'no_surat' => 'required',
            'pengirim' => 'required|string|max:255',
            'resume' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
        ]);

            if($request->file('file_surat')){
                $validated_data['file_surat'] = $request->file('file_surat')->store('post-data');
            }

        Surat_Masuk::create($validated_data);
        return redirect()->route('surat_masuk.index')->with('success', 'Berhasil Menyimpan Data Surat Masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $data_surat_masuk = Surat_Masuk::findOrFail($id);
        // $data_surat_masuk = Surat_Masuk::whereLike('no_arsip', $no_arsip)->get();

        return response()->json([
            'data' => $data_surat_masuk
        ]);
        // return view('surat_masuk.edit',compact($data_surat_masuk));
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

        $data_surat_masuk = Surat_Masuk::findOrFail($id);
        // $data_surat_masuk = Surat_Masuk::whereLike('no_arsip', $$reques->post['no_arsip'])->orWhereLike('name', $name)->get();

        $validated_data = $request->validate([
            'no_arsip' => 'required|string|max:255',
            'tgl_diterima' => 'required|date',
            'tgl_surat' => 'required|date',
            'no_surat' => 'required',
            'pengirim' => 'required|string|max:255',
            'resume' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
        ]);


        if($request->file('file_surat')){
            $validated_data['file_surat'] = $request->file('file_surat')->store('post-data');
        }

        $data_surat_masuk->update($validated_data);

        return response()->json([
            'data' => $data_surat_masuk
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
        $data_surat_masuk = Surat_Masuk::findOrFail($id);

        $data_surat_masuk->delete();
        return response()->json([
            'status' => 'Sukses'
        ]);
    }

}