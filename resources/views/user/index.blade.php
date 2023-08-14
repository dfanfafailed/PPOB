@extends('partials.layout')
@section('nav')
@section('main')

{{-- section --}}
<section class="container py-5" id="beranda">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Selamat Datang {{ Auth::user()->username }} </h1>
            <p>
                Pahami petunjuk berikut.
            </p>
            <a href="#petunjuk" class="italic" data-bs-toggle="modal" data-bs-target="#langkah_langkah">Petunjuk</a>
        </div>
    </div>

    <div class="modal fade bg-white" id="langkah_langkah" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <div class="container">
                        <div class="card border-0">
                            <h4>Ikuti langkah langkah berikut ini:</h4>
                            <div class="card-body bg-light">
                                <p class="fw-bold">1. Siapkan id Anda</p>
                                <p class="fw-bold">2. Cek tagihan bulan ini</p>
                                <p class="fw-bold">3. Masuk ke halaman pembayaran</p>
                                <p class="fw-bold">4. Masukan id anda</p>
                                <p class="fw-bold">5. Pilih tagihan yang akan dibayar</p>
                                <p class="fw-bold">6. Tertib</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{-- <div class="row">
      <div class="col-12 col-md-4 p-5 mt-3">
          <a href="#"><img src="./assets/img/category_img_01.jpg" class="rounded-circle img-fluid border"></a>
          <h5 class="text-center mt-3 mb-3">Watches</h5>
          <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
      </div>
      <div class="col-12 col-md-4 p-5 mt-3">
          <a href="#"><img src="./assets/img/category_img_02.jpg" class="rounded-circle img-fluid border"></a>
          <h2 class="h5 text-center mt-3 mb-3">Shoes</h2>
          <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
      </div>
      <div class="col-12 col-md-4 p-5 mt-3">
          <a href="#"><img src="./assets/img/category_img_03.jpg" class="rounded-circle img-fluid border"></a>
          <h2 class="h5 text-center mt-3 mb-3">Accessories</h2>
          <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
      </div>
  </div> --}}
</section>

{{-- tagihan --}}
<section class="bg-light" id="tagihan">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1 ">Tagihan</h1>
            </div>
        </div>
        <h6>Nama : {{ Auth::user()->username }}</h6>
        <h6>Alamat : {{ Auth::user()->alamat }}</h6>
        <div class="col-md-auto grid-margin stretch-card">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" width="100%" cellspacing="">
                    <div class="border">
                        <thead>
                            <tr>
                                <th>Id Pelanggan</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Meter Awal</th>
                                <th>Meter Akhir</th>
                                <th>Status</th>
                                {{-- <th>Bukti Bayar</th> --}}
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($tagihan as $item)
                            <tr>
                                <td>{{ $item->id_pelanggan}}</td>
                                <td>{{ $item->bulan }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->penggunaan->meter_awal }}</td>
                                <td>{{ $item->penggunaan->meter_akhir }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    {{-- @if ($item->status == 'menunggu konfirmasi')
                          <a href="{{ route('kwitansi', $item->id_pembayaran) }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-printer-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                        <path
                                            d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    </svg>
                                    Kwitansi
                                    </a>
                                    @else
                                    <button type="submit" class="btn btn-success mt-2">Bayar</button>
                                    @endif --}}
                                    @if ($item->status == 'Lunas')
                                    <span>
                                        <h5>Selesai</h5>
                                    </span>
                                    @else
                                    <a href="{{ route('pembayaran.show',$item->id_tagihan) }}"
                                        class="btn btn-primary btn-rounded btn-sm">Bayar</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </div>
            </div>
        </div>
        @endforeach
        </table>
    </div>
</section>


{{-- Riwayat --}}
<section id="riwayat_pembayaran">
    <div class="container py-5">
        <div class="row text-center py-3">
            <h1 class="h1">Riwayat Pembayaran</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No Tagihan</th>
                        {{-- <th>No Pembayaran</th> --}}
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jumlah Meter</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($penggunaan as $item)
                        <td>{{ $item->id_tagihan }}</td>
                        {{-- <td>{{ $item->pembayaran->id_pembayaran }}</td> --}}
                        @foreach ($item->pelanggan as $pel)
                        <td>{{ $pel->username }}</td>
                        <td>{{ $pel->alamat }}</td>
                        @endforeach
                        <td>{{ $item->jumlah_meter}}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</section>

<footer class="bg-dark">
    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-center text-light">
                        Copyright &copy; 2023 daffa van djafa
                        | Designed by daffaa
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

@include('partials.script')
@endsection
@endsection
