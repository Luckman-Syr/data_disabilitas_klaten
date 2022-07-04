<?php

namespace App\Http\Controllers\api\v1;

use App\Models\CDataAnggotaKeluarga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CDataAnggotaKeluargaController extends Controller
{
    public function index()
    {
        $posts = CDataAnggotaKeluarga::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Data Anggota Keluarga',
            'data' => $posts
        ], 200);
    }
    
    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'id_formulir'     => 'required',
            'no_kk'     => 'required',
            'nama'     => 'required',
            'nik'     => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required',
            'pekerjaan'     => 'required',
            'penghasilan'     => 'required',
            'hubungan_difabel'     => 'required',
            'keteragan'     => 'required',
        ],
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = CDataAnggotaKeluarga::create([
                'id_formulir'     => $request->input('id_formulir'),
                'no_kk'     => $request->input('no_kk'),
                'nama'     => $request->input('nama'),
                'nik'     => $request->input('nik'),
                'jenis_kelamin'     => $request->input('jenis_kelamin'),
                'tanggal_lahir'     => $request->input('tanggal_lahir'),
                'pekerjaan'     => $request->input('pekerjaan'),
                'penghasilan'     => $request->input('penghasilan'),
                'hubungan_difabel'     => $request->input('hubungan_difabel'),
                'keteragan'     => $request->input('keteragan'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Anggota Keluarga Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Anggota Keluarga Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $get = CDataAnggotaKeluarga::where('id_formulir' , $id)->first();

        if ($get) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Anggota Keluarga',
                'data'    => $get
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Anggota Keluarga Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'id_anggota'     => 'required',
            'id_formulir'     => 'required',
            'no_kk'     => 'required',
            'nama'     => 'required',
            'nik'     => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required',
            'pekerjaan'     => 'required',
            'penghasilan'     => 'required',
            'hubungan_difabel'     => 'required',
            'keteragan'     => 'required',
        ],
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = CDataAnggotaKeluarga::where('id_anggota', $request->input('id_anggota'))->update([
                'id_formulir'     => $request->input('id_formulir'),
                'no_kk'     => $request->input('no_kk'),
                'nama'     => $request->input('nama'),
                'nik'     => $request->input('nik'),
                'jenis_kelamin'     => $request->input('jenis_kelamin'),
                'tanggal_lahir'     => $request->input('tanggal_lahir'),
                'pekerjaan'     => $request->input('pekerjaan'),
                'penghasilan'     => $request->input('penghasilan'),
                'hubungan_difabel'     => $request->input('hubungan_difabel'),
                'keteragan'     => $request->input('keteragan'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Anggota Keluarga Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Anggota Keluarga Diupdate!',
                ], 401);
            }

        }

    }

    public function destroy($id)
    {
        $post = CDataAnggotaKeluarga::where('id_anggota', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Data Anggota Keluarga Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Anggota Keluarga Gagal Dihapus!',
            ], 400);
        }

    }
}
