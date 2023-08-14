@extends('assets/nav')

@section('navbar')

<div class="col-md-auto grid-margin stretch-card">
    <div class="card shadow ">
        <div class="card-body">
            <h4 class="card-title">Data pelanggan</h4>
            <div class="table-responsive">
                <a href="{{ route('cetak-pelanggan') }}" target="_blank" class="btn btn-dark">Cetak Data</a>
                <table class="table table-hover mt-3" width="100%" cellspacing="">
                    <thead>
                        <tr>
                            <th>Id Pelanggan</th>
                            <th>Nomor kwh</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Id Tarif</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    @foreach ($pelanggan as $p)
                    <tbody>
                        <tr>
                            <td>{{ $p->id_pelanggan }}</td>
                            <td>{{ $p->nomor_kwh }}</td>
                            <td>{{ $p->nama_pelanggan }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->id_tarif }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-rounded btn-sm mr-2"
                                    data-toggle="modal" data-target="#EditPelanggan{{ $p->id_pelanggan }}">Edit</button>
                                <button type="button" class="btn btn-danger btn-rounded btn-sm mr-2" data-toggle="modal"
                                    data-target="#HapusPelanggan{{ $p->id_pelanggan }}">Hapus</button>
                            <td>
                        </tr>
                    </tbody>
            </div>
        </div>
    </div>
</div>

{{-- Hapus Pelanggan --}}
<div class="modal fade" id="HapusPelanggan{{ $p->id_pelanggan }}" tabindex="-1" aria-labelledby="HapusPelanggan"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center">Apakah anda yakin menghapus pelanggan ini? :
                    <span>{{ $p->nama_pelanggan }}</span>
                </h4>
            </div>
            <div class="modal-footer">
                <form class="forms-sample" action="{{ route('pelanggan.destroy', $p->id_pelanggan ) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Hapus!</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
            </div>
        </div>
    </div>
</div>



{{-- Edit Pelanggan --}}
  <div class="modal fade" id="EditPelanggan{{ $p->id_pelanggan }}" tabindex="-1" aria-labelledby="EditPelanggan"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Update Pelanggan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <!--FORM UPDATE PELANGGAN-->
                  <form class="forms-sample " action="{{ route('pelanggan.update',$p->id_pelanggan) }}" method="POST">
                      @csrf
                      @method('put')
                      {{-- <div class="form-group">
                    <label for="exampleInputUsername1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="username" value="{{ $p->username }}">
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" name="password"
                      value="{{ $p->password }}">
              </div> --}}
              <div class="form-group">
                  <label for="exampleInputPassword1">Nomor kwh</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" name="nomor_kwh"
                      value="{{ $p->nomor_kwh }}">
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Nama Pelanggan</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nama_pelanggan"
                      value="{{ $p->nama_pelanggan }}">
              </div>
              <div class="form-group">
                  <label for="exampleInputConfirmPassword1">Alamat</label>
                  <input type="text" class="form-control" id="exampleInputConfirmPassword1" name="alamat"
                      value="{{ $p->alamat }}">
              </div>
              <div class="form-group">
                  <label for="exampleInputConfirmPassword1">Id Tarif</label>
                  <input type="number" class="form-control" id="exampleInputConfirmPassword1" name="id_tarif"
                      value="{{ $p->id_tarif }}">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>

              </form>
          </div>
      </div>
  </div>
</div>
@endforeach
</table>



@include('assets/footer')
@endsection
