@extends('partials.layout')
@section('nav')
@section('main')
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-3 bg-white rounded">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text-uppercase">Invoice</h1>
                        {{-- <div class="billed"><span class="font-weight-bold text-uppercase">Billed:</span><span class="ml-1">Jasper Kendrick</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Date:</span><span class="ml-1">May 13, 2020</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Order ID:</span><span class="ml-1">#1345345</span></div> --}}
                    </div>
                    <div class="col-md-6 text-right mt-3">
                        <h4 class="text-danger mb-0">{{ Auth::user()->username }}</h4>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id tagihan</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jumlah Meter</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayaran as $item)
                                <tr>
                                    <td>{{ $item->id_pembayaran }}</td>
                                    <td>{{ $item->pelanggan->username }}</td>
                                    <td>{{ $item->pelanggan->alamat }}</td>
                                    <td>{{ $item->tagihan->jumlah_meter }}</td>
                                    <td>{{ $item->total_bayar }}</td>
                                    <td>{{ $item->tagihan->total_bayar }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
@endsection