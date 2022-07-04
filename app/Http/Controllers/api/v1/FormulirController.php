<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormulirController extends Controller
{
    //Formulir
    public function cek()
    {
        return "masuk Folmulir";
    }
    public function index()
    {
        $posts = Formulir::first()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Posts',
            'data' => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'id_formulir' => 'required',
                'id_kecamatan' => 'required',
                'tanggal_pendataan' => 'required',
                'petugas_pendataan' => 'required',
                'instansi' => 'required',
                'no_telepon' => 'required',
                'catatan' => 'required',
                'foto' => 'required',
                'petugas_verifikasi' => 'required',
                'tanggal_verifikasi' => 'required',
                'tahun' => 'required',
                'disabilitas' => 'required',
                'id_personal' => 'required',
                'pekerjaan' => 'required',
                'jenis_pekerjaan' => 'required',
                'alasan_tdk_bekerja' => 'required',
                'pendapatan' => 'required',
                'pengeluaran' => 'required',
                'pendapatan_lain' => 'required',
                'jml_pendapatan_lain' => 'required',
                'minat_kerja' => 'required',
                'keterampilan' => 'required',
                'pelatihan_diikuti' => 'required',
                'pelatihan_diminati' => 'required',
                'status_rumah' => 'required',
                'lantai' => 'required',
                'kamar_mandi' => 'required',
                'akses_rumah' => 'required',
                'dinding' => 'required',
                'sumber_air' => 'required',
                'penerangan' => 'required',
                'paud' => 'required',
                'tk' => 'required',
                'slb' => 'required',
                'sd_abk' => 'required',
                'smp_abk' => 'required',
                'sma_smk_abk' => 'required',
                'daftar_sma_smk' => 'required',
                'jml_posyandu_desa' => 'required',
                'posyandu_rutin' => 'required',
                'layanan_kesehatan_desa' => 'required',
                'tingkat_sosialisasi' => 'required',
                'keterlibatan_ormas' => 'required',
                'kegiatan_diikuti' => 'required',
                'keterlibatan_musrenbang' => 'required',
                'waktu_musrenbang' => 'required',
                'alat_bantu' => 'required',
                'modal_usaha' => 'required',
                'peralatan_uep' => 'required',
                'bantuan_lainnya' => 'required'
            ],
            [
                'id_formulir.required' => 'Masukkan id Post !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::create([
                'id_formulir' => $request->input('id_formulir'),
                'id_kecamatan' => $request->input('id_kecamatan'),
                'tanggal_pendataan' => $request->input('tanggal_pendataan'),
                'petugas_pendataan' => $request->input('petugas_pendataan'),
                'instansi' => $request->input('instansi'),
                'no_telepon' => $request->input('no_telepon'),
                'catatan' => $request->input('catatan'),
                'foto' => $request->input('foto'),
                'petugas_verifikasi' => $request->input('petugas_verifikasi'),
                'tanggal_verifikasi' => $request->input('tanggal_verifikasi'),
                'tahun' => $request->input('tahun'),
                'disabilitas' => $request->input('disabilitas'),
                'id_personal' => $request->input('id_personal'),
                'pekerjaan' => $request->input('pekerjaan'),
                'jenis_pekerjaan' => $request->input('jenis_pekerjaan'),
                'alasan_tdk_bekerja' => $request->input('alasan_tdk_bekerja'),
                'pendapatan' => $request->input('pendapatan'),
                'pengeluaran' => $request->input('pengeluaran'),
                'pendapatan_lain' => $request->input('pendapatan_lain'),
                'jml_pendapatan_lain' => $request->input('jml_pendapatan_lain'),
                'minat_kerja' => $request->input('minat_kerja'),
                'keterampilan' => $request->input('keterampilan'),
                'pelatihan_diikuti' => $request->input('pelatihan_diikuti'),
                'pelatihan_diminati' => $request->input('pelatihan_diminati'),
                'status_rumah' => $request->input('status_rumah'),
                'lantai' => $request->input('lantai'),
                'kamar_mandi' => $request->input('kamar_mandi'),
                'akses_rumah' => $request->input('akses_rumah'),
                'dinding' => $request->input('dinding'),
                'sumber_air' => $request->input('sumber_air'),
                'penerangan' => $request->input('penerangan'),
                'paud' => $request->input('paud'),
                'tk' => $request->input('tk'),
                'slb' => $request->input('slb'),
                'sd_abk' => $request->input('sd_abk'),
                'smp_abk' => $request->input('smp_abk'),
                'sma_smk_abk' => $request->input('sma_smk_abk'),
                'daftar_sma_smk' => $request->input('daftar_sma_smk'),
                'jml_posyandu_desa' => $request->input('jml_posyandu_desa'),
                'posyandu_rutin' => $request->input('posyandu_rutin'),
                'layanan_kesehatan_desa' => $request->input('layanan_kesehatan_desa'),
                'tingkat_sosialisasi' => $request->input('tingkat_sosialisasi'),
                'keterlibatan_ormas' => $request->input('keterlibatan_ormas'),
                'kegiatan_diikuti' => $request->input('kegiatan_diikuti'),
                'keterlibatan_musrenbang' => $request->input('keterlibatan_musrenbang'),
                'waktu_musrenbang' => $request->input('waktu_musrenbang'),
                'alat_bantu' => $request->input('alat_bantu'),
                'modal_usaha' => $request->input('modal_usaha'),
                'peralatan_uep' => $request->input('peralatan_uep'),
                'bantuan_lainnya' => $request->input('bantuan_lainnya')
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

    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'id_formulir' => 'required',
                'id_kecamatan' => 'required',
                'tanggal_pendataan' => 'required',
                'petugas_pendataan' => 'required',
                'instansi' => 'required',
                'no_telepon' => 'required',
                'catatan' => 'required',
                'foto' => 'required',
                'petugas_verifikasi' => 'required',
                'tanggal_verifikasi' => 'required',
                'tahun' => 'required',
                'disabilitas' => 'required',
                'id_personal' => 'required',
                'pekerjaan' => 'required',
                'jenis_pekerjaan' => 'required',
                'alasan_tdk_bekerja' => 'required',
                'pendapatan' => 'required',
                'pengeluaran' => 'required',
                'pendapatan_lain' => 'required',
                'jml_pendapatan_lain' => 'required',
                'minat_kerja' => 'required',
                'keterampilan' => 'required',
                'pelatihan_diikuti' => 'required',
                'pelatihan_diminati' => 'required',
                'status_rumah' => 'required',
                'lantai' => 'required',
                'kamar_mandi' => 'required',
                'akses_rumah' => 'required',
                'dinding' => 'required',
                'sumber_air' => 'required',
                'penerangan' => 'required',
                'paud' => 'required',
                'tk' => 'required',
                'slb' => 'required',
                'sd_abk' => 'required',
                'smp_abk' => 'required',
                'sma_smk_abk' => 'required',
                'daftar_sma_smk' => 'required',
                'jml_posyandu_desa' => 'required',
                'posyandu_rutin' => 'required',
                'layanan_kesehatan_desa' => 'required',
                'tingkat_sosialisasi' => 'required',
                'keterlibatan_ormas' => 'required',
                'kegiatan_diikuti' => 'required',
                'keterlibatan_musrenbang' => 'required',
                'waktu_musrenbang' => 'required',
                'alat_bantu' => 'required',
                'modal_usaha' => 'required',
                'peralatan_uep' => 'required',
                'bantuan_lainnya' => 'required'
            ],
            [
                'id_formulir.required' => 'Masukkan no formulir',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id'))->update([
                'id_kecamatan' => $request->input('id_kecamatan'),
                'tanggal_pendataan' => $request->input('tanggal_pendataan'),
                'petugas_pendataan' => $request->input('petugas_pendataan'),
                'instansi' => $request->input('instansi'),
                'no_telepon' => $request->input('no_telepon'),
                'catatan' => $request->input('catatan'),
                'foto' => $request->input('foto'),
                'petugas_verifikasi' => $request->input('petugas_verifikasi'),
                'tanggal_verifikasi' => $request->input('tanggal_verifikasi'),
                'tahun' => $request->input('tahun'),
                'disabilitas' => $request->input('disabilitas'),
                'id_personal' => $request->input('id_personal'),
                'pekerjaan' => $request->input('pekerjaan'),
                'jenis_pekerjaan' => $request->input('jenis_pekerjaan'),
                'alasan_tdk_bekerja' => $request->input('alasan_tdk_bekerja'),
                'pendapatan' => $request->input('pendapatan'),
                'pengeluaran' => $request->input('pengeluaran'),
                'pendapatan_lain' => $request->input('pendapatan_lain'),
                'jml_pendapatan_lain' => $request->input('jml_pendapatan_lain'),
                'minat_kerja' => $request->input('minat_kerja'),
                'keterampilan' => $request->input('keterampilan'),
                'pelatihan_diikuti' => $request->input('pelatihan_diikuti'),
                'pelatihan_diminati' => $request->input('pelatihan_diminati'),
                'status_rumah' => $request->input('status_rumah'),
                'lantai' => $request->input('lantai'),
                'kamar_mandi' => $request->input('kamar_mandi'),
                'akses_rumah' => $request->input('akses_rumah'),
                'dinding' => $request->input('dinding'),
                'sumber_air' => $request->input('sumber_air'),
                'penerangan' => $request->input('penerangan'),
                'paud' => $request->input('paud'),
                'tk' => $request->input('tk'),
                'slb' => $request->input('slb'),
                'sd_abk' => $request->input('sd_abk'),
                'smp_abk' => $request->input('smp_abk'),
                'sma_smk_abk' => $request->input('sma_smk_abk'),
                'daftar_sma_smk' => $request->input('daftar_sma_smk'),
                'jml_posyandu_desa' => $request->input('jml_posyandu_desa'),
                'posyandu_rutin' => $request->input('posyandu_rutin'),
                'layanan_kesehatan_desa' => $request->input('layanan_kesehatan_desa'),
                'tingkat_sosialisasi' => $request->input('tingkat_sosialisasi'),
                'keterlibatan_ormas' => $request->input('keterlibatan_ormas'),
                'kegiatan_diikuti' => $request->input('kegiatan_diikuti'),
                'keterlibatan_musrenbang' => $request->input('keterlibatan_musrenbang'),
                'waktu_musrenbang' => $request->input('waktu_musrenbang'),
                'alat_bantu' => $request->input('alat_bantu'),
                'modal_usaha' => $request->input('modal_usaha'),
                'peralatan_uep' => $request->input('peralatan_uep'),
                'bantuan_lainnya' => $request->input('bantuan_lainnya')
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function destroy($id)
    {
        $post = Formulir::where('id_formulir', $id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Dihapus!',
            ], 400);
        }
    }

    public function show($id)
    {
        $get = Formulir::where('id_formulir', $id)->first();

        if ($get) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Formulir',
                'data'    => $get
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Formulir Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function updateFormulir(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'id_formulir' => 'required',
                'id_kecamatan' => 'required',
                'tanggal_pendataan' => 'required',
                'petugas_pendataan' => 'required',
                'instansi' => 'required',
                'no_telepon' => 'required',
                'catatan' => 'required',
                'foto' => 'required',
                'petugas_verifikasi' => 'required',
                'tanggal_verifikasi' => 'required',
                'tahun' => 'required',
            ],
            [
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id_formulir'))->update([
                'id_kecamatan' => $request->input('id_kecamatan'),
                'tanggal_pendataan' => $request->input('tanggal_pendataan'),
                'petugas_pendataan' => $request->input('petugas_pendataan'),
                'instansi' => $request->input('instansi'),
                'no_telepon' => $request->input('no_telepon'),
                'catatan' => $request->input('catatan'),
                'foto' => $request->input('foto'),
                'petugas_verifikasi' => $request->input('petugas_verifikasi'),
                'tanggal_verifikasi' => $request->input('tanggal_verifikasi'),
                'tahun' => $request->input('tahun'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function updateEkonomi(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'id_formulir' => 'required',
                'pekerjaan' => 'required',
                'jenis_pekerjaan' => 'required',
                'alasan_tdk_bekerja' => 'required',
                'pendapatan' => 'required',
                'pengeluaran' => 'required',
                'pendapatan_lain' => 'required',
                'jml_pendapatan_lain' => 'required',
                'minat_kerja' => 'required',
                'keterampilan' => 'required',
                'pelatihan_diikuti' => 'required',
                'pelatihan_diminati' => 'required',
            ],
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id_formulir'))->update([
                'pekerjaan' => $request->input('pekerjaan'),
                'jenis_pekerjaan' => $request->input('jenis_pekerjaan'),
                'alasan_tdk_bekerja' => $request->input('alasan_tdk_bekerja'),
                'pendapatan' => $request->input('pendapatan'),
                'pengeluaran' => $request->input('pengeluaran'),
                'pendapatan_lain' => $request->input('pendapatan_lain'),
                'jml_pendapatan_lain' => $request->input('jml_pendapatan_lain'),
                'minat_kerja' => $request->input('minat_kerja'),
                'keterampilan' => $request->input('keterampilan'),
                'pelatihan_diikuti' => $request->input('pelatihan_diikuti'),
                'pelatihan_diminati' => $request->input('pelatihan_diminati'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function updateKondisiRumah(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'status_rumah' => 'required',
                'lantai' => 'required',
                'kamar_mandi' => 'required',
                'akses_rumah' => 'required',
                'dinding' => 'required',
                'sumber_air' => 'required',
                'penerangan' => 'required',
                'id_formulir' => 'required',
            ],
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id_formulir'))->update([
                'status_rumah' => $request->input('status_rumah'),
                'lantai' => $request->input('lantai'),
                'kamar_mandi' => $request->input('kamar_mandi'),
                'akses_rumah' => $request->input('akses_rumah'),
                'dinding' => $request->input('dinding'),
                'sumber_air' => $request->input('sumber_air'),
                'penerangan' => $request->input('penerangan'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function updateLingkunganSosial(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'paud' => 'required',
                'tk' => 'required',
                'slb' => 'required',
                'sd_abk' => 'required',
                'smp_abk' => 'required',
                'sma_smk_abk' => 'required',
                'daftar_sma_smk' => 'required',
                'jml_posyandu_desa' => 'required',
                'posyandu_rutin' => 'required',
                'layanan_kesehatan_desa' => 'required',
            ],
            [
                'paud' => 'Masukkan paud',
            ]
        );
        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id'))->update([
                'penerangan' => $request->input('penerangan'),
                'paud' => $request->input('paud'),
                'tk' => $request->input('tk'),
                'slb' => $request->input('slb'),
                'sd_abk' => $request->input('sd_abk'),
                'smp_abk' => $request->input('smp_abk'),
                'sma_smk_abk' => $request->input('sma_smk_abk'),
                'daftar_sma_smk' => $request->input('daftar_sma_smk'),
                'jml_posyandu_desa' => $request->input('jml_posyandu_desa'),
                'posyandu_rutin' => $request->input('posyandu_rutin'),
                'layanan_kesehatan_desa' => $request->input('layanan_kesehatan_desa'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function updatePartisipasiSosial(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tingkat_sosialisasi' => 'required',
                'keterlibatan_ormas' => 'required',
                'kegiatan_diikuti' => 'required',
                'keterlibatan_musrenbang' => 'required',
                'waktu_musrenbang' => 'required',
            ],
            [
                'tingkat_sosialisasi' => 'Masukkan tingkat sosialisasi',
            ]
        );
        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id'))->update([
                'tingkat_sosialisasi' => $request->input('tingkat_sosialisasi'),
                'keterlibatan_ormas' => $request->input('keterlibatan_ormas'),
                'kegiatan_diikuti' => $request->input('kegiatan_diikuti'),
                'keterlibatan_musrenbang' => $request->input('keterlibatan_musrenbang'),
                'waktu_musrenbang' => $request->input('waktu_musrenbang'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function updateBantuanSosial(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'alat_bantu' => 'required',
                'modal_usaha' => 'required',
                'peralatan_uep' => 'required',
                'bantuan_lainnya' => 'required',
            ],
            [
                'alat_bantu' => 'Masukkan data dengan lengkap',
            ]
        );
        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id'))->update([
                'alat_bantu' => $request->input('alat_bantu'),
                'modal_usaha' => $request->input('modal_usaha'),
                'peralatan_uep' => $request->input('peralatan_uep'),
                'bantuan_lainnya' => $request->input('bantuan_lainnya'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function updateLainLain(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'keahlian' => 'required',
                'prestasi' => 'required',
                'kontak_darurat' => 'required',
                'rehabilitas' => 'required',
            ],
            [
                'keahlian' => 'Masukkan data dengan lengkap',
            ]
        );
        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id'))->update([
                'keahlian' => $request->input('alat_bantu'),
                'prestasi' => $request->input('modal_usaha'),
                'kontak_darurat' => $request->input('kontak_darurat'),
                'disabilitas' => $request->input('disabilitas'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function catatan(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'catatan' => 'required'
            ],
            [
                'catatan' => 'Catatan harus diisi'
            ]
        );
        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id'))->update([
                'catatan' => $request->input('catatan'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function foto(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => 'required'
            ],
            [
                'foto' => 'Catatan harus diisi'
            ]
        );
        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Formulir::where('id_formulir', $request->input('id'))->update([
                'foto' => $request->input('foto'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diupdate!',
                ], 401);
            }
        }
    }
}
