<?php

namespace App\Http\Controllers\api\v1\master;

use App\Models\Disabilitas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DisabilitasController extends Controller
{
    
/**
 * @OA\Get(
 *     path="/api/master/disabilitas",
 *     tags={"Master"},
 *     summary="Disabilitas",
 *     @OA\Response(response="200", description="Display a listing of projects.")
 * )
 **/
    
    public function index()
    {
        $get = Disabilitas::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Disabilitas',
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

            $post = Disabilitas::create([
                'nama'     => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Disabilitas Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Disabilitas Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $post = Disabilitas::where('id_disabilitas' , $id)->first();


        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Disabilitas',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Disabilitas Tidak Ditemukan!',
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
                'nama.required' => 'Masukkan Nama Disabilitas',
                'id.required' => 'Masukkan id Disabilitas'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Disabilitas::where('id_disabilitas', $request->input('id_disabilitas'))->update([
                'nama'   => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Disabilitas Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Disabilitas Gagal Diupdate!',
                ], 401);
            }

        }

    }

    public function destroy($id)
    {
        $post = Disabilitas::where('id_disabilitas', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Disabilitas Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Disabilitas Gagal Dihapus!',
            ], 400);
        }

    }
}
