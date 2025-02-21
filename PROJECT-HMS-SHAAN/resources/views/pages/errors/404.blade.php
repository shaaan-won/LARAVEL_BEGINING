@extends('layout.erp.app')

@section('page')
    @if (session('success') || session('error'))
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div
                            class="card-header transparent d-flex justify-content-center align-items-center bg-transparent shadow">
                            <h2
                                class="text-center font-weight-bold 
                      {{ session('success') ? 'text-success' : 'text-danger' }}">
                                {{ session('success') ?? session('error') }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- error-404 start-->
        <div class="error-wrapper">
            <div class="container"><img class="img-100" src="{{ asset('assets') }}/images/other-images/sad3.gif"
                    alt="">
                <div class="error-heading">
                    <h2 class="headline font-danger">404</h2>
                </div>
                <div class="col-md-8 offset-md-2">
                    <p class="sub-content">The page you are attempting to reach is currently not available. This may be
                        because the page does not exist or has been moved.</p>
                </div>
                <div><a class="btn btn-danger-gradien btn-lg" href="{{ url('/') }}">BACK TO HOME PAGE</a></div>
            </div>
        </div>
        <!-- error-404 end      -->
    </div>
@endsection
