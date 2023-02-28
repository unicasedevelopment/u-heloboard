<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_Divisi;
use App\Models\Divisi;
use App\Models\Organisasi;
use App\Models\User;
use App\Models\Detail_Kinerja;
use App\Models\Master_Kinerja;
class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_sub_divisi = Sub_Divisi::pluck('nama_sub_divisi','id');
        $karyawan = User::with('sub_divisions')->paginate(1);
        $indikator = Master_Kinerja::pluck('nama_kinerja','id');
        return view('karyawan.indexbaru',compact('karyawan','data_sub_divisi','indikator'));
    }

    public function carikaryawan(Request $request)
    {

        $karyawan = User::where('nama_karyawan','LIKE','%'.$request->get('keyword').'%')->get();
        return json_encode($karyawan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_sub_divisi = Sub_Divisi::pluck('nama_sub_divisi','id');
        return view('karyawan.create',compact('data_sub_divisi'));
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
        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required|string|max:255',
            'nama_karyawan' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'job_position' => 'required|string|max:255',
            'id_sub_divisi' => 'required',
            'level' => 'required',

            ]);
            // $request->password = bcrypt($request->password);
            $karyawan= new User();
            $karyawan->email = $request->email;
            $karyawan->password = bcrypt($request->password);
            $karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->jenis_kelamin = $request->jenis_kelamin;
            $karyawan->job_position = $request->job_position;
            $karyawan->id_sub_divisi = $request->id_sub_divisi;
            $karyawan->level = $request->level;
            $karyawan->save();
            // User::create([
            //     'email' => $request->email,
            //     'password' => bcrypt($request->password),
            //     'nama_karyawan' => $request->nama_karyawan,
            //     'jenis_kelamin' => $request->jenis_kelamin,
            //     'job_position' => $request->job_position,
            //     'id_sub_divisi' => $request->id_sub_divisi,
            //     'level' => $request->level
            // ]);

            if($request['status']==1){
                for($i=0;$i<count($request->id_kinerja);$i++){
                    $detail_kinerja = new Detail_Kinerja();
                    $detail_kinerja->id_karyawan = $karyawan->id;
                    $detail_kinerja->id_kinerja = $request['id_kinerja'][$i];
                    $detail_kinerja->bobot = $request['bobot'][$i];
                    $detail_kinerja->save();
                }
            }

            return redirect()->route('karyawan.index')->with('success', 'Berhasil Menyimpan Data Karyawan Baru : '.$request->get('nama_karyawan'));
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
        $karyawan = User::findOrFail($id);
        $kinerja = User::find($id)->kinerjas()->get();
        $bobot =  User::find($id)->bobot_kinerja()->get();
        $sub_divisi = Sub_Divisi::FindOrFail($karyawan->id_sub_divisi);
        $divisi = Divisi::FindOrFail($sub_divisi->id_divisi);
        $organisasi = Organisasi::FindOrFail($divisi->id_organisasi);
        return view('karyawan.detail',compact('karyawan','sub_divisi','divisi','organisasi','kinerja','bobot'));
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
        $karyawan = User::findOrFail($id);
        $this->validate($request, [

            'email' => 'required|email',
            // 'password' => 'required|string|max:255',
            'nama_karyawan' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'job_position' => 'required|string|max:255',
            'id_sub_divisi' => 'required',
            'level' => 'required'

            ]);

            $karyawan->update($request->all());


            return redirect()->route('karyawan.index')->with('success', 'Berhasil Update Data Karyawan : '.$request->get('nama_karyawan'));

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
        $karyawan=User::find($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('error','Berhasil Hapus Data Karyawan : '.$karyawan->nama_karyawan);
    }


}