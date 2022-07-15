<?php

namespace App\Http\Controllers\api\v1;

use App\Models\CDataAnggotaKeluarga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CDataAnggotaKeluargaController extends Controller
{

/**
 * @OA\Get(
 *     path="/api/anggotaKeluarga",
 *     tags={"Anggota Keluarga"},
 *     summary="Anggota Keluarga",
 *     @OA\Response(response="200", description="Display a listing of projects.")
 * )
 **/

    public function index()
    {
        $posts = CDataAnggotaKeluarga::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Data Anggota Keluarga',
            'data' => $posts
        ], 200);
    }

/**
     * @OA\Post(
     ** path="/api/anggotaKeluarga",
     *   tags={"Anggota Keluarga"},
     *   summary="Tambah Anggota Keluarga",
     *   operationId="anggotaKeluarga",
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
     *      name="no_kk",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="nama",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="nik",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="jenis_kelamin",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="tanggal_lahir",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="date"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="pekerjaan",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="penghasilan",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="hubungan_difabel",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="keterangan",
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
            'id_formulir'     => 'required',
            'no_kk'     => 'required',
            'nama'     => 'required',
            'nik'     => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required',
            'pekerjaan'     => 'required',
            'penghasilan'     => 'required',
            'hubungan_difabel'     => 'required',
            'keterangan'     => 'required',
        ],
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = CDataAnggotaKeluarga::create([
                'id_formulir'     => $request->input('id_formulir'),
                'no_kk'     => $request->input('no_kk'),
                'nama'     => $request->input('nama'),
                'nik'     => $request->input('nik'),
                'jenis_kelamin'     => $request->input('jenis_kelamin'),
                'tanggal_lahir'     => $request->input('tanggal_lahir'),
                'pekerjaan'     => $request->input('pekerjaan'),
                'penghasilan'     => $request->input('penghasilan'),
                'hubungan_difabel'     => $request->input('hubungan_difabel'),
                'keterangan'     => $request->input('keterangan'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Anggota Keluarga Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Anggota Keluarga Gagal Disimpan!',
                ], 401);
            }
        }
    }

/**
 * @OA\Get(
 *     path="/api/anggotaKeluarga/{id}",
 *     tags={"Anggota Keluarga"},
 *     summary="Tapilkan Anggota Keluarga by ID",
 *     @OA\Parameter(
 *          name="id_anggota",
 *          in="query",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\Response(response="200", description="Data Anggota Keluarga Ditemukan.")
 * )
 **/

    public function show($id)
    {
        $get = CDataAnggotaKeluarga::where('id_formulir' , $id)->first();

        if ($get) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Anggota Keluarga',
                'data'    => $get
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Anggota Keluarga Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

/**
     * @OA\Post(
     ** path="/api/anggotaKeluarga/update",
     *   tags={"Anggota Keluarga"},
     *   summary="Update Anggota Keluarga",
     *
     *  @OA\Parameter(
     *      name="id_anggota",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="id_formulir",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="no_kk",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="nama",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="nik",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="jenis_kelamin",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="tanggal_lahir",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="date"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="pekerjaan",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="penghasilan",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="hubungan_difabel",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="keterangan",
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
            'id_anggota'     => 'required',
            'id_formulir'     => 'required',
            'no_kk'     => 'required',
            'nama'     => 'required',
            'nik'     => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required',
            'pekerjaan'     => 'required',
            'penghasilan'     => 'required',
            'hubungan_difabel'     => 'required',
            'keterangan'     => 'required',
        ],
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = CDataAnggotaKeluarga::where('id_anggota', $request->input('id_anggota'))->update([
                'id_formulir'     => $request->input('id_formulir'),
                'no_kk'     => $request->input('no_kk'),
                'nama'     => $request->input('nama'),
                'nik'     => $request->input('nik'),
                'jenis_kelamin'     => $request->input('jenis_kelamin'),
                'tanggal_lahir'     => $request->input('tanggal_lahir'),
                'pekerjaan'     => $request->input('pekerjaan'),
                'penghasilan'     => $request->input('penghasilan'),
                'hubungan_difabel'     => $request->input('hubungan_difabel'),
                'keterangan'     => $request->input('keterangan'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Anggota Keluarga Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Anggota Keluarga Diupdate!',
                ], 401);
            }

        }

    }
/**
 * @OA\Delete(
 *     path="/api/anggotaKeluarga/{id}",
 *     tags={"Anggota Keluarga"},
 *     summary="Hapus Anggota Keluarga",
 *     @OA\Parameter(
 *          name="id_anggota",
 *          in="query",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\Response(response="200", description="Data Anggota Keluarga Berhasil Dihapus.")
 * )
 **/
    public function destroy($id)
    {
        $post = CDataAnggotaKeluarga::where('id_anggota', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Data Anggota Keluarga Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Anggota Keluarga Gagal Dihapus!',
            ], 400);
        }

    }
}
