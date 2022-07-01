<?php

namespace App\Http\Controllers\api\v1;

use App\Models\BDisabilitas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BDisabilitasController extends Controller
{
    public function index()
    {
        $posts = BDisabilitas::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Detail Disabilitas',
            'data' => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'id_disabilitas'     => 'required',
            'id_tempat'   => 'required',
            'id_formulir'   => 'required',
            'ket_disabilitas'   => 'required',
            'penyebab_disabilitas'   => 'required',
            'diagnosa_sekarang'   => 'required',
            'penyakit_lain'   => 'required',
            'tempat_pengobatan'   => 'required',
            'pembantu_pengobatan'   => 'required',
            'kemampuan_sehari_hari'   => 'required',
            'kesulitan_sekarang'   => 'required',
            'alat_bantu'   => 'required',
            'jaminan_kesehatan'   => 'required',
            'jaminan_sosial'   => 'required',
        ],
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = BDisabilitas::create([
                'id_disabilitas'     => $request->input('id_disabilitas'),
                'id_tempat'   => $request->input('id_tempat'),
                'id_formulir'   => $request->input('id_formulir'),
                'ket_disabilitas'   => $request->input('ket_disabilitas'),
                'penyebab_disabilitas'   => $request->input('penyebab_disabilitas'),
                'diagnosa_sekarang'   => $request->input('diagnosa_sekarang'),
                'penyakit_lain'   => $request->input('penyakit_lain'),
                'tempat_pengobatan'   => $request->input('tempat_pengobatan'),
                'pembantu_pengobatan'   => $request->input('pembantu_pengobatan'),
                'kemampuan_sehari_hari'   => $request->input('kemampuan_sehari_hari'),
                'kesulitan_sekarang'   => $request->input('kesulitan_sekarang'),
                'alat_bantu'   => $request->input('alat_bantu'),
                'jaminan_kesehatan'   => $request->input('jaminan_kesehatan'),
                'jaminan_sosial'   => $request->input('jaminan_sosial'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Detail Disabilitas Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Detail Disabilitas Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $get = BDisabilitas::where('id_personal' , $id)->first();

        if ($get) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Detail Disabilitas',
                'data'    => $get
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Detail Disabilitas Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'id_disabilitas'     => 'required',
            'id_tempat'   => 'required',
            'id_formulir'   => 'required',
            'ket_disabilitas'   => 'required',
            'penyebab_disabilitas'   => 'required',
            'diagnosa_sekarang'   => 'required',
            'penyakit_lain'   => 'required',
            'tempat_pengobatan'   => 'required',
            'pembantu_pengobatan'   => 'required',
            'kemampuan_sehari_hari'   => 'required',
            'kesulitan_sekarang'   => 'required',
            'alat_bantu'   => 'required',
            'jaminan_kesehatan'   => 'required',
            'jaminan_sosial'   => 'required',
        ],
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = BDisabilitas::where('id_b_disabilitas', $request->input('id_b_disabilitas'))->update([
                'id_disabilitas'     => $request->input('id_disabilitas'),
                'id_tempat'   => $request->input('id_tempat'),
                'id_formulir'   => $request->input('id_formulir'),
                'ket_disabilitas'   => $request->input('ket_disabilitas'),
                'penyebab_disabilitas'   => $request->input('penyebab_disabilitas'),
                'diagnosa_sekarang'   => $request->input('diagnosa_sekarang'),
                'penyakit_lain'   => $request->input('penyakit_lain'),
                'tempat_pengobatan'   => $request->input('tempat_pengobatan'),
                'pembantu_pengobatan'   => $request->input('pembantu_pengobatan'),
                'kemampuan_sehari_hari'   => $request->input('kemampuan_sehari_hari'),
                'kesulitan_sekarang'   => $request->input('kesulitan_sekarang'),
                'alat_bantu'   => $request->input('alat_bantu'),
                'jaminan_kesehatan'   => $request->input('jaminan_kesehatan'),
                'jaminan_sosial'   => $request->input('jaminan_sosial'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Detail Disabilitas Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Detail Disabilitas Gagal Diupdate!',
                ], 401);
            }

        }

    }

    public function destroy($id)
    {
        $post = BDisabilitas::where('id_b_disabilitas', $id);
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

    public function destroyByFormulir($id)
    {
        $post = BDisabilitas::where('id_personal', $id);
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
