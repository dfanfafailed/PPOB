<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="/Users/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Users/css/templatemo.css">
  <link rel="stylesheet" href="/Users/css/custom.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
  <link rel="stylesheet" href="Users/css/fontawesome.min.css">
  <title>user</title>
  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.client_key') }}"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>
<body>
  

<div class="container py-5">
    <form class="form-sample" action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
      <div class="card-body border">
        <span class="text-center me-4"><h4>Monggo bayar...</h4></span>
        @csrf
   
        {{-- @foreach ($transaksi as $item) --}}
        <div class="row">
          <div class="col-6 col-sm-4">
          <div class="form-group">
          <label for="id_pelanggan">No.Tagihan</label>
          <input type="number" class="form-control" id="id_tagihan" name="id_tagihan" value="{{ $transaksi->id_tagihan }}">
          </div>
        </div>

        <div class="col-6 col-sm-4">
          <div class="form-group">
           <label for="id_pelanggan">No.Pelanggan</label>
           <input type="number" class="form-control" id="id_pelanggan" name="id_pelanggan" value="{{ $transaksi->id_pelanggan }}">
          </div>
        </div>

        <div class="col-6 col-sm-4">
          <div class="form-group">
            <label for="jumlah_meter">Jumlah Meter</label>
            <input type="number" class="form-control" id="jumlah_meter" name="jumlah_meter" value="{{ $transaksi->jumlah_meter }}"/>
          </div>
        </div>

      <div class="w-100"></div>

        <div class="col-6 col-sm-4">
        {{-- @foreach ($item->pelanggan as $pel) --}}
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama_pelanggan }}">
        </div>
      </div>

      <div class="col-6 col-sm-4">
        <div class="form-group">
          <label for="nama">Tarif Per Kwh</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->tarif->tarifperkwh }}">
        </div>
      </div>
        
      <div class="row justify-content-start">
      <div class="col-3">
        <div class="form-group mt-3" >
          <label for="total_bayar">Total Bayar :</label>
          <input type="text" id="total_bayar" name="total_bayar" class="form-control" value="{{ $pelanggan->tarif->tarifperkwh * $transaksi->jumlah_meter + $pembayaran->biaya_admin }}">
          <span><p><i>termasuk biaya admin</i></p></span>
        </div>
      </div>
    </div>
    

      </div>
    </div>


        {{-- <a href="{{ route('kwitansi') }}" class="btn btn-success mt-3">Bayar</a> --}}
          
      </form>
      <button class="btn btn-success mt-3" id="pay-button">Bayar</button>
    {{-- @endforeach

    @endforeach  --}}


</div>
</body>
<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay( '{{ $snap }}', {
      onSuccess: function(result){
        /* You may add your own implementation here */
        alert("payment success!");
        console.log(result);
      },
      onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
      },
      onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
      },
      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
  });
</script>
</html>
