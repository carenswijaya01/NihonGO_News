<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Admin extends Controller
{
    public function beranda()
    {
        return view('welcome');
    }

    /*=================================================================      CONTROLLER ADMIN -> BERITA      =================================================================*/
    public function lihat_berita()
    {
        $berita = DB::table('berita')
            ->join('kategori', 'kategori_berita', '=', 'kategori.id_kategori')
            ->select('id_berita', 'judul_berita', 'penulis_berita', 'kategori.nama_kategori as kategori_berita', 'tanggal_berita')
            ->get();

        //dd($berita);
        return view('admin.lihat_berita', ['berita' => $berita]);
    }
    public function simpan_berita(Request $req)
    {
        if ($req->hasFile('banner_berita')) {
            $image      = $req->file('banner_berita');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put('img' . '/' . $fileName, $image, 'public');
            $destinationPath = public_path() . '/img';
            $image->move($destinationPath, $fileName);

            if ($req->aksi == "tambah") {
                DB::table('berita')->insert([
                    'judul_berita' => $req->judul_berita,
                    'tanggal_berita' => $req->tanggal_berita,
                    'penulis_berita' => $req->penulis_berita,
                    'banner_berita' => $fileName,
                    'isi_berita' => $req->isi_berita,
                    'kategori_berita' => $req->kategori_berita
                ]);
            } else if ($req->aksi == "ubah") {
                DB::table('berita')->where('id_berita', $req->id)->update([
                    'judul_berita' => $req->judul_berita,
                    'tanggal_berita' => $req->tanggal_berita,
                    'penulis_berita' => $req->penulis_berita,
                    'banner_berita' => $fileName,
                    'isi_berita' => $req->isi_berita,
                    'kategori_berita' => $req->kategori_berita
                ]);
            }
        } else {
            if ($req->aksi == "ubah") {
                DB::table('berita')->where('id_berita', $req->id)->update([
                    'judul_berita' => $req->judul_berita,
                    'tanggal_berita' => $req->tanggal_berita,
                    'penulis_berita' => $req->penulis_berita,
                    'isi_berita' => $req->isi_berita,
                    'kategori_berita' => $req->kategori_berita
                ]);
            }
        }

        return redirect('/admin/berita');
    }
    public function edit_berita($id)
    {
        //dd(DB::table('berita')->where('id_berita', $id)->get());
        return view('admin.edit_berita', ['berita' => DB::table('berita')->where('id_berita', $id)->get(), 'kategori' => DB::table('kategori')->get()]);
    }

    public function delete_berita($id)
    {
        DB::table('berita')->where('id_berita', $id)->delete();

        return redirect('/admin/berita');
    }

    /*=================================================================      CONTROLLER ADMIN -> KATEGORI      =================================================================*/
    public function lihat_kategori()
    {
        return view('admin.lihat_kategori', ['kategori' => DB::table('kategori')->get()]);
    }

    public function simpan_kategori(Request $req)
    {
        if ($req->aksi == "tambah") {
            DB::table('kategori')->insert([
                'nama_kategori' => $req->nama_kategori,
                'keterangan' => $req->keterangan,
            ]);
        } else if ($req->aksi == "ubah") {
            DB::table('kategori')->where('id_kategori', $req->id)->update([
                'nama_kategori' => $req->nama_kategori,
                'keterangan' => $req->keterangan,
            ]);
        }
        return redirect('/admin/kategori');
    }

    public function edit_kategori($id)
    {
        //dd(DB::table('kategori')->where('id_kategori', $id)->get());
        return view('admin.edit_kategori', ['kategori' => DB::table('kategori')->where('id_kategori', $id)->get()]);
    }

    public function delete_kategori($id)
    {
        DB::table('kategori')->where('id_kategori', $id)->delete();

        return redirect('/admin/kategori');
    }
}
