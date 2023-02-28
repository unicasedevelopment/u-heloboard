<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;

class Tamu_Controller extends Controller
{

    // public function __construct()
    // {
    //     $this->authorize('superadmin');
    // }
    public function index()
    {
        $data_tamu = Tamu::all();
        return view('tamu.index',compact('data_tamu'));
    }

    public function form_buku_tamu()
    {
        return view('tamu.form_buku_tamu');
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
            'nama_tamu' => 'required|string|max:255',
            'penerima_tamu' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'tgl_kunjungan' => 'required|date',
            'keperluan' => 'required|string|max:255'
        ]);

        Tamu::create($validated_data);
        return redirect()->route('tamu.index')->with('success', 'Berhasil Menyimpan Data Tamu');

    }
    public function save_tamu(Request $request)
    {


        $validated_data = $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'penerima_tamu' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'tgl_kunjungan' => 'required|date',
            'keperluan' => 'required|string|max:255'
        ]);

        Tamu::create($validated_data);
        return redirect()->route('form_tamu.index')->with('success', 'Berhasil Menyimpan Data Tamu');

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
        $data_tamu = Tamu::findOrFail($id);
        return response()->json([
            'data' => $data_tamu
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
        $data_tamu = Tamu::findOrFail($id);

        $validated_data = $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'penerima_tamu' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'tgl_kunjungan' => 'required|date',
            'keperluan' => 'required|string|max:255'
        ]);

        $data_tamu->update($validated_data);



        return response()->json([
            'data' => $data_tamu
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
        $data_tamu = Tamu::findOrFail($id);
        $data_tamu->delete();
        return response()->json([
            'status' => 'Sukses'
        ]);
    }
}