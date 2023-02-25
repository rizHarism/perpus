<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Koleksi;
use App\Models\Binaan\KondisiUmum;
use App\Models\Binaan\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatistikController extends Controller
{
    //
    public function koleksi()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $koleksi = Koleksi::where('perpustakaan_id', $user_id)->first();
        // $koleksi_tahun_lalu = Koleksi::where('perpustakaan_id', $user_id)->where('tahun', date("Y") - 2)->first();
        // dd($koleksi_tahun_lalu);
        return view('binaan.statistik.koleksi.index', [
            // 'koleksi_judul' => $koleksi_judul
            'pelajaran_judul' => $koleksi->buku_pelajaran_judul,
            'panduan_judul' => $koleksi->buku_panduan_judul,
            'fiksi_judul' => $koleksi->buku_fiksi_judul,
            'non_fiksi_judul' => $koleksi->buku_non_fiksi_judul,
            'referensi_judul' => $koleksi->buku_referensi_judul,
            'guru_judul' => $koleksi->karya_guru_judul,
            'siswa_judul' => $koleksi->karya_siswa_judul,
            'pelajaran_eksemplar' => $koleksi->buku_pelajaran_eksemplar,
            'panduan_eksemplar' => $koleksi->buku_panduan_eksemplar,
            'fiksi_eksemplar' => $koleksi->buku_fiksi_eksemplar,
            'non_fiksi_eksemplar' => $koleksi->buku_non_fiksi_eksemplar,
            'referensi_eksemplar' => $koleksi->buku_referensi_eksemplar,
            'guru_eksemplar' => $koleksi->karya_guru_eksemplar,
            'siswa_eksemplar' => $koleksi->karya_siswa_eksemplar,
            'sumber_belajar' => $koleksi->koran_judul + $koleksi->majalah_judul + $koleksi->kaset + $koleksi->cd + $koleksi->vcd + $koleksi->dvd + $koleksi->multimedia_lain + $koleksi->atlas + $koleksi->peta + $koleksi->globe + $koleksi->karto_lain + $koleksi->peraga_matematika + $koleksi->peraga_ipa + $koleksi->peraga_lain,
        ]);
    }

    public function layanan()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $layanan = Layanan::where('perpustakaan_id', $user_id)->first();
        $data = KondisiUmum::where('perpustakaan_id', $user_id)->first();
        // dd($layanan->peminjam_guru_laki);
        return view('binaan.statistik.layanan.index', [
            'siswa' => $data->siswa_l + $data->siswa_p,
            'guru' => $data->staff_l + $data->staff_p,
            'pengunjung_siswa' => $layanan->pengunjung_siswa_laki + $layanan->pengunjung_siswa_perempuan,
            'peminjam_siswa' => $layanan->peminjam_siswa_laki + $layanan->peminjam_siswa_perempuan,
            'pengunjung_guru' => $layanan->pengunjung_guru_laki + $layanan->pengunjung_guru_perempuan,
            'peminjam_guru' => $layanan->peminjam_guru_laki + $layanan->peminjam_guru_perempuan,
        ]);
    }
}
