<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    public function home($cat = false)
    {
        if ($cat == false) {
            //nampilin semua berita
            $berita = DB::table('berita')
                ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
                ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
                ->orderByDesc('id_berita')
                ->get();
        } else {
            //nampilin semua berita
            $berita = DB::table('berita')
                ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
                ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
                ->where('kategori.nama_kategori', $cat)
                ->orderByDesc('id_berita')
                ->get();
        }
        //nyari kategori
        $kategori = DB::table('kategori')->get();

        //nampilin global news
        $beritaGlobal = DB::table('berita')
            ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
            ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
            ->inRandomOrder()
            ->first();

        $beritaRandom = DB::table('berita')
            ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
            ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
            ->inRandomOrder()
            ->first();

        //dd($beritaGlobal);
        return view('beranda', ['kategori' => $kategori, 'berita' => $berita, 'global' => $beritaGlobal, 'random' => $beritaRandom]);
    }

    public function kontak()
    {
        $beritaRandom = DB::table('berita')
            ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
            ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
            ->inRandomOrder()
            ->first();
        return view('kontak', ['random' => $beritaRandom]);
    }

    public function artikel($id)
    {
        $berita = DB::table('berita')
            ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
            ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
            ->where('id_berita', $id)
            ->first();

        $beritaBaru = DB::table('berita')
            ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
            ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
            ->orderByDesc('id_berita')
            ->limit('3')
            ->get();

        $beritaRandom = DB::table('berita')
            ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
            ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
            ->inRandomOrder()
            ->first();

        $beritaTrending = DB::table('berita')
            ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
            ->select('id_berita', 'judul_berita', 'penulis_berita', 'banner_berita', 'isi_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
            ->inRandomOrder()
            ->limit('3')
            ->get();

        return view('artikel', ['berita' => $berita, 'baru' => $beritaBaru, 'random' => $beritaRandom, 'trending' => $beritaTrending]);
    }
}
