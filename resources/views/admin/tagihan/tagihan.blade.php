@extends('assets/nav')

@section('navbar')
<div class="col-md-auto grid-margin stretch-card"> 
    <div class="card shadow ">
      <div class="card-body">
        <h4 class="card-title">Tambah Tagihan</h4>
        <div class="table-responsive">
          <table class="table table-hover" width="100%" cellspacing="">
            <thead>
              <tr>
              <th>No. Pelanggan</th>
              <th>Nama Pelanggan</th>
              <th>Alamat</th>
              <th>No. KWH</th>
              <th>Opsi</th>
            </tr>
            </thead>
            @foreach ($pelanggan as $p)
            <tbody>
              <tr>
              <td>{{ $p->id_pelanggan }}</td>    
              <td>{{ $p->nama_pelanggan }}</td>    
              <td>{{ $p->alamat }}</td>    
              <td>{{ $p->nomor_kwh }}</td>
              <td>
                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#Tagihan{{ $p->id_pelanggan }}">
                  Tambah Tagihan
                 </button>
              </td>
            </tr>
            
          </tbody>
        </div>
      </div>
    </div>
</div>

 <div class="modal fade" id="Tagihan{{ $p->id_pelanggan }}" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg " role="document">
       <div class="modal-content">
       <div class="modal-header">
         <h5 class="mdal-title">Masukan Tagihan </h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
   </div>
   <div class="card ">
     <div class="card-body">
       <form class="forms-sample " action="{{ route('tagihan.store') }}" method="POST">
         @csrf
         <input type="hidden" value="{{ $p->id_pelanggan  }}" name="id_pelanggan">
         <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ $p->nama_pelanggan }}">
        </div>

          <div class="form-group">
            <label for="awal">Meter Awal </label>
            <input type="number" class="form-control" id="awal" name="meter_awal">
          </div>

          <div class="form-group">
            <label for="akhir">Meter Akhir</label>
            <input type="number" class="form-control" id="akhir" name="meter_akhir">
          </div>

            <button type="submit" class="btn btn-primary mr-2">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</table>


@endsection