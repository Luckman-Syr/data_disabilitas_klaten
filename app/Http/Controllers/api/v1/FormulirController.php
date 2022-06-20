<?php


namespace App\Http\Controllers\api\v1;

use App\Models\Formulir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormulirController extends Controller
{
    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'no_formulir'     => 'required',
            'id_kecamatan'   => 'required',
            // 'petugas_pendataan'   => 'required',
            // 'instansi'   => 'required',
        ],
            [
                'no_formulir.required' => 'Masukkan  nomor formulir Post !',
                'id_kecamatan.required' => 'Masukkan id kecamatan Post !',
                // 'petugas_pendataan'   => 'Nama petugas',
                // 'instansi'   => 'Instansi',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Formulir::create([
                'no_formulir'     => $request->input('no_formulir'),
                'id_kecamatan'   => $request->input('id_kecamatan'),
                // 'petugas_pendataan'   => $request->input('petugas_pendataan'),
                // 'instansi'   => $request->input('instansi')
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 401);
            }
        }
    }
}
