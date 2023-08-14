@extends('assets/nav')

@section('navbar')
<div class="col-md-aut0 grid-margin stretch-card"> 
  <div class="card shadow ">
    <div class="card-body">
      <h4 class="card-title">Data Tarif</h4>
      <div class="table-responsive">
        <table class="table table-hover" width="100%" cellspacing="">
          <thead>
            <tr>
              <th>Id Tarif</th>
              <th>Daya</th>
              <th>Tarif Per KWH</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($tarif as $item)
              <td>{{ $item->id_tarif }}</td>
              <td>{{ $item->daya }}</td>
              <td>{{ $item->tarifperkwh }}</td>
              
              <td>
                <button type="button" class="btn btn-warning btn-rounded btn-sm mr-2" data-toggle="modal" data-target="#EditTarif{{ $item->id_tarif }}">Edit</button>
              <td>                
            </tr>
          </tbody>
        
        {{-- Edit Tarif --}}
<div class="modal fade" id="EditTarif{{ $item->id_tarif }}" tabindex="-1" aria-labelledby="EditTarif" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Tarif</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
      <!--FORM UPDATE PELANGGAN-->
      <form class="forms-sample " action="{{ route('tarif.update',$item->id_tarif) }}" method="POST">
        @csrf
        @method('put')
              <div class="form-group">
                <label for="daya">Daya</label>
                <input type="text" class="form-control" id="daya" name="daya" value="{{ $item->daya }}">
              </div>
              <div class="form-group">
                <label for="tarifperkwh">Tarif Per KWH</label>
                <input type="text" class="form-control" id="tarifperkwh" name="tarifperkwh" value="{{ $item->tarifperkwh }}">
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
      </div>
    </div>
  </div>
</div>  

    <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#Tarif">
      Tambah Tarif
    </button>

    <div class="modal fade" id="Tarif" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="mdal-title">Masukan Tarif </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card ">
          <div class="card-body">
            <form class="forms-sample " action="{{ route('tarif.store') }}" method="POST">
              @csrf
              <div class="form-group">
               <label for="daya">Daya</label>
               <input type="text" class="form-control" id="daya" name="daya">
             </div>
     
               <div class="form-group">
                 <label for="tarifperkwh">Tarif per KWH </label>
                 <input type="number" class="form-control" id="tarifperkwh" name="tarifperkwh">
               </div>
     
                 <button type="submit" class="btn btn-primary mr-2">Kirim</button>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>

@endsection