@extends('assets/nav')

@section('navbar')    
           {{--<div class="row">
            <div class="col-lg-3 col-md-6 col-md-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="wrap">
                         <div class="card-header">
                            <h4>Total Data Pelanggan</h4>
                            <a href="{{route('pelanggan.view')}}"></a>
                         </div>
                         <div class="card-body">
                            <h5></h5>
                         </div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-md-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="wrap">
                         <div class="card-header">
                            <h4>Total Data </h4>
                         </div>
                         <div class="card-body">
                            <h5></h5>
                         </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 col-md-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="wrap">
                         <div class="card-header">
                            <h4>Total Data </h4>
                         </div>
                         <div class="card-body">
                            <h5></h5>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-md-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="wrap">
                         <div class="card-header">
                            <h4>Total Data </h4>
                         </div>
                         <div class="card-body">
                            <h5></h5>
                         </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="fst-italic"> <h3 class="font-weight-bold">Assalamu'allakum {{ Auth::user()->username }}</h3></div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('assets/footer')
        @endsection