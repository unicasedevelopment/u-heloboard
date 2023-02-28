<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jenis_Surat;
use App\Models\Surat_Keluar;
use App\Models\Divisi;

class Buat_Surat_Controller extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->authorize('superadmin');
    // }

    public function index(){
        $data_jenis_surat = Jenis_Surat::pluck('nama_jenis','id');
        $data_divisi = Divisi::pluck('nama_divisi','id');


        return view('buat_surat.index', compact('data_jenis_surat','data_divisi'));
    }



    public function show(Request $request, $id)
    {
        $cek_no_arsip = Surat_Keluar::where('id_jenis',$id)->where('id_divisi',$request->id_divisi)->get()->last();
        $cek_no_surat = Surat_Keluar::where('id_jenis',$id)->where('id_divisi',$request->id_divisi)->whereMonth('tgl_surat',date('m'))->get()->last();

        $jenis = Jenis_Surat::findOrFail($id);
        $divisi = Divisi::findOrFail($request->id_divisi);
        $no_arsip ='';
        $no_surat='';

        if($cek_no_arsip==null){
            $no_arsip = 'ARS-'.$divisi->kode_divisi.'-'.$jenis->kode_jenis.'-'.str_pad(1,5,'0',STR_PAD_LEFT);
        }
        else{
            $nomor = (int)substr($cek_no_arsip->no_arsip,-5);
            $no_arsip = 'ARS-'.$divisi->kode_divisi.'-'.$jenis->kode_jenis.'-'.str_pad($nomor+1,5,'0',STR_PAD_LEFT);
        }

        if($cek_no_surat==null){
            $no_surat = 'UNI/'.$divisi->kode_divisi.'/'.$jenis->kode_jenis.'/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
        }
        else{
            $urut = (int)substr($cek_no_surat->no_arsip,-3);
            $no_surat = 'UNI/'.$divisi->kode_divisi.'/'.$jenis->kode_jenis.'/'.date("Y/m/d").'/'.str_pad($urut+1,3,'0',STR_PAD_LEFT);
        }

        return response()->json([
            'no_arsip' => $no_arsip,
            'no_surat' => $no_surat,
        ]);
    }

    public function create(Request $request){
        $id_divisi = $request->id_divisi;
        $id_jenis_surat = $request->id_jenis;

        $cek_no_arsip = Surat_Keluar::where('id_jenis',$id_jenis_surat)->where('id_divisi',$id_divisi)->get()->last();
        $cek_no_surat = Surat_Keluar::where('id_jenis',$id_jenis_surat)->where('id_divisi',$id_divisi)->whereMonth('tgl_surat',date('m'))->get()->last();

        $jenis = Jenis_Surat::findOrFail($id_jenis_surat);
        $divisi = Divisi::findOrFail($request->id_divisi);
        $no_arsip ='';
        $no_surat='';

        if($cek_no_arsip==null){
            $no_arsip = 'ARS-'.$divisi->kode_divisi.'-'.$jenis->kode_jenis.'-'.str_pad(1,5,'0',STR_PAD_LEFT);
        }
        else{
            $nomor = (int)substr($cek_no_arsip->no_arsip,-5);
            $no_arsip = 'ARS-'.$divisi->kode_divisi.'-'.$jenis->kode_jenis.'-'.str_pad($nomor+1,5,'0',STR_PAD_LEFT);
        }

        if($cek_no_surat==null){
            $no_surat = 'UNI/'.$divisi->kode_divisi.'/'.$jenis->kode_jenis.'/'.date("Y/m/d").'/'.str_pad(1,3,'0',STR_PAD_LEFT);
        }
        else{
            $urut = (int)substr($cek_no_surat->no_arsip,-3);
            $no_surat = 'UNI/'.$divisi->kode_divisi.'/'.$jenis->kode_jenis.'/'.date("Y/m/d").'/'.str_pad($urut+1,3,'0',STR_PAD_LEFT);
        }

        $data_surat = [
            'id_jenis' => $id_jenis_surat,
            'nama_jenis' => $jenis->nama_jenis,
            'id_divisi' => $id_divisi,
            'nama_divisi' => $divisi->nama_divisi,
            'no_arsip' => $no_arsip,
            'no_surat' => $no_surat
        ];


        switch ($id_jenis_surat) {
            case '1':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '2':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '3':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '4':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '5':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '6':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '7':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '8':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '9':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '10':
                return view('buat_surat.berita_acara',compact('data_surat'));
                break;
            case '11':
                return view('buat_surat/surat_jalan.index',compact('data_surat'));
                break;
            case '12':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            case '13':
                return view('buat_surat.surat_jalan',compact('data_surat'));
                break;
            default:
                break;

        }
    }

    public function store(Request $request){
        $validated_data = $request->validate([
            'no_arsip' => 'required|string|max:255',
            'id_divisi' => 'required|string|max:255',
            'id_jenis' => 'required|string|max:255',
            'tgl_dikirim' => 'required|date',
            'tgl_surat' => 'required|date',
            'penerima' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'no_surat' => 'required'
        ]);
        // $validated_data['penerima'] = $request->nama_2;
        // $validated_data['tgl_dikirim'] = date("Y-m-d");
        // $validated_data['tgl_surat'] = date("Y-m-d");
        // $validated_data['keterangan'] = $request->judul." - dari ".$request->nama_1." untuk ".$request->nama_2;

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

        return response()->json([
           'data' => $request->post()
        ]);
    }

}