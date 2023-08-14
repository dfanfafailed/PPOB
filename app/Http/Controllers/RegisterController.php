<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $tarif = Tarif::all();
        return view('register',compact('tarif'));
    }

    public function store(Request $request)
    {
         
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nomor_kwh' => 'required',
            'nama_pelanggan' => 'required', 
            'alamat' => 'required',
            'id_tarif' => 'required',
        ]);
        $pelanggan = new Pelanggan([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nomor_kwh' => $request->nomor_kwh,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'id_tarif' => $request->id_tarif,
        ]);
        $pelanggan->save();
        return redirect('login')->with('succes', 'registrasi success');
    }
}
