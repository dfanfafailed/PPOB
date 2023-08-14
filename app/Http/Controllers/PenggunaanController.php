<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Penggunaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id_pelanggan;
        $penggunaan = Tagihan::all()->where('id_pelanggan',$id);
        $tagihan = Tagihan::where('id_pelanggan',$id)->get();
       
        return view('user.index', compact('penggunaan','tagihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $penggunaan = Penggunaan::all();
        $tagihan = Tagihan::find($request->id_penggunaan);

        $tagihan->id_pelanggan = $request->id_pelanggan;
        $tagihan->bulan = $penggunaan->bulan;
        $tagihan->tahun = $penggunaan->tahun;
        $tagihan->status = $request->status;
        $tagihan->jumlah_meter = $request->tagihan->jumlah_meter;

        if($tagihan->save()){
            return redirect('user');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penggunaan  $penggunaan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penggunaan  $penggunaan
     * @return \Illuminate\Http\Response
     */
    public function edit(penggunaan $penggunaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penggunaan  $penggunaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penggunaan $penggunaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penggunaan  $penggunaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penggunaan $penggunaan)
    {
        //
    }
}
