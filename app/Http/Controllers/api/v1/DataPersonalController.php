<?php

namespace App\Http\Controllers\api\v1;

use App\Models\DataPersonal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPersonalController extends Controller
{
    
/**
 * @OA\Get(
 *     path="/api/dataPersonal",
 *     tags={"Data Personal"},
 *     summary="Data Personal",
 *     @OA\Response(response="200", description="Display a listing of projects.")
 * )
 **/

    public function index()
    {
        $posts = Datapersonal::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Data Personal',
            'data' => $posts
        ], 200);
    }

/**
     * @OA\Post(
     ** path="/api/dataPersonal",
     *   tags={"Data Personal"},
     *   summary="Tambah Data Personal",
     *   operationId="dataPersonal",
     *
     *  @OA\Parameter(
     *      name="id_formulir",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="tempat_tgl_lahir",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="dokumen_personal",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="id_kelurahan",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="pendidikan",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="no_kk",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="no_nik",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="jml_disabilitas",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *       @OA\Parameter(
     *      name="alamat_lengkap",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *       @OA\Parameter(
     *      name="gender",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *        @OA\Parameter(
     *      name="no_telpon",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
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
            'jml_disabilitas_kk'   => 'required',
            'alamat_lengkap'   => 'required',
            'gender'   => 'required',
            'id_formulir' => 'required',
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
                'jml_disabilitas_kk'   => $request->input('jml_disabilitas_kk'),
                'alamat_lengkap'   => $request->input('alamat_lengkap'),
                'gender'   => $request->input('gender'),
                'id_formulir'     => $request->input('id_formulir'),
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

/**
 * @OA\Get(
 *     path="/api/dataPersonal/{id}",
 *     tags={"Data Personal"},
 *     summary="Show Data Personal by ID",
 *     @OA\Parameter(
 *          name="id_anggota",
 *          in="query",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\Response(response="200", description="Data Personal Berhasil Dihapus.")
 * )
 **/

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

/**
     * @OA\Post(
     ** path="/api/dataPersonal/update",
     *   tags={"Data Personal"},
     *   summary="Upacate Data Personal",
     *
     *   @OA\Parameter(
     *      name="id_personal",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="id_formulir",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="nama",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="tempat_tgl_lahir",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="dokumen_personal",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="id_kelurahan",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="pendidikan",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="no_kk",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="no_nik",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="jml_disabilitas",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *       @OA\Parameter(
     *      name="alamat_lengkap",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *       @OA\Parameter(
     *      name="gender",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *        @OA\Parameter(
     *      name="no_telpon",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
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
            'id_formulir' => 'required',
            'nama'     => 'required',
            'tempat_tgl_lahir'   => 'required',
            'status'   => 'required',
            'dokumen_personal'   => 'required',
            'id_kelurahan'   => 'required',
            'no_telpon'   => 'required',
            'pendidikan'   => 'required',
            'no_kk'   => 'required',
            'no_nik'   => 'required',
            'jml_disabilitas_kk'   => 'required',
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
                'id_formulir'     => $request->input('id_formulir'),
                'nama'     => $request->input('nama'),
                'tempat_tgl_lahir'   => $request->input('tempat_tgl_lahir'),
                'status'   => $request->input('status'),
                'dokumen_personal'   => $request->input('dokumen_personal'),
                'id_kelurahan'   => $request->input('id_kelurahan'),
                'no_telpon'   => $request->input('no_telpon'),
                'pendidikan'   => $request->input('pendidikan'),
                'no_kk'   => $request->input('no_kk'),
                'no_nik'   => $request->input('no_nik'),
                'jml_disabilitas_kk'   => $request->input('jml_disabilitas_kk'),
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

/**
 * @OA\Delete(
 *     path="/api/dataPersonal/{id}",
 *     tags={"Data Personal"},
 *     summary="Data Personal",
 *     @OA\Parameter(
 *          name="id_anggota",
 *          in="query",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\Response(response="200", description="Data Personal Berhasil Dihapus.")
 * )
 **/

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
