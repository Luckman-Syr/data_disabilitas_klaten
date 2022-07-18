<?php

namespace App\Http\Controllers\api\v1\master;

use App\Models\Kecamatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @param Request $request
 * @return \Illuminate\Http\JsonResponse
 */

class KecamatanController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/master/kecamatan",
     *     tags={"Master"},
     *     summary="Kecamatan",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     **/

    public function index()
    {
        $get = Kecamatan::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Kecamatan',
            'data' => $get
        ], 200);
    }

    /**
     * @OA\Post(
     ** path="/api/master/kecamatan",
     *   tags={"Master"},
     *   summary="Tambah Data kecamatan",
     *   operationId="master_kecamatan",
     *
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      example= "bawen",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),     *   @OA\Response(
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

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'nama'     => 'required',
            ],
            [
                'nama.required' => 'Masukkan Nama Kecamatan yang akan ditambahkan',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Kecamatan::create([
                'nama'     => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kecamatan Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Kecamatan Gagal Disimpan!',
                ], 401);
            }
        }
    }

    /**
     * @OA\Get(
     *     path="/api/master/kecamatan/{id}",
     *     tags={"Master"},
     *     summary="Tampilkan Data kecamatan Seseorang by ID",
     *     @OA\Parameter(
     *          name="id_kecamatan",
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
        $post = Kecamatan::where('id_kecamatan', $id)->first();


        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Kecamatan',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kecamatan Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    /**
     * @OA\Post(
     ** path="/api/master/kecamatan/update",
     *   tags={"Master"},
     *   summary="Update Data kecamatan",
     *   operationId="master_kecamatan",
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama'     => 'required',
                'id'     => 'required'
            ],
            [
                'nama.required' => 'Masukkan Nama Kecamatan',
                'id.required' => 'Masukkan id Kecamatan'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Kecamatan::where('id_kecamatan', $request->input('id_kecamatan'))->update([
                'nama'   => $request->input('nama'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Nama Kecamatan Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Nama Kecamatan Gagal Diupdate!',
                ], 401);
            }
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/master/kecamatan/{id}",
     *     tags={"Master"},
     *     summary="Hapus Data kecamatan",
     *     @OA\Parameter(
     *          name="id_kecamatan",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="Data Kecamatan Berhasil Dihapus.")
     * )
     **/

    public function destroy($id)
    {
        $post = Kecamatan::where('id_kecamatan', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Kecamatan Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kecamatan Gagal Dihapus!',
            ], 400);
        }
    }
}
