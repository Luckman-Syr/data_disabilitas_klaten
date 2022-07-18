<?php

namespace App\Http\Controllers\api\v1\master;

use App\Models\Penyakit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenyakitController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/master/penyakit",
     *     tags={"Master"},
     *     summary="Penyakit",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     **/

    public function index()
    {
        $get = Penyakit::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Penyakit',
            'data' => $get
        ], 200);
    }

    /**
     * @OA\Post(
     ** path="/api/master/penyakit",
     *   tags={"Master"},
     *   summary="Tambah Data penyakit",
     *   operationId="master_penyakit",
     *
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      example= "Jantung",
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
                'nama.required' => 'Masukkan Nama Penyakit yang akan ditambahkan',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
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

    /**
     * @OA\Get(
     *     path="/api/master/penyakit/{id}",
     *     tags={"Master"},
     *     summary="Tampilkan Data penyakit Seseorang by ID",
     *     @OA\Parameter(
     *          name="id_penyakit",
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
        $post = Penyakit::where('id_penyakit', $id)->first();


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
    /**
     * @OA\Post(
     ** path="/api/master/penyakit/update",
     *   tags={"Master"},
     *   summary="Update Data penyakit",
     *   operationId="master_penyakit",
     *
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      example= "Jantung",
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
                'nama.required' => 'Masukkan Nama Penyakit',
                'id.required' => 'Masukkan id Penyakit'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
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

    /**
     * @OA\Delete(
     *     path="/api/master/penyakit/{id}",
     *     tags={"Master"},
     *     summary="Hapus Data penyakit",
     *     @OA\Parameter(
     *          name="id_penyakit",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="Data penyakit Berhasil Dihapus.")
     * )
     **/

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
