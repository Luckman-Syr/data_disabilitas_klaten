<?php

namespace App\Http\Controllers\api\v1\master;

use App\Models\Penyakit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenyakitController extends Controller
{
    public function index()
    {
        $get = Penyakit::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Penyakit',
            'data' => $get
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ],
            [
                'nama.required' => 'Masukkan Nama Penyakit yang akan ditambahkan',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Penyakit::create([
                'nama'     => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Penyakit Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Penyakit Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $post = Penyakit::where('id_penyakit' , $id)->first();


        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Penyakit',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Penyakit Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'id'     => 'required'
        ],
            [
                'nama.required' => 'Masukkan Nama Penyakit',
                'id.required' => 'Masukkan id Penyakit'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Penyakit::where('id_penyakit', $request->input('id_penyakit'))->update([
                'nama'   => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Penyakit Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Penyakit Gagal Diupdate!',
                ], 401);
            }

        }

    }

    public function destroy($id)
    {
        $post = Penyakit::where('id_penyakit', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Penyakit Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Penyakit Gagal Dihapus!',
            ], 400);
        }

    }
}
