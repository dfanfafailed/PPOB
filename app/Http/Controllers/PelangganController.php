<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tagihan;
use Barryvdh\DomPDF\PDF;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {

        $pelanggan = Pelanggan::count();
        return view('admin.beranda.index', compact('pelanggan'));

    }

    public function index()
    {
        $pelanggan = Pelanggan::all();
      
        return view('admin.pelanggan.pelanggan', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelanggan.pelanggan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelanggan = new Pelanggan();
        // $pelanggan->username = $request->input('username');
        // $pelanggan->password = $request->input('password');
        $pelanggan->nomor_kwh = $request->input('nomor_kwh');
        $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->id_tarif = $request->input('id_tarif');
        if($pelanggan->save()){
            return redirect('pelanggan');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $idpel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $idpel)
    {
        $pel = Pelanggan::find($idpel);
        return view('admin.pelanggan.pelanggan', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idpel)
    {
        $pelanggan = Pelanggan::find($idpel);
        // $pelanggan->username = $request->input('username');
        // $pelanggan->password = $request->input('password');
        $pelanggan->nomor_kwh = $request->input('nomor_kwh');
        $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->id_tarif = $request->input('id_tarif');
        if($pelanggan->save()){
            return redirect('pelanggan');
        } else {
            return redirect()->back();
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
        $p = Pelanggan::find($id);
        $p->delete();
        return redirect('pelanggan');
        }
    }
    public function cetakPelanggan()
    {
        $data = Pelanggan::all();
        return view('admin.pelanggan.cetak-pelanggan',compact('data'));

    }
}
