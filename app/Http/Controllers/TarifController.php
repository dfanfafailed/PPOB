<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarif = Tarif::all();
      
        return view('admin.tarif.tarif', compact('tarif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tarif.tarif');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif = new Tarif();
        $tarif->daya = $request->input('daya');
        $tarif->tarifperkwh = $request->input('tarifperkwh');
        if($tarif->save()){
            return redirect('tarif');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarif $tarif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarif $idtarif)
    {
        $tarif = Tarif::find($idtarif);
        return view('admin.tarif.tarif', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idtarif)
    {
        $tarif = Tarif::find($idtarif);
        $tarif->daya = $request->input('daya');
        $tarif->tarifperkwh = $request->input('tarifperkwh');
        if($tarif->save()){
            return redirect('tarif');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idtarif)
    {
        $tarif = Tarif::find($idtarif);
        $tarif->delete();
        return redirect('tarif');
    }
}
