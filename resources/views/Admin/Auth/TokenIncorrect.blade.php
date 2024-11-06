<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} : Erro Token</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

    <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    @livewireStyles
</head>

<body class="authentication-bg">
    <div id="preloader">
        <div id="status">
            <div class="bouncing-loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
        <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
            <g fill-opacity='0.22'>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
            </g>
        </svg>
    </div>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div wire:loading.delay.longest wire:target="sendEmail">
            <div class="position-fixed top-0  w-100 h-100 d-flex justify-content-center align-items-center "
                style="z-index: 1055;background-color: rgba(0, 0, 0, 0.288)">
                <div class="spinner-border text-light">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <div class="card-header text-center bg-danger text-white">
                            <h4>Token Error</h4>
                        </div>
        
                        <div class="card-body p-4 text-center">
                            <h5 class="text-danger">The token has expired or the link is incorrect.</h5>
                            <p>Please submit a new request.</p>
                            {{-- <a href="{{ route('password.request') }}" class="btn btn-primary">Request New Link</a> --}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Not you? return <a href="{{ route('admin.login') }}"
                                    class="text-muted ms-1"><b>Sign In</b></a></p>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    @livewireScripts
</body>

</html>