<?php

namespace App\Http\Controllers\api\v1\master;

use App\Models\TempatPengobatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TempatPengobatanController extends Controller
{
    public function index()
    {
        $get = TempatPengobatan::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Tempat Pengobatan',
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
                'nama.required' => 'Masukkan Nama Tempat Pengobatan Baru yang akan ditambahkan',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = TempatPengobatan::create([
                'nama'     => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tempat Pengobatan Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tempat Pengobatan Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $post = TempatPengobatan::where('id_tempat' , $id)->first();


        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Tempat Pengobatan',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tempat Pengobatan Tidak Ditemukan!',
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
                'nama.required' => 'Masukkan Nama Tempat Pengobatan',
                'id.required' => 'Masukkan id Tempat Pengobatan'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = TempatPengobatan::where('id_tempat', $request->input('id_tempat'))->update([
                'nama'   => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Nama Tempat Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Nama Tempat Gagal Diupdate!',
                ], 401);
            }

        }

    }

    public function destroy($id)
    {
        $post = TempatPengobatan::where('id_tempat', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Tempat Pengobatan Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tempat Pengobatan Gagal Dihapus!',
            ], 400);
        }

    }
}
