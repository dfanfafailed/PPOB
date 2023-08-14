<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="jamal/vertical-layout-light/style.css">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              </div>
              <h4>Hello!</h4>
              <h6 class="font-weight-light">Masuk Untuk Melanjutkan.</h6>
              @if(session('success'))
              <p class="alert alert-success">{{ session('success') }}</p>
              @endif
              @if($errors->any()) 
              @foreach($errors->all() as $err)
              <p class="alert alert-danger">{{ $err }}</p>
              @endforeach 
              @endif
              <form class="pt-3" action="register" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required value="{{ old('password') }}">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-lg" id="nomor_kwh" name="nomor_kwh" placeholder="Nomor kwh" required value="{{ old('nomor_kwh') }}">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama" required value="{{ old('nama_pelanggan') }}">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="alamat" name="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                </div>
                {{-- <div class="form-group">
                  <input type="number" class="form-control form-control-lg" id="id_tarif" name="id_tarif" placeholder="Tarif" required value="{{ old('id_tarif') }}">
                </div> --}}

                <div class="form-group">
                  <select class="form-control form-control-lg" aria-label="Default select example" name="id_tarif">
                    <option selected>Pilih Daya</option>
                    @foreach ($tarif as $item)
                      <option value="{{ $item->id_tarif }}">{{ $item->daya }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>