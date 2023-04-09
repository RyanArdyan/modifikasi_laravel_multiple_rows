<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class HomeController extends Controller
{
    // buat method index
    public function index()
    {
        // kembalikkan ke tampilan welcome
        return view('welcome');
    }

    // menyimpan data karyawan
    // $request berisi semua data yang dikirim lewat script ajax
    public function simpan(Request $request)
    {
        // berisi ambil value array nama yang didapatkan dari script, angapalh berisi ["Budi", "Andi"]
        // $nama = $permintaan->nama
        $nama = $request->nama;
        $pekerjaan = $request->pekerjaan;
        $alamat = $request->alamat;

        // lakukan pengulangan
        // selama 0 lebih kecil dari panjang value array nama maka lakukan pengulangan
        for ($i = 0; $i < count($nama); $i++) {
            // inisialisasi model karyawan
            $datas = new Karyawan();
            // misalnya column nama diisi array nama, index 0, index 1, dst.
            // column nama di table karyawan diisi $nama[$i]
            $datas->nama = $nama[$i];
            $datas->pekerjaan = $pekerjaan[$i];
            $datas->alamat = $alamat[$i];
            // datas disimpan
            $datas->save();
        };
    }
}
