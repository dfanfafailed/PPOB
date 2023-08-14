<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() 
    {
        $pelanggan = Pelanggan::all();
        $data = Pembayaran::all();
        return view('bank.pembayaran',compact('pelanggan','data'));
    }

    public function konfirmasi($id)
    {
        $adm = auth()->user()->id_admin;
        $konfirmasi = Tagihan::where('id_tagihan', $id)->first();        
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->first();        
        
        $pembayaran->id_admin = $adm;
        $konfirmasi->update([
            'status' => 'Lunas',
        ]);
        
        
        return redirect('/bank')->with('succes', 'Konfirmasi Berhasil');

    }
}
