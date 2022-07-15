<?php

namespace App\Http\Controllers\api\v1\master;

use App\Models\Kelurahan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelurahanController extends Controller
{

/**
 * @OA\Get(
 *     path="/api/master/kelurahan",
 *     tags={"Master"},
 *     summary="Kelurahan",
 *     @OA\Response(response="200", description="Display a listing of projects.")
 * )
 **/

    public function index()
    {
        $get = Kelurahan::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Kelurahan',
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
                'nama.required' => 'Masukkan Nama Kecamatan yang akan ditambahkan',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Kelurahan::create([
                'nama'     => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kelurahan Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Kelurahan Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $post = Kelurahan::where('id_kelurahan' , $id)->first();


        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Kelurahan',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kelurahan Tidak Ditemukan!',
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
                'nama.required' => 'Masukkan Nama Kelurahan',
                'id.required' => 'Masukkan id Kelurahan'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Kelurahan::where('id_kelurahan', $request->input('id_kelurahan'))->update([
                'nama'   => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Nama Kelurahan Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Nama Kelurahan Gagal Diupdate!',
                ], 401);
            }

        }

    }

    public function destroy($id)
    {
        $post = Kelurahan::where('id_kelurahan', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Kelurahan Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kelurahan Gagal Dihapus!',
            ], 400);
        }

    }
}
