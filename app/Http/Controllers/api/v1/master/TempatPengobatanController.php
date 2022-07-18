<?php

namespace App\Http\Controllers\api\v1\master;

use App\Models\TempatPengobatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TempatPengobatanController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/master/tempat",
     *     tags={"Master"},
     *     summary="Tempat Pengobatan",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     **/

    public function index()
    {
        $get = TempatPengobatan::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Tempat Pengobatan',
            'data' => $get
        ], 200);
    }
    /**
     * @OA\Post(
     ** path="/api/master/tempatPengobatan",
     *   tags={"Master"},
     *   summary="Tambah Data tempatPengobatan",
     *   operationId="tempatPengobatan",
     *
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      example= "Rumah Sakit",
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
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
                'nama.required' => 'Masukkan Nama Tempat Pengobatan Baru yang akan ditambahkan',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
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

    /**
     * @OA\Get(
     *     path="/api/master/tempatPengobatan/{id}",
     *     tags={"Master"},
     *     summary="Tampilkan Data tempatPengobatan Seseorang by ID",
     *     @OA\Parameter(
     *          name="id_tempatPengobatan",
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
        $post = TempatPengobatan::where('id_tempat', $id)->first();


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

    /**
     * @OA\Post(
     ** path="/api/master/tempatPengobatan/update",
     *   tags={"Master"},
     *   summary="Update Data tempatPengobatan",
     *   operationId="tempatPengobatan",
     *
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      example= "Puskesmas",
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
                'nama.required' => 'Masukkan Nama Tempat Pengobatan',
                'id.required' => 'Masukkan id Tempat Pengobatan'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
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

    /**
     * @OA\Delete(
     *     path="/api/master/tempatPengobatan/{id}",
     *     tags={"Master"},
     *     summary="Hapus Data tempatPengobatan",
     *     @OA\Parameter(
     *          name="id_tempatPengobatan",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="Data Tempat Pengobatan Berhasil Dihapus.")
     * )
     **/

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
