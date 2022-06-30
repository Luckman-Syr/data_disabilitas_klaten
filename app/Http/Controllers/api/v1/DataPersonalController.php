<?php

namespace App\Http\Controllers\api\v1;

use App\Models\DataPersonal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPersonalController extends Controller
{
    public function index()
    {
        $posts = Datapersonal::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Data Personal',
            'data' => $posts
        ], 200);
    }
    
    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'tempat_tgl_lahir'   => 'required',
            'status'   => 'required',
            'dokumen_personal'   => 'required',
            'id_kelurahan'   => 'required',
            'no_telpon'   => 'required',
            'pendidikan'   => 'required',
            'no_kk'   => 'required',
            'no_nik'   => 'required',
            'data_kk'   => 'required',
            'jml_disabilitas_kk'   => 'required',
            'keterangan_keluarga'   => 'required',
            'alamat_lengkap'   => 'required',
            'gender'   => 'required',
        ],
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = DataPersonal::create([
                'nama'     => $request->input('nama'),
                'tempat_tgl_lahir'   => $request->input('tempat_tgl_lahir'),
                'status'   => $request->input('status'),
                'dokumen_personal'   => $request->input('dokumen_personal'),
                'id_kelurahan'   => $request->input('id_kelurahan'),
                'no_telpon'   => $request->input('no_telpon'),
                'pendidikan'   => $request->input('pendidikan'),
                'no_kk'   => $request->input('no_kk'),
                'no_nik'   => $request->input('no_nik'),
                'data_kk'   => $request->input('data_kk'),
                'jml_disabilitas_kk'   => $request->input('jml_disabilitas_kk'),
                'keterangan_keluarga'   => $request->input('keterangan_keluarga'),
                'alamat_lengkap'   => $request->input('alamat_lengkap'),
                'gender'   => $request->input('gender'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Personal Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Personal Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $get = DataPersonal::where('id_personal' , $id)->first();

        if ($get) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Personal',
                'data'    => $get
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Personal Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'tempat_tgl_lahir'   => 'required',
            'status'   => 'required',
            'dokumen_personal'   => 'required',
            'id_kelurahan'   => 'required',
            'no_telpon'   => 'required',
            'pendidikan'   => 'required',
            'no_kk'   => 'required',
            'no_nik'   => 'required',
            'id_personal'   => 'required',
            'data_kk'   => 'required',
            'jml_disabilitas_kk'   => 'required',
            'keterangan_keluarga'   => 'required',
            'alamat_lengkap'   => 'required',
            'gender'   => 'required',
        ],
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = DataPersonal::where('id_personal', $request->input('id_personal'))->update([
                'nama'     => $request->input('nama'),
                'tempat_tgl_lahir'   => $request->input('tempat_tgl_lahir'),
                'status'   => $request->input('status'),
                'dokumen_personal'   => $request->input('dokumen_personal'),
                'id_kelurahan'   => $request->input('id_kelurahan'),
                'no_telpon'   => $request->input('no_telpon'),
                'pendidikan'   => $request->input('pendidikan'),
                'no_kk'   => $request->input('no_kk'),
                'no_nik'   => $request->input('no_nik'),
                'data_kk'   => $request->input('data_kk'),
                'jml_disabilitas_kk'   => $request->input('jml_disabilitas_kk'),
                'keterangan_keluarga'   => $request->input('keterangan_keluarga'),
                'alamat_lengkap'   => $request->input('alamat_lengkap'),
                'gender'   => $request->input('gender'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Pesonal Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Personal Gagal Diupdate!',
                ], 401);
            }

        }

    }

    public function destroy($id)
    {
        $post = DataPersonal::where('id_personal', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Data Personal Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Personal Gagal Dihapus!',
            ], 400);
        }

    }
}
