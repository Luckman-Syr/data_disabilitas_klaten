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

    /**
     * @OA\Post(
     ** path="/api/master/kelurahan",
     *   tags={"Master"},
     *   summary="Tambah Data kelurahan",
     *   operationId="kelurahan",
     *
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      example= "bawen",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *)
     **/

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

    /**
     * @OA\Get(
     *     path="/api/master/kelurahan/{id}",
     *     tags={"Master"},
     *     summary="Tampilkan Data kelurahan Seseorang by ID",
     *     @OA\Parameter(
     *          name="id_kelurahan",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     **/

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

    /**
     * @OA\Post(
     ** path="/api/master/kelurahan/update",
     *   tags={"Master"},
     *   summary="Update Data kelurahan",
     *   operationId="kelurahan",
     *
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      example= "Bawen",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),@OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/

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

    /**
     * @OA\Delete(
     *     path="/api/master/kelurahan/{id}",
     *     tags={"Master"},
     *     summary="Hapus Data kelurahan",
     *     @OA\Parameter(
     *          name="id_kelurahan",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="Data Kelurahan Berhasil Dihapus.")
     * )
     **/

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
