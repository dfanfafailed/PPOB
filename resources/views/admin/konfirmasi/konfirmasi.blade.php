@extends('assets.nav')
@section('navbar')
<div class="card shadow ">
    <div class="card-body">
      <h4 class="card-title">Konfirmasi Pembayaran</h4>
      <div class="table-responsive">
        <table class="table table-hover table-bordered" width="100%" cellspacing="">
          <thead>
            <tr>
            {{-- <th>No. Pelanggan</th> --}}
            <th>No. Pembayaran</th>
            <th>No. Tagihan</th>
            <th>Nama Pelanggan</th>
            <th>Jumlah Meter</th>
            <th>Status</th>
            <th>Total Bayar</th>
            <th>Opsi</th>
          </tr>
          </thead>
          @foreach ($pembayaran as $trk)
          <tbody>
            <tr>
            {{-- <td>{{ $trk->id_pelanggan }}</td>     --}}
            <td>{{ $trk->id_pembayaran }}</td>    
            <td>{{ $trk->id_tagihan }}</td>    
            <td>{{ $trk->pelanggan->nama_pelanggan }}</td>    
            <td>{{ $trk->tagihan->jumlah_meter }}</td>    
            <td>{{ $trk->tagihan->status }}</td>    
            <td>{{ $trk->total_bayar }}</td>    
            <td>
                @if ($trk->tagihan->status == 'Lunas')
                    <span><h4>Selesai</h4></span>
                @else
                    <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#Konfirmasi{{ $trk->id_tagihan }}">
                        Konfirmasi
                    </button>
                @endif
              
            </td>
          </tr>
          
        </tbody>

          <div class="modal fade" id="Konfirmasi{{ $trk->id_tagihan }}" tabindex="-1" aria-labelledby="Konfirmasi" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="text-center">Konfirmasi pelanggan ini? :
                            <span>{{ $trk->pelanggan->nama_pelanggan }}</span>
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <form class="forms-sample" action="{{ route('konfirmasi-pembayaran', $trk->id_tagihan ) }}" method="POST">
                            @csrf
                            @method('POST')
                        <button type="submit" class="btn btn-primary" >OK</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
  @endforeach

  @endsection

