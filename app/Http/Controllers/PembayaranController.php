<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Tagihan;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $admin = Admin::all();
        $transaksi = Tagihan::all();

        return view('user.transaksi', compact('admin', 'transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('user.invoice', compact('pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = Tagihan::all();

        return view('user.transaksi', compact('transaksi'));

        // return view('user.transaksi', compact('snapToken','pembayaran', 'tagihan'));
        // return redirect('user');
        // $pdf = Pembayaran::all();

        // $pdf = PDF::loadView('user.kwitansi', compact('pdf'));
        // return $pdf->download('pembayaran.pdf');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $transaksi = Tagihan::where('id_tagihan', $id)->first();
        $pelanggan = Pelanggan::where('id_pelanggan', $transaksi->id_pelanggan)->first();
        // foreach ($transaksi as $item) {
        //     $item->status = 'menunggu konfirmasi';
        //     $item->save();
        // }

        $total = $transaksi->jumlah_meter * $pelanggan->tarif->tarifperkwh;

        $pembayaran = Pembayaran::create([
            'id_tagihan' => $transaksi->id_tagihan,
            'id_pelanggan' => $transaksi->id_pelanggan,
            'tanggal_pembayaran' => \Carbon\Carbon::now(),
            'bulan_bayar' => \Carbon\Carbon::now()->format('M'),
            'biaya_admin' => '500',
            'total_bayar' => $total,
            'id_admin' => 0,

        ]);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaksi->id_tagihan,
                'gross_amount' => $total + $pembayaran->biaya_admin,
            ),
            'customer_details' => array(
                'username' => $pembayaran->pelanggan->username,

            ),
        );
        $snap = \Midtrans\Snap::getSnapToken($params);


        return view('user.transaksi', compact('transaksi', 'snap', 'pembayaran', 'pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $serverkey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverkey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Tagihan::find($request->order_id);
                $order->update(['status' => 'Menunggu konfirmasi']);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update($id_pembayaran)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembayaran)
    {
    }
}
